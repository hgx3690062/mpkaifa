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
        $signatrue     = $_GET['signatrue'];
        $token         = 'weixin';
        $timestamp     = $_GET['timestamp'];
        $nonce         = $_GET['nonce'];

        $arr = [$token , $timestamp , $nonce ];
        sort( $arr ,SORT_STRING );

        $str  = implode( '' , $arr );
        $str  = sha1($str);

        if( $str === $signatrue )
        {
            return $_GET['echostr'];
            exit;
        }
    }
}