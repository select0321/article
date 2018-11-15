<?php

namespace App\Http\Middleware;

use Closure;
use App\Traits\CommonTrait;

class ViewMiddleware
{

    use CommonTrait;

    public function handle($request, Closure $next)
    {
        // 视图全局变量
        $this->setViewShare($request);

        $response = $next($request);

        return $response;
    }

}
