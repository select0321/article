<?php
/**
 * Created by PhpStorm.
 * User: bjqxdn0575
 * Date: 2018/9/17
 * Time: 20:43
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    protected $table = "feed";

    protected $primaryKey = 'id';


    public function children()
    {
        return $this->hasMany('App\Models\Feed', 'parent_id', 'id');
    }

}