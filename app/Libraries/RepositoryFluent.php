<?php namespace App\Libraries;

use Illuminate\Support\Str;
use DB;
use Config;

class RepositoryFluent
{
    public $base;

    public function __construct($name)
    {
        $class_name = '\App\Models\\' . Str::studly($name);
        $this->base = new $class_name();
    }

    public function all() {
        return $this->base->all();
    }

    public function insert($data) {
        return $this->base->create($data);
    }

    // 批量插入
    public function insertBatch($data)
    {
        return $this->base->insert($data);
    }


    public function find($id, array $with = []) {
        return $this->base->with($with)->find($id);
    }

    public function findWhere(array $where = [], array $with = [], $pluck = null)
    {
        $list = $this->base;

        if ($with) {
            $list = $list->with($with);
        }

        if (!empty($where)) {
            foreach ($where as $k => $v) {
                if (is_array($v)) {
                    $list = $list->whereIn($k, $v);
                } else {
                    $list = $list->where($k, $v);
                }
            }
        }
        if ($pluck) {
            $list = $list->pluck($pluck);
            $list = $list->count() ? $list->toArray() : [];
        } else {
            $list = $list->get();
        }

        return $list;
    }

    // 第一个
    public function first(array $where)
    {
        return $this->base->where($where)->first();
    }

    public function firstOrCreate($attributes)
    {
        return $this->base->firstOrCreate($attributes);
    }

    public function update($id, array $data) {

        $obj = $this->base->find($id);

        if (!$obj) {
            return false;
        }
        return $obj->update($data);
    }

    public function updateWhere($where, $data) {
        return $this->base->where($where)->update($data);
    }

    public function updateOrCreate($where, $data) {
        return $this->base->updateOrCreate($where, $data);
    }


    public function deleteWhere($where)
    {
        return $this->base->where($where)->delete();
    }

    public function delete($id)
    {
        return $this->base->where('id', $id)->delete();
    }

    /**
     * 分页
     *
     * @param $where
     * @param int $pre_page
     * @param null $with
     * @param null $order_by
     * @return mixed
     */
    public function paginate($where, $pre_page = 15, $with = null, $order_by = null, $group_by = null)
    {
        $list = $this->base;

        if (!empty($where)) {
            foreach ($where as $k => $v) {
                if (is_array($v)) {
                    $list = $list->whereIn($k, $v);
                } else {
                    $list = $list->where($k, $v);
                }
            }
        }

        if (!empty($with)) {
            $list = $list->with($with);
        }

        if (!empty($order_by)) {
            $list = $list->orderBy(...$order_by);
        }

        return $list->paginate($pre_page);
    }

    public function pluck($where,$column)
    {
        return $this->base
            ->where($where)
            ->pluck($column);
    }

    public function max($column)
    {
        return $this->base
            ->max($column);
    }


}