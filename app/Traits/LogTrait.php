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

trait LogTrait
{

    protected function getLogger()
    {
        $name = 'laravel';
        $path  = env('APP_LOG_PATH', storage_path('logs/')) . $name . '.log';
        $level = 'debug';

        $log = new \Monolog\Logger($name);

        $log->pushHandler(new \Monolog\Handler\StreamHandler($path, $level));

        return $log;
    }


    public function getDBList()
    {
        return array_keys(config('database.connections'));
    }


    // 开启所有数据库日志
    public function sqlLogStart()
    {
        foreach ($this->getDBList() as $db) {
            \DB::connection($db)->enableQueryLog();
        }

    }

    // 记录数据库日志
    public function sqlLogEnd()
    {
        foreach ($this->getDBList() as $db) {
            $logs = \DB::connection($db)->getQueryLog();

            if (!count($logs)) {
                continue;
            }

            $context = [];

            $context['source']     = $_SERVER['REQUEST_URI'] ?? $this->signature ?? null;
            $context['database']   = $db;
            $context['total_time'] = 0;

            foreach ($logs as $log) {
                $context['total_time'] += $log['time'];
                $context['sql'][]      = self::replaceArray('?', $log['bindings'], $log['query']) . ' [' . $log['time'] . ' ms]';
            }

            $context['total_time'] .= ' ms';

            if (count($context['sql'])) {
                $this->logger->info('Log.Middleware.Sql ' . var_export($context, true));
                \Log::info('Log.Middleware.Sql ' . var_export($context, true));
            }
        }
    }
    public static function replaceArray($search, array $replace, $subject)
    {
        foreach ($replace as $value) {
            $value = '"' . $value . '"';//TDLK
            $subject = static::replaceFirst($search, $value, $subject);
        }

        return $subject;
    }

    public static function replaceFirst($search, $replace, $subject)
    {
        if ($search == '') {
            return $subject;
        }

        $position = strpos($subject, $search);

        if ($position !== false) {
            return substr_replace($subject, $replace, $position, strlen($search));
        }

        return $subject;
    }



}
