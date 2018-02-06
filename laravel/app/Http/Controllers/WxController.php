<?php
/**
 * Created by PhpStorm.
 * User: hugangxi
 * Date: 2018/2/6
 * Time: 上午10:36
 */

namespace App\Http\Controllers;

use EasyWeChat\Factory;
use EasyWeChat\Payment\Application;
class WxController extends Controller
{
    public function index()
    {

        $options = [
            'debug'  => true,
            'app_id'  => 'wx25aa36a54cfd3f2a',
            'secret'   => 'ead7750606259b3984876560715172f9',
            'token'    => 'weixin',
            'log'       => [
                'level'   =>  'debug',
                'file'     =>__DIR__.'/wechat.log',
            ]
        ];
//

        $app  = new Application($options);
        $response = $app->server->serve();
        return $response;



//        new Factory()
//        if(isset($_GET['echostr'])) {
//            $signatrue   = $_GET['signatrue'];
//            $token         = 'weixin';
//            $timestamp = $_GET['timestamp'];
//            $nonce         = $_GET['nonce'];
//            $arr = [$token, $timestamp, $nonce];
//            sort($arr, SORT_STRING);
//
//            $str = implode('', $arr);
//            $str = sha1($str);
//
//            if ($str === $signatrue) {
//                return $_GET['echostr'];
//                exit;
//            }

//        }
//        else
//        {

            //        $xml = "<xml>
            //                   <ToUserName><![CDATA[toUser]]></ToUserName>
            //                   <FromUserName><![CDATA[fromUser]]></FromUserName>
            //                   <CreateTime>1348831860</CreateTime>
            //                   <MsgType><![CDATA[text]]></MsgType>
            //                   <Content><![CDATA[this is a test]]></Content>
            //                   <MsgId>1234567890123456</MsgId>
            //                 </xml>";
//                        $xml = $HTTP_RAW_POST_DATA;
//                        $postObj = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA);
//
//
//
//                    $toUsername = $postObj->FromUserName; //用户微信号
//                    $fromUsername = $postObj->ToUserName; //开发者微信号
//                    $msgType = $postObj->MsgType; //回复类型
//                    $content = $postObj->Content;   //获取用户发的信息
//                    $time = time(); //时间戳
//
//                    $tpl = "<xml>  <ToUserName><![CDATA[".$toUsername."]]></ToUserName>
//                                   <FromUserName><![CDATA[".$fromUsername."]]></FromUserName>
//                                   <CreateTime>".time()."</CreateTime>
//                                   <MsgType><![CDATA[text]]></MsgType>
//                                   <Content><![CDATA[".$content."]]></Content>
//                                   </xml>";
//                    echo $tpl;



//        }
    }
}