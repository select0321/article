<?php

namespace App\Http\Middleware;

use Closure;
use Response;
use Cache;
use DB;
use Request;
use App\Traits\CommonTrait;
use Illuminate\Support\Str;


/**
 * Class LogTimerMiddleware
 * @package App\Http\Middleware
 *
 * 记录程序的执行时间
 */
class LogTimerMiddleware
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
        // 框架执行时间
        $lumen_framework = microtime(true);


        $response = $next($request);

        $context = [
            'framework'      => ($lumen_framework - LARAVEL_START) . ' [ms]',
            'program'        => (microtime(true) - $lumen_framework) . ' [ms]',
            'total'          => (microtime(true) - LARAVEL_START) . ' [ms]',
            'request_method' => $request->method(),
            'request_uri'    => $request->getUri(),
            'params'          => $request->all(),
        ];

        $this->logger->info('Log.Middleware.Timer', $context);

        return $response;
    }

}
