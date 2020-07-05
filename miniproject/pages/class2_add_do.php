<?php
    require_once('../include/common.in.php');

    //初始化
    $dstPath = '';

    //上传图标
    $ico = $_FILES['ico'];

    if ($ico['name']){

        $dstPath = upload('../upload/ico',$ico);

    }

    if ($title){
        $sql = "INSERT INTO {$pre}class2 (c1id,c2name,url) VALUES ($c1id,'$title','$dstPath')";

        $msql -> execute($sql);

        $as = $msql -> affectedRows();

        if ($as >0){
            echo 'success';
        } else {
            echo '创建失败！';
            
        }
    } else {
        echo '缺少参数';
    }

?>