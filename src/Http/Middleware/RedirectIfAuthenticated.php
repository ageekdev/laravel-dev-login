<?php

namespace AgeekDev\DevLogin\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard(config('dev-login.auth.guard_name', 'developer'))->check()) {
            return config('dev-login.redirect_path') ?? redirect()->route('dev-login.dashboard');
        }

        return $next($request);
    }
}
