<?php

namespace App\Traits;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Exceptions\KrException;
use App\Services\ServiceFluent;
use App\Repositories\RepositoryFluent;
use Monolog\Logger as Monolog;
use Illuminate\Log\Writer;
use DB;
use App\Traits\LogTrait;

trait CommonTrait
{

    use LogTrait;

    protected $traitAttributes = [];


    /**
     * 获取请求并进行参数验证
     *
     * @param array $rules
     * @param Request $request
     * @return array
     * @throws KrException
     */
    protected function getParams($rules = [])
    {
        $result = [];

        if (!empty($rules)) {

            $all = \request()->all();

            foreach ($rules as $k => $v) {
                if (isset($all[$k])) {
                    $result[$k] = $all[$k];
                }
            }

            //$result = \request()->only(array_keys($rules));
            $validator = Validator::make($result, $rules);

            if ($validator->fails()) {
                $this->throwException('参数验证错误', 2000, $validator->errors());
            }
        }
        return $result;
    }


    /**
     * 返回json
     *
     * @param array $data
     * @return JsonResponse
     */
    protected function toJson($data = [])
    {
        $result = [
            'code' => 0,
            'data' => $data,
        ];
        return response()->json($result);
    }

    protected function throwException($msg, $code = 2000, $data = null)
    {
        throw new \Exception($msg, $code);
    }

    protected function repository($table)
    {
        return new \App\Libraries\RepositoryFluent($table);
    }

    protected function service($name)
    {
        $class_name = '\App\Services\\' . Str::studly($name) . 'Service';
        return  new $class_name();
    }


    /**
     * view 全局变量
     * @param $request
     */
    public function setViewShare($request)
    {
        $key = 'view_share_global';

        if ($request->get('c') == 'y') {
            Cache::forget($key);
        }

        $value = \Cache::remember($key, 10, function () use ($key) {

            $value = [];

            // 全部feed
            $value['global_feed_list'] = $this->service('feed')->getList();

            \Cache::put($key, $value, 500);

            return $value;
        });

        \View::share($value);
    }

    public function __get($key)
    {
        if (array_key_exists($key, $this->traitAttributes)) {
            return $this->traitAttributes[$key];
        }

        switch ($key) {

            case 'request':
                $this->traitAttributes[$key] = new Request();
                break;

            case 'logger':
                $this->traitAttributes[$key] = $this->getLogger();
                break;


            case 'uuid':
                $this->traitAttributes[$key] = $_COOKIE['uuid'] ?? null;
                break;

            case 'uid':
                $this->traitAttributes[$key] = $_COOKIE['uid'] ?? null;
                break;


        }

        return $this->traitAttributes[$key];

    }


}
