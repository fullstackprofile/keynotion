<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Http\Requests\Api\Auth\UpdateUserRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use App\Services\VerificationService;
use Auth;
use Cart;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Laravel\Cashier\Exceptions\CustomerAlreadyCreated;
use Psr\SimpleCache\InvalidArgumentException;
use Str;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class AuthController extends BaseController
{

    /**
     * @param LoginRequest $request
     * @return JsonResponse
     *
     * @throws ValidationException
     * @throws CustomerAlreadyCreated
     */
    public function storeLogin(LoginRequest $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');
        //$credentials['role'] = 'user';

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('web');

            if ($request->has('cart_id')) {
                Cart::copyCart($request->cart_id);
            }

            $user->generateStripeId();

            return response()->json(['token' => $token->plainTextToken]);
        } else {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
    }

    /**
     * @param RegisterRequest $request
     * @return Response
     *
     * @throws ValidationException
     * @throws InvalidArgumentException
     */
    public function storeRegister(RegisterRequest $request): Response
    {
        $user = User::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'country' => $request['country'],
            'password' => bcrypt($request['password']),
        ]);
        $token = $user->createToken('apiToken')->plainTextToken;

        if ($request->has('cart_id')) {
            Cart::copyCart($request->cart_id);
        }

        VerificationService::sendVerifyCode($request['email']);

        event(new Registered($user));

        return $this->render([
            'user' => $user,
            'token' => $token
        ], [], ResponseAlias::HTTP_CREATED);
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws InvalidArgumentException
     * @throws ValidationException
     */
    public function verifyCode(Request $request): mixed
    {
        $verified = VerificationService::verifyVerificationCode($request->email, $request->code);
        if ($verified) {
            /** @var User $user */
            $user = User::whereEmail($request->email)->first();
            if ($user) {
                $user->markEmailAsVerified();
            }
        }

        return $this->render();
    }

    /**
     * @param Request $request
     * @return mixed
     *
     * @throws InvalidArgumentException
     * @throws ValidationException
     */
    public function resendCode(Request $request): mixed
    {
        $resend = VerificationService::resendVerifyVerification($request->email);
        /** @var User $user */
        $user = User::whereEmail($request->email)->first();
        if ($user) {
            $user->sendEmailVerificationNotification();
        }

        return $this->render([
            'expire_seconds' => $resend['expire_seconds'] ?? 0
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function logout(Request $request): JsonResponse
    {
        auth()->user()->tokens()->delete();
        return response()->json(['message' => 'user successfully signed out']);
    }

    /**
     * @param Request $request
     * @return mixed
     *
     * @throws InvalidArgumentException
     * @throws ValidationException
     */
    public function forgotPassword(Request $request): mixed
    {
        $request->validate(['email' => 'required|email']);

        $resend = VerificationService::resendVerifyVerification('forgot_password_' . $request->email);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? $this->render(['email' => __($status)])
            : $this->render(['email' => __($status)], [], 400);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function reset(Request $request): JsonResponse
    {
        $request->validate([
            'code' => ['required'],
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::whereEmail($request->email)->first();
        if (!$user) {
            throw ValidationException::withMessages([
                'email' => [__('user does not exists')],
            ]);
        }

        $code = VerificationService::getCacheData('forgot_password_' . $user->email)['code'] ?? null;

        $status = VerificationService::verifyVerificationCode('forgot_password_' . $user->email, $request->code);

        $user->forceFill([
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(60),
        ])->save();

        return response()->json(['status' => __($status)]);
    }

    /**
     * @param UpdateUserRequest $request
     * @return mixed
     */
    public function update(UpdateUserRequest $request): mixed
    {
        $this->getUser()->update($request->all());
        return $this->render(new UserResource($this->getUser()));

    }
}
