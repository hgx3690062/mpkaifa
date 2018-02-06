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

        $postStr = $GLOBALS['HTTP_RAW_POST_DATA'];

        file_put_contents(__DIR__.'/wechat.log',$postStr);

//        $appId = 'wx8d75fb66b9f2a882';
//        $appSecret = 'd80927fc1c975d3ff36a5aad6f9d9766';
//
//        $access = '6_HoYWiqmaT8m5C0X9xuH5th_B8wdjjJDeA_AIcFSTbfvgLUAtxl7fwMgZZ4RIENmRfVCmdgFUUJy0uoio0vhzV4_4MOMP_3bFlQZ3PQyq9dxRVoglRLqj5VkNqMJo1KuQn5YOB6KNR1BIYgn-FKHdAGABGD';
//        //curl 使用get获取access_token
//        $ch = curl_init();  //开启curl
//        //需要访问的地址
////        $url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$appId.'&secret='.$appSecret;
//        $url = 'https://api.weixin.qq.com/cgi-bin/getcallbackip?access_token='.$access;
//
//        curl_setopt($ch,CURLOPT_URL,$url); //写入要访问的地址
//
//        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); //声明最后的结果不直接输入而是赋给一个变量curl_exec($ch)
//
//        curl_setopt($ch,CURLOPT_HEADER,0);//header的头出了问题0是隐藏掉;
//
//        curl_setopt($ch,CURLOPT_TIMEOUT,10);//10秒
//
//        $output = curl_exec($ch);
//
//        dd($output);
//        exit;
//        $signatrue   = $_GET['signature'];
//        $token         = 'zhangyu';
//        $timestamp = $_GET['timestamp'];
//        $nonce         = $_GET['nonce'];
//
//        $arr = [$token , $timestamp , $nonce ];
//        sort( $arr ,SORT_STRING );
//
//        $str  = implode( '' , $arr );
//        $str  = sha1($str);
//
//        if( $str === $signatrue )
//        {
//            return $_GET['echostr'];
//            exit;
//        }

    }
}