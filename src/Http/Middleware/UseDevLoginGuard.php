<?php

namespace AgeekDev\DevLogin\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UseDevLoginGuard
{
    public function handle(Request $request, Closure $next, ?string $guard = null): mixed
    {
        auth()->setDefaultDriver(config('dev-login.auth.guard_name'));

        if (app()->environment('local')) {
            return $next($request);
        }

        if (! auth(config('dev-login.auth.guard_name'))->user()) {
            abort(403);
        }

        return $next($request);
    }
}
