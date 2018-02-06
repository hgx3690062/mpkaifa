<?php
/**
 * Created by PhpStorm.
 * User: hugangxi
 * Date: 2018/2/6
 * Time: 上午10:36
 */

namespace App\Http\Controllers;


class WxController extends Controller
{
    public function index()
    {
        $signatrue   = $_GET['signatrue'];
        $token         = 'weixin';
        $timestamp = $_GET['timestamp'];
        $nonce         = $_GET['nonce'];

        if($_GET['echostr']) {

            $arr = [$token, $timestamp, $nonce];
            sort($arr, SORT_STRING);

            $str = implode('', $arr);
            $str = sha1($str);

            if ($str === $signatrue) {
                return $_GET['echostr'];
                exit;
            }

        }
        else {

            //        $xml = "<xml>
            //                   <ToUserName><![CDATA[toUser]]></ToUserName>
            //                   <FromUserName><![CDATA[fromUser]]></FromUserName>
            //                   <CreateTime>1348831860</CreateTime>
            //                   <MsgType><![CDATA[text]]></MsgType>
            //                   <Content><![CDATA[this is a test]]></Content>
            //                   <MsgId>1234567890123456</MsgId>
            //                 </xml>";
                        $xml = $GLOBALS['HTTP_RAW_POST_DATA'];
                        $postObj = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA);



                    $toUsername = $postObj->FromUserName; //用户微信号
                    $fromUsername = $postObj->ToUserName; //开发者微信号
                    $msgType = $postObj->MsgType; //回复类型
                    $content = $postObj->Content;   //获取用户发的信息
                    $time = time(); //时间戳

                    $tpl = "<xml>  <ToUserName><![CDATA[".$toUsername."]]></ToUserName>
                                   <FromUserName><![CDATA[".$fromUsername."]]></FromUserName>
                                   <CreateTime>".time()."</CreateTime>
                                   <MsgType><![CDATA[text]]></MsgType>
                                   <Content><![CDATA[".$content."]]></Content>
                                   </xml>";
                    echo $tpl;



        }
    }
}