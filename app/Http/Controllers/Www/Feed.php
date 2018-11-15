<?php

namespace App\Http\Controllers\Www;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Feed extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $feed = $this->service('feed')->getList();

        return view('wechart.index');
    }

}
