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
            'app_id' => 'wx8d75fb66b9f2a882',
            'secret' => '2a43f2737dec1eaa01667ecbacd97e5b',
            'token'  => 'zhangyuqwe',
            'response_type' => 'array',

//            'log' => [
//                'level' => 'debug',
//                'file' => __DIR__.'/wechat.log',
//            ],
        ];

        $app = Factory::officialAccount($config);
        $app->server->push(function ($message) {
            return "您好！欢迎使用 EasyWeChat!";
        });
        return  $app->server->serve();
    }
}