<?php

namespace App\Services;

use App\Jobs\SendCodeBySms;
use App\Models\User;
use Exception;
use Illuminate\Contracts\Cache\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\ValidationException;
use Psr\SimpleCache\InvalidArgumentException;

class VerificationService
{
    /**
     * @param string $key
     * @return array
     *
     * @throws InvalidArgumentException
     */
    public static function getCacheData(string $key): array
    {
        $cacheData = self::cacheStore()->get(self::getCacheKey($key));
        if (empty($cacheData)) {
            return [];
        }

        return $cacheData
            + [
                'expire_seconds' => max($cacheData['expired']->timestamp
                    - now()->timestamp, 0),
            ];
    }

    /**
     * @param $key
     * @param  bool  $isPhone
     * @param  bool  $resend
     * @return array
     *
     * @throws ValidationException
     * @throws Exception|InvalidArgumentException
     */
    public static function sendVerifyCode(
        $key,
        bool $isPhone = false,
        bool $resend = false
    ): array {
        $cacheKey = self::getCacheKey($key);

        if (! $resend) {
            $dataFromCache = self::getCacheData($cacheKey);

            if (
                ! empty($dataFromCache)
                && now()->diffInSeconds($dataFromCache['expired'])
                > config('auth.verification_cool_down_after_seconds')
            ) {
                throw ValidationException::withMessages([
                    ($isPhone
                        ? 'phone'
                        : 'email') => __('site.activation_sent'),
                ]);
            }
        }

        $code = self::generateCode();
        $expired = now()->addSeconds(config('auth.verification_code_timeout'));

        self::cacheStore()->put(
            $cacheKey,
            compact('code', 'key', 'expired'),
            $expired
        );

        return [
            'expire_seconds' => max($expired->timestamp - now()->timestamp, 0),
            'code' => $code,
        ];
    }

    /**
     * @param $key
     * @param $code
     * @return bool
     *
     * @throws ValidationException|InvalidArgumentException
     */
    public static function verifyVerificationCode($key, $code): bool
    {
        $dataFromCache = self::cacheStore()->get(self::getCacheKey($key));
        if (! $dataFromCache || $code !== $dataFromCache['code']) {
            throw ValidationException::withMessages([
                'code' => __('site.provided_code_expired'),
            ]);
        }

        self::cacheStore()->forget(self::getCacheKey($key));

        return true;
    }

    /**
     * @param $key
     * @param  bool  $isPhone
     * @return string[]
     *
     * @throws ValidationException|Exception|InvalidArgumentException
     */
    public static function resendVerifyVerification($key, bool $isPhone = false): array
    {
        $dataFromCache = self::cacheStore()->get(self::getCacheKey($key));

        if (empty($dataFromCache)
            || empty($dataFromCache['expired'])
            || $key !== $dataFromCache['key']
        ) {
            return self::sendVerifyCode($key, $isPhone);
        }

        $timeSent = $dataFromCache['expired'];
        $diffSeconds = now()->diffInSeconds($timeSent);

        if ($diffSeconds > self::getCoolDownSeconds()) {
            throw ValidationException::withMessages([
                ($isPhone
                    ? 'phone'
                    : 'email') => __('site.seconds_later_can_request', [
                        'seconds' => $timeSent->subSeconds(self::getCoolDownSeconds())
                            ->diffForHumans(now(), true, false, 2),
                    ]),
            ]);
        }

        self::cacheStore()->forget(self::getCacheKey($key));
        return self::sendVerifyCode($key, $isPhone,true);
    }

    /**
     * @param  User  $user
     * @param  Request  $request
     * @return Collection
     *
     * @throws ValidationException
     * @throws Exception|InvalidArgumentException
     */
    public static function handleCompleteUser(User $user, Request $request): Collection
    {
        $dataExpire = collect(
            $user->wasChanged('phone')
                ? self::sendVerifyCode($request->phone, true)
                : self::getCacheData($request->phone)
        );

        if ($request->has('code') && self::verifyVerificationCode($request->phone, $request->code)) {
            $user->markPhoneAsVerified();
        } elseif ($request->get('resend_code', false) === true || $dataExpire->get('expire_seconds', 0) === 0) {
            $dataExpire = collect(self::resendVerifyVerification($request->phone, true));
        }

        return $dataExpire;
    }

    /**
     * @param  Request  $request
     * @param  string  $field
     * @return Collection|bool
     *
     * @throws ValidationException|Exception
     */
    public static function handleChangeEmailOrPhoneUser(Request $request, string $field): Collection|bool
    {
        $isPhone = $field === 'phone';
        $codeKey = $field.'_code';
        $codeResendKey = $field.'_resend_code';

        $cacheData = self::getCacheData($request->{$field});
        $created = empty($cacheData);

        $dataExpire = collect(
            ! empty($cacheData)
                ? $cacheData
                : self::sendVerifyCode($request->{$field}, $isPhone));

        if (! empty($request->{$codeKey}) && self::verifyVerificationCode($request->{$field}, $request->{$codeKey})) {
            return true;
        } elseif (
            $created === false
            && (
                ! empty($request->{$codeResendKey})
                && boolval($request->get($codeResendKey, false)) === true
                || $dataExpire->get('expire_seconds', 0) === 0
            )) {
            $dataExpire = collect(self::resendVerifyVerification($request->{$field}, $isPhone));
        }

        return $dataExpire;
    }

    /**
     * @throws Exception
     */
    private static function generateCode(): string
    {
        return app()->isLocal()
            ? '12345'
            : (string) random_int(10000, 99999);
    }

    /**
     * @param $key
     * @return string
     */
    private static function getCacheKey($key): string
    {
        return "api.auth.send.code.{$key}";
    }

    /**
     * @return Repository
     */
    private static function cacheStore(): Repository
    {
        return Cache::store('database');
    }

    private static function getCoolDownSeconds()
    {
        return config('auth.verification_code_timeout')
            - config('auth.verification_cool_down_after_seconds');
    }
}
