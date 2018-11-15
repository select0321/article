<?php
/**
 * Created by PhpStorm.
 * User: bjqxdn0575
 * Date: 2018/9/17
 * Time: 20:43
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Resource extends Model
{
    protected $table = "resource";

    protected static $unguarded = true;

    protected $primaryKey = 'id';

    public function article()
    {
        return $this->hasOne("App\Models\ResourceArticle", 'resource_id');
    }

    public function extension()
    {
        return $this->hasOne('App\Models\ResourceExtension', 'resource_id');
    }

    public function audio()
    {
        return $this->hasOne('App\Models\ResourceAudio', 'resource_id');
    }

    public function feed()
    {
        return $this->hasOne('App\Models\Feed', 'id','feed_id');
    }


}