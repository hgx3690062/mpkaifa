<?php
/**
 * Created by PhpStorm.
 * User: hugangxi
 * Date: 2018/2/6
 * Time: 上午10:36
 */

namespace App\Http\Controllers;
use EasyWeChat\Factory;
use Log;

class WxController extends Controller
{
    public function index()
    {
        Log::info('request arrived.'); # 注意：Log 为 Laravel 组件，所以它记的日志去 Laravel 日志看，而不是 EasyWeChat 日志

        $app = app('wechat.official_account');
        $app->server->push(function($message){
            return "欢迎关注 overtrue！";
        });

        return $app->server->serve();
//
//        $config = [
//            'app_id' => 'wx8d75fb66b9f2a882',
//            'secret' => 'd80927fc1c975d3ff36a5aad6f9d9766',
//
//            // 指定 API 调用返回结果的类型：array(default)/collection/object/raw/自定义类名
//            'response_type' => 'array',
//
//            'log' => [
//                'level' => 'debug',
//                'file' => __DIR__ . '/wechat.log',
//            ],
//        ];
//
//        $app = Factory::officialAccount($config);
//        $response = $app->server->serve();
//        return $response;
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