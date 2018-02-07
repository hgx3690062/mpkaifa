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
        $this->app->server->push(function ($message) {
                    if($message['MsgType'] == 'event'){
                        return '欢迎关注 |虫象互娱| 科技公司';
                    }


        });
        return  $this->app->server->serve();
    }
     public function index(){
        $response = $this->app->oauth->scopes(['snsapi_userinfo'])
            ->redirect(url('user/sign'));
        return $response;
    }
}