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

        ];

        $this->app = Factory::officialAccount($config);

    }
     public function index(){

         $response = $this->app->oauth->scopes(['snsapi_userinfo'])
             ->redirect(url('/text'));
         return $response;



//         $this->app->server->push(function ($message) {
//
//             if($message['MsgType'] == 'event'){
//                 return '欢迎关注 |虫象互娱| 科技公司';
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

    //自定义菜单
    public function text()
    {
        $user = $this->app->oauth->user();
        $user_asd = $user->getNickname();
        return view('text',compact('user_asd'));
    }


}