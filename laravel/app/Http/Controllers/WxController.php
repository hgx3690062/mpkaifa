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
                 $items = [
                     new NewsItem([
                         'title'       => '张誉',
                         'description' => '时间如在昨日',
                         'url'         => 'www.baidu.com',
                         'image'       => 'data:image/jpeg;base64,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',
                         // ...
                     ]),
                ];
                return new News($items);
             }



         });
         return  $this->app->server->serve();
    }


}