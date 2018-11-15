<?php
/**
 * Created by PhpStorm.
 * User: bjqxdn0575
 * Date: 2018/9/17
 * Time: 20:43
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResourceAudio extends Model
{
    protected $table = "resource_audio";

    protected static $unguarded = true;
    protected $primaryKey = 'resource_id';

}