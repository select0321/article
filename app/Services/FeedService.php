<?php
/**
 * Created by PhpStorm.
 * User: bjqxdn0575
 * Date: 2018/9/12
 * Time: 15:07
 */

namespace App\Services;


use function PhpParser\filesInDir;

class FeedService extends BaseService
{

    public function getList()
    {
        $where = [
            'state' => 'normal',
            'level' => '1',
        ];

        return $this->repository("feed")->findWhere($where, ['children']);
    }

}