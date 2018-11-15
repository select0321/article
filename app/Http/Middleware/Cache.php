<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

class Cache extends Middleware
{
    public function handle($request, Closure $next, $guard = null)
    {
        $response = $next($request);

        return $response;
    }
}
