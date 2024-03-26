<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TestingMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (app()->isLocal() && $request->host() === 'web.testing') {
            config()->set('database.default', 'testing');
        }

        return $next($request);
    }
}
