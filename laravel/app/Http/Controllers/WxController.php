<?php
/**
 * Created by PhpStorm.
 * User: hugangxi
 * Date: 2018/2/6
 * Time: 上午10:36
 */

namespace App\Http\Controllers;
use EasyWeChat\Factory;
use EasyWeChat\Kernel\Messages\News;
use EasyWeChat\Kernel\Messages\NewsItem;
use EasyWeChat\Kernel\Messages\Text;
use Illuminate\Support\Facades\Session;

class WxController extends Controller
{
    protected $app ;
    public function __construct()
    {
        $config = [
            'app_id' => 'wx25aa36a54cfd3f2a',
            'secret' => 'ead7750606259b3984876560715172f9',
            'token'  => 'zhangyuqwe',
            'response_type' => 'array',
            'log' => [
                'level' => 'debug',
                'file' => storage_path('logs/wechat.log'),
            ],
            'oauth' => [
                'scopes'   => ['snsapi_userinfo'],
                'callback' => '/oauth_callback',
            ],

        ];

        $this->app = Factory::officialAccount($config);

    }
    public function oauth_callback()
    {
        $config = [
            'app_id' => 'wx25aa36a54cfd3f2a',
            'secret' => 'ead7750606259b3984876560715172f9',
            'token'  => 'zhangyuqwe',
            'response_type' => 'array',
            'log' => [
                'level' => 'debug',
                'file' => storage_path('logs/wechat.log'),
            ],
            'oauth' => [
                'scopes'   => ['snsapi_userinfo'],
                'callback' => '/oauth_callback',
            ],

        ];
        $app = Factory::officialAccount($config);
        $oauth = $app->oauth;

     // 获取 OAuth 授权结果用户信息
        $user = $oauth->user();

       session(['wechat_user'=>$user->toArray()]);

        $targetUrl = session()->has('target_url') ?  session('target_url'):'/' ;
//        header('location:'. $targetUrl); // 跳转到 user/profile
        return redirect(url($targetUrl));
    }



     public function index(){

         $oauth = $this->app->oauth;
         if (!session()->has('wechat_user')) {


             session(['target_url'=>'user/text']);

             return $oauth->redirect();
             // 这里不一定是return，如果你的框架action不是返回内容的话你就得使用
             // $oauth->redirect()->send();
         }

// 已经登录过
         $user = session('wechat_user');
//         return view('text',compact('user'));








//         $this->app->server->push(function ($message) {
//
//             if($message['MsgType'] == 'event'){
////                 return '欢迎关注 |虫象互娱| 科技公司';
//                 $url = 'http://101.200.58.23/text';
//                 return $this->app->$this->text();
//             }
//             if($message['MsgType'] == 'text')
//             {
//                 $items = [
//                     new NewsItem([
//                         'title'       => '张誉',
//                         'description' => '时间如在昨日',
//                         'url'         => 'www.baidu.com',
//                         'image'       => 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1518594074&di=8b54035ad2274c1f5a84c183dc24b895&imgtype=jpg&er=1&src=http%3A%2F%2Fimg.zcool.cn%2Fcommunity%2F01711b59426ca1a8012193a31e5398.gif',
//                     ]),
//                ];
//                return new News($items);
//
//             }
//
//         });
//         return  $this->app->server->serve();

    }

    //获取token
    public function token()
    {
        $token = file_get_contents('https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wx25aa36a54cfd3f2a&secret=ead7750606259b3984876560715172f9');
        $token = json_decode($token,true);
        return $token['access_token'];
    }

    public function text()
    {
        $user = session('wechat_user');
        return view('text',compact('user'));

    }



}