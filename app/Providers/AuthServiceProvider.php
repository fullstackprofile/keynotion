<?php

namespace App\Providers;

use App\Services\VerificationService;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        VerifyEmail::$createUrlCallback = function ($notifiable){
            return '';
        };
        ResetPassword::toMailUsing(function ($user, $verificationUrl) {
            return (new MailMessage)
                ->subject(__('Reset password'))
                ->line('Put confirmation number in site')
                ->line(VerificationService::getCacheData('forgot_password_' . $user->email)['code'] ?? null)
                ->line(__('If you did not create an account, no further action is required.!'));
        });

        VerifyEmail::toMailUsing(function ($user, $verificationUrl) {
            return (new MailMessage)
                ->subject(__('Verify Email Address'))
                ->line('Put confirmation number in site')
                ->line(VerificationService::getCacheData($user->email)['code'] ?? null)
                ->line(__('If you did not create an account, no further action is required.!'));
        });
    }
}
