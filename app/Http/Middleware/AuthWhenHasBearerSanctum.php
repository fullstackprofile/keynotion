<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\Factory as Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AuthWhenHasBearerSanctum
{
    /**
     * The authentication factory instance.
     *
     * @var Auth
     */
    protected Auth $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  Auth  $auth
     * @return void
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     *
     * @throws HttpException
     * @throws AuthenticationException
     */
    public function handle(Request $request, Closure $next): mixed
    {
        if (! empty($request->bearerToken())) {
            $this->authenticate($request);
        }

        return $next($request);
    }

    /**
     * Determine if the user is logged in to any of the given guards.
     *
     * @param  Request  $request
     * @param  string  $guard
     * @return void
     *
     * @throws AuthenticationException
     */
    protected function authenticate(Request $request, $guard = 'sanctum')
    {
        if ($this->auth->guard($guard)->check()) {
            return $this->auth->shouldUse($guard);
        }

        $this->unauthenticated($request, $guard);
    }

    /**
     * Handle an unauthenticated user.
     *
     * @param  Request  $request
     * @param  string  $guards
     * @return void
     *
     * @throws AuthenticationException
     */
    protected function unauthenticated(Request $request, string $guards): void
    {
        throw new AuthenticationException('Unauthenticated.', $guards);
    }
}
