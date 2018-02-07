<?php
/**
 * Created by PhpStorm.
 * User: hugangxi
 * Date: 2018/2/6
 * Time: 上午10:36
 */

namespace App\Http\Controllers;
use EasyWeChat\Factory;

class WxController extends Controller
{
    public function index()
    {

        $config = [
            'app_id' => 'wx25aa36a54cfd3f2a',
            'secret' => 'ead7750606259b3984876560715172f9',
            'token'  => 'zhangyuqwe',
            'response_type' => 'array',

            'log' => [
                'level' => 'debug',
                'file' => __DIR__.'/wechat.log',
            ],
        ];


        $app = Factory::officialAccount($config);
        $app->server->push(function ($message) {
            return "您好！欢迎使用 EasyWeChat!";
        });
        return  $app->server->serve();
    }
}