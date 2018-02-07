<?php
/**
 * Created by PhpStorm.
 * User: hugangxi
 * Date: 2018/2/6
 * Time: 上午10:36
 */

namespace App\Http\Controllers;
use EasyWeChat\Factory;
use EasyWeChat\Kernel\Messages\Text;
use EasyWeChat\Kernel\Messages\News;
use EasyWeChat\Kernel\Messages\NewsItem;
class WxController extends Controller
{
    protected $app ;
    public function __construct()
    {
        $config = [
            'app_id' => 'wx8d75fb66b9f2a882',
            'secret' => '2a43f2737dec1eaa01667ecbacd97e5b',
            'token'  => 'zhangyuqwe',
            'response_type' => 'array',

        ];

        $this->app = Factory::officialAccount($config);

    }
     public function index(){
         $this->app->server->push(function ($message) {
             if($message['MsgType'] == 'event'){
                 return '欢迎关注 |虫象互娱| 科技公司';
             }

             if($message['MsgType'] == 'text')
             {
                 $items = [
                     new NewsItem([
                         'title'       => '大天使',
                         'description' => '...',
                         'url'         => 'http://image.baidu.com/search/detail?ct=503316480&z=undefined&tn=baiduimagedetail&ipn=d&word=%E5%9B%BE%E7%89%87&step_word=&ie=utf-8&in=&cl=2&lm=-1&st=undefined&cs=3357021395,3491635869&os=332373507,1834882683&simid=0,0&pn=1&rn=1&di=6218379970&ln=1981&fr=&fmq=1517982648787_R&fm=&ic=undefined&s=undefined&se=&sme=&tab=0&width=undefined&height=undefined&face=undefined&is=0,0&istype=0&ist=&jit=&bdtype=0&spn=0&pi=0&gsm=0&objurl=http%3A%2F%2Fimg.zcool.cn%2Fcommunity%2F01711b59426ca1a8012193a31e5398.gif&rpstart=0&rpnum=0&adpicid=0',
                         'image'       => 'http://image.baidu.com/search/detail?ct=503316480&z=undefined&tn=baiduimagedetail&ipn=d&word=%E5%9B%BE%E7%89%87&step_word=&ie=utf-8&in=&cl=2&lm=-1&st=undefined&cs=3357021395,3491635869&os=332373507,1834882683&simid=0,0&pn=1&rn=1&di=6218379970&ln=1981&fr=&fmq=1517982648787_R&fm=&ic=undefined&s=undefined&se=&sme=&tab=0&width=undefined&height=undefined&face=undefined&is=0,0&istype=0&ist=&jit=&bdtype=0&spn=0&pi=0&gsm=0&objurl=http%3A%2F%2Fimg.zcool.cn%2Fcommunity%2F01711b59426ca1a8012193a31e5398.gif&rpstart=0&rpnum=0&adpicid=0',
                         // ...
                     ]),
            ];
            $news = new News($items);
            return $news;
             }


         });
         return  $this->app->server->serve();
    }

    public function user()
    {

    }
//Route::get('/user', function () {
//    $user = session('wechat.oauth_user'); // 拿到授权用户资料
//
//    return
//    });
}