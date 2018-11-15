<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class LogHttp extends Model
{

    protected $table = 'log_http';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    ];

    protected $guarded = [];
    /**
     * The attributes excluded from the BaseModel's JSON form.
     *
     * @var array
     */
    protected $hidden = [
    ];

    protected $casts = [
        'request_parameters' => 'array',
    ];

}
