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

        $postStr = isset($GLOBALS['HTTP_RAW_POST_DATA']) ? $GLOBALS['HTTP_RAW_POST_DATA'] : file_get_contents("php://input");
        $postObj   = simplexml_load_string($postStr,'SimpleXMLElement',LIBXML_NOCDATA);
        $toUsername = $postObj->FromUserName; //用户微信号
        $fromUsername = $postObj->ToUserName; //开发者微信号
        $msgType = $postObj->MsgType; //回复类型
        $content = $postObj->Content;   //获取用户发的信息
        $time = time(); //时间戳

        $tpl = "<xml>  <ToUserName>< ![CDATA[%s] ]></ToUserName>
                       <FromUserName>< ![CDATA[%s] ]></FromUserName> 
                       <CreateTime>%s</CreateTime> 
                       <MsgType>< ![CDATA[%s] ]></MsgType>
                       <Content>< ![CDATA[%s] ]></Content>
                       </xml>";

        if($msgType == 'text')
        {
            $msgtype = 'text';
            $contents = '张誉';
            $sprintf = sprintf($tpl,$toUsername,$fromUsername,$time,$msgtype,$contents);
            echo $sprintf;
        }
    }
}