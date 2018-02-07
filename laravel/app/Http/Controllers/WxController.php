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

        ];

        $app = Factory::officialAccount($config);
        $app->server->push(function ($message) {
//            return "您好！欢迎使用 EasyWeChat!";
//            switch ($message['MsgType']) {
//                case 'event':
//
//                    break;
                    if($message['MsgType'] == 'event'){
                        return '欢迎关注 |虫象互娱| 科技公司';
                    }

//            }
        });
        return  $app->server->serve();
    }
}