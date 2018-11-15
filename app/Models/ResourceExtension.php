<?php
/**
 * Created by PhpStorm.
 * User: bjqxdn0575
 * Date: 2018/9/17
 * Time: 20:43
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResourceExtension extends Model
{
    protected $table = "resource_extension";

    protected $primaryKey = 'resource_id';
    protected static $unguarded = true;

}