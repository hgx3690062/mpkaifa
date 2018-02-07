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
use EasyWeChat\Kernel\Messages\Article;
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
//                 $items = [
//                     new NewsItem([
//                         'title'       => '大天使',
//                         'description' => '...',
//                         'image'       => 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1518587553&di=9844748cf55c841dd907040eb724eb75&imgtype=jpg&er=1&src=http%3A%2F%2Fimg.zcool.cn%2Fcommunity%2F01711b59426ca1a8012193a31e5398.gif',
//                         // ...
//                     ]),
//            ];
//            $news = new News($items);
//            return $news;
                 $article = new Article([
                     'title'   => '张誉',
                     'author'  => '胡',
                     'content' => '虽然时间已经远去，但又仿佛在昨天！',
                     'source_url' => 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1518587553&di=9844748cf55c841dd907040eb724eb75&imgtype=jpg&er=1&src=http%3A%2F%2Fimg.zcool.cn%2Fcommunity%2F01711b59426ca1a8012193a31e5398.gif',
                     'show_cover' =>1,
                 ]);
                 $news = new News($article);
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