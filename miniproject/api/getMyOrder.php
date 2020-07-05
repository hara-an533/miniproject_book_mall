<?php

    require_once('../include/common.in.php');

    $tempArr = array();

    if ($openid){

        $sql = "SELECT sn,pid,dt,c1id,c2id FROM {$pre}order WHERE openid='$openid'";

        $msql -> execute($sql);

        while($res = $msql -> fetch()){

            //当前产品ID
            $pid = $res['pid'];

            //一级分类ID
            $c1id = $res['c1id'];

            //订单创建日期
            $res['dt'] = date('Y-m-d',$res['dt']);

            //订单编号
            $sn = $res['sn'];
            

            //选择产品表
            if ($c1id == BID){ //图书表
                $sql = "SELECT id,c1id,c2id,title,poster,price FROM {$pre}book WHERE id=$pid LIMIT 1";
            }

            if ($c1id == MID) { //音乐表
                $sql = "SELECT id,c1id,c2id,title,poster,price FROM {$pre}music WHERE id=$pid LIMIT 1";
            }

            if ($c1id == FID) { //电影表
                $sql = "SELECT id,c1id,c2id,title,poster,price FROM {$pre}film WHERE id=$pid LIMIT 1";
            }

            $msql -> execute($sql,'x');

            $rej = $msql -> fetch('x');

            //封面地址
            $rej['poster'] = $host.'/upload/poster/'.$rej['poster'];

            $res['productInfo'] = $rej;


            //我对该产品的评论
            $sql = "SELECT id,stars,notes FROM {$pre}comment WHERE openid='$openid' AND pid=$pid AND c1id=$c1id AND sn='$sn' LIMIT 1";
            $msql -> execute($sql,'y');
            $rek = $msql ->fetch('y');
            $res['comment'] = $rek;


            $tempArr[] = $res;

        }

        echo json_encode($tempArr);


    } else {
        echo 'error';
    }

?>