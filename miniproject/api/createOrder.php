<?php

require_once('../include/common.in.php');

//初始化
$value = '';

//取消转义
$cart = stripslashes($cart);

//解码购物车
$cart = json_decode($cart, 'true');


//创建订单编号#FG34536565
$str = 'ABCDEFJHIJKLNMPQRSTUVWXYZ';

for ($i = 0; $i < 2; $i++) {

    //随机数
    $index = mt_rand(0, strlen($str) - 1);

    //字母
    $letter .= $str[$index];
}

for ($i = 0; $i < 8; $i++) {

    $rand .= mt_rand(1, 9);
}

$sn = $letter . $rand;

//创建日期
$dt = time();

//订单入库
if ($openid && $sn && count($cart) > 0) {

    foreach ($cart as $key => $item) {

        //c1id
        $c1id = $item['c1id'];

        //c2id
        $c2id = $item['c2id'];

        //pid
        $pid = $item['id'];

        //count
        $count = $item['count'];


        $value .= "('$sn',$c1id,$c2id,$pid,$count,'$openid',$dt),";
    }

    //去掉末尾逗号
    $value = substr($value, 0, -1);

    //入库
    $sql = "INSERT INTO {$pre}order (sn,c1id,c2id,pid,counts,openid,dt) VALUES $value";

    //执行
    $msql->execute($sql);

    //返回值
    $as = $msql->affectedRows();

    if ($as > 0) {
        echo 'success';
    } else {
        echo 'fail';
    }
} else {

    echo 'error';
}
