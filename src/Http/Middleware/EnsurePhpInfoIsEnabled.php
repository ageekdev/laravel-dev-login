<?php

namespace AgeekDev\DevLogin\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsurePhpInfoIsEnabled
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        abort_unless(config('dev-login.phpinfo.enabled'), 403);

        return $next($request);
    }
}
