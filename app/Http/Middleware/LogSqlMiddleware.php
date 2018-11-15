<?php

namespace App\Http\Middleware;

use Closure;
use Response;
use Cache;
use DB;
use Request;
use App\Traits\CommonTrait;

class LogSqlMiddleware
{

    use CommonTrait;


    /**
     * 测试环境打印SQL日志
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // 开启所有数据库日志
        $this->sqlLogStart();

        $response = $next($request);

        $this->sqlLogEnd();

        return $response;
    }
}
