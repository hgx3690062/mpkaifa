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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
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
        $oauth =  $this->app->oauth;

     // 获取 OAuth 授权结果用户信息
        $user = $oauth->user();

       session(['wechat_user'=>$user->toArray()]);

        $targetUrl = session()->has('target_url') ?  session('target_url'):'/' ;
//        header('location:'. $targetUrl); // 跳转到 user/profile
        return redirect(url($targetUrl));
    }

    public function auth_wechat(){
        $response = $this->app->oauth->scopes(['snsapi_userinfo'])
            ->redirect(url('wx'));
        return $response;
    }

     public function index(Request $request){
         if(!$request->has('code') || Cache::get($request->get('code'))){
             return redirect('/');
         }
         $code = $request->get('code');
         Cache::put($code,1,60*24);

         // 已经登录过
         $user = session('wechat_user');
         return view('text',compact('user'));


    }

    public function text()
    {
        $user = session('wechat_user');
        return view('text',compact('user'));

    }


    //获取token
    public function token()
    {
        $token = file_get_contents('https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wx25aa36a54cfd3f2a&secret=ead7750606259b3984876560715172f9');
        $token = json_decode($token,true);
        return $token['access_token'];
    }




}