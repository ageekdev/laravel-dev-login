<?php

namespace AgeekDev\DevLogin\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        Str::finish(config('dev-login.path'), '/').trim(config('dev-login.home', 'dashboard'), '/');

        if (Auth::guard(config('dev-login.auth.guard_name', 'developer'))->check()) {
            return redirect()->route('dev-login.dashboard');
        }

        return $next($request);
    }
}
