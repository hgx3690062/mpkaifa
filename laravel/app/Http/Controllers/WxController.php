<?php
/**
 * Created by PhpStorm.
 * User: hugangxi
 * Date: 2018/2/6
 * Time: 上午10:36
 */

namespace App\Http\Controllers;
use EasyWeChat\Factory;
use EasyWeChat\Kernel\Messages\Transfer;
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
            'log' => [
                'level' => 'debug',
                'file' => storage_path('logs/wechat.log'),
            ],

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
//                 $items = [
//                     new NewsItem([
//                         'title'       => '张誉',
//                         'description' => '时间如在昨日',
//                         'url'         => 'www.baidu.com',
//                         'image'       => 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1518594074&di=8b54035ad2274c1f5a84c183dc24b895&imgtype=jpg&er=1&src=http%3A%2F%2Fimg.zcool.cn%2Fcommunity%2F01711b59426ca1a8012193a31e5398.gif',
//                     ]),
//                ];
//                return new News($items);
               $ams = $this->app->template_message->sendSubscription([
                     'touser' => 'user-openid',
                     'template_id' => 'template-id',
                     'url' => 'https://easywechat.org',
                     'scene' => 1000,
                     'data' => [
                         'key1' => 'VALUE',
                ],
            ]);
               return $ams;
             }



         });
         return  $this->app->server->serve();
    }


}