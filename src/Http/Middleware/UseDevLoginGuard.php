<?php

namespace GenieFintech\DevLogin\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UseDevLoginGuard
{
    /**
     * @param Request $request
     * @param  Closure  $next
     * @param string|null $guard
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $guard = null): mixed
    {
        auth()->setDefaultDriver(config('dev-login.auth.guard_name'));

        if (! auth(config('dev-login.auth.guard_name'))->user()) {
            abort(403);
        }

        return $next($request);
    }
}
