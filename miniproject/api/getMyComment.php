<?php

    require_once('../include/common.in.php');

    $tmpArr = array();

    if ($openid){

        $sql = "SELECT id,pid,c1id,stars,notes FROM {$pre}comment WHERE openid='$openid'";

        $msql -> execute($sql);

        while($res = $msql ->fetch()){

            //产品ID
            $pid = $res['pid'];

            //一级分类ID
            $c1id = $res['c1id'];

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


            //存入数组
            $tmpArr[] = $res;

        }

        //输出json
        echo json_encode($tmpArr);

    }

?>