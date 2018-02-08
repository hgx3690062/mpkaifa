<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::any('/wx','WxController@index');
Route::get('/token','WxController@token');
Route::get('/text/{url}','WxController@text');
//Route::group(['middleware' => ['web', 'wechat.oauth']], function () {
//    Route::get('/wx', function () {
//        $user = session('wechat.oauth_user'); // 拿到授权用户资料
//
//        return view('index',compact('user'));
//    });
//});