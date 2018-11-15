<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => ['log.http', 'log.sql', 'log.timer', 'view'], 'namespace' => 'Www'], function () {


    // 资源
    Route::group(['prefix' => 'resource'], function () {

        // 列表
        Route::get('/', 'Resource@index');

        // 详情
        Route::get('/{id}', 'Resource@show');

    });

    // 资源
    Route::group(['prefix' => 'feed'], function () {

        // 列表
        Route::get('/', 'Feed@index');

    });

});

