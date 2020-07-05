<?php

    //设置页面内容编码
    header("Content-type:text/html;charset=utf8");

    //限制报错
    error_reporting(E_ALL || ~E_NOTICE);

    //开启session
    session_start();

    //优化数据接收$_GET,$_POST
    foreach(array('_GET','_POST') as $item){

        foreach($$item as $key =>$value){
            
            if (is_array($value)){
                $$key = $value;
            } else {
                $$key = addslashes($value);
            }
            
            
        }

    }

    //一级分类ID
    define('BID',1);
    define('MID',2);
    define('FID',3);

    //主机地址
    // $host = 'http://localhost/miniproject';
    $host = 'https://www.fuhushi.com/web1912/xm/miniproject';

    //函数
    require_once('function.fn.php');

    //数据库操作类
    require_once('db.class.php');

    //验证码类
    require_once('vcode.class.php');

?>