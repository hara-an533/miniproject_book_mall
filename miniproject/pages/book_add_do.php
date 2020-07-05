<?php

    //公用文件
    require_once('../include/common.in.php');

    //接收封面
    $poster = $_FILES['poster'];

    //缩略图
    $photos = $_FILES['photos'];

    //当前时间戳
    $dt = time();

    //是否推荐
    $isrecommend = $isrecommend == 'undefined' ? 0 : 1;

    //是否包邮
    $isfree = $isfree == 'undefined' ? 0 : 1;

    //////////////////////////////////////////////////

    //上传封面
    $newPoster = upload('../upload/poster',$poster);

    //上传缩略图
    $newPhotos = uploadMore('../upload/photos',$photos);

    ////////////////////////////////////////////////


    //入库
    $sql = "INSERT INTO {$pre}book (c1id,c2id,title,price,author,publicer,poster,descript,isfree,isrecommend,dt) VALUES (".BID.",$c2id,'$title',$price,'$author','$publicer','$newPoster','$descript',$isfree,$isrecommend,$dt)";
    $msql -> execute($sql);

    //获取刚刚插入的ID
    $pid = $msql -> insertId();

    //主体产品入库结果
    $as = $msql -> affectedRows();
    if ($as >0){
        echo 'success';
    } else {
        echo 'fail';
    }

    //初始化
    $values = '';

    //缩略图入库
    if (count($newPhotos) >0){

        foreach($newPhotos as $item){
            $values .= "($pid,'$item'),";
        }

        //去掉末尾逗号
        $values = substr($values,0,-1); //(2,xxxx.jpg),(2,xxxxdfd.jpn)

        //入库
        $sql = "INSERT INTO {$pre}thumb (pid,url) VALUES $values";
        $msql -> execute($sql);

    }

?>