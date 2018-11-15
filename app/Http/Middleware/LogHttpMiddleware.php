<?php

namespace App\Http\Middleware;

use Closure;
use Response;
use Cache;
use DB;
use Request;
use App\Traits\CommonTrait;

class LogHttpMiddleware
{
    use CommonTrait;

    // 记录所有请求参数
    public function handle($request, Closure $next)
    {
        // 记录所有请求参数
        $log = $this->setRequest($request);

        $response = $next($request);

        // 更新响应结果
        $this->updateLog($log->id, $response);

        return $response;
    }


    // 记录发送请求
    public function setRequest($request)
    {

        $data = [
            'key'                => '',
            'request_method'     => $request->method(),
            'request_uri'        => $request->fullUrl(),
            'request_parameters' => $request->all(),
            'request_ip'         => $request->ip(),
            'user_id'            => $_COOKIE['uid'] ?? null,
            'uuid'               => $_COOKIE['uuid'] ?? null,
            'user_agent'         => $request->userAgent(),
        ];

        return $this->repository('log_http')->insert($data);
    }

    // 记录回调请求
    public function updateLog($id, $response)
    {

        if (!$id) {
            return true;
        }

        $arr_content = json_decode($response->getContent(), true);

        $data = [
            'response_status' => $response->getStatusCode(),
            'response'        => isset($arr_content['code']) ? json_encode($arr_content, JSON_UNESCAPED_UNICODE) : $response->getContent(),
            'response_code'   => $arr_content['code'] ?? null,
            'response_time'   => microtime(true) - LARAVEL_START,
        ];

        return  $this->repository('log_http')->update($id, $data);
    }


}
