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

//            // 指定 API 调用返回结果的类型：array(default)/collection/object/raw/自定义类名
//            'response_type' => 'array',
//
//            'log' => [
//                'level' => 'debug',
//                'file' => __DIR__ . '/wechat.log',
//            ],
        ];

        $app = Factory::officialAccount($config);
        return  $app->server->serve();
//        $server = $app->server;
//        $user = $app->user;
//
//        $server->push(function($message) use ($user) {
//            $fromUser = $user->get($message['FromUserName']);
//
//            return "{$fromUser->nickname} 您好！欢迎关注 overtrue!";
//        });
//
//        $server->serve()->send();
    }
}