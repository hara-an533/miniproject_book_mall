<?php

    //引入公用文件
    require_once('../include/common.in.php');

    //初始化
    $tmpArr = array();

    //sql
    $sql = "SELECT id,c2name,url FROM {$pre}class2 WHERE c1id=".BID;
    $msql -> execute($sql);
    while($res = $msql -> fetch()){

        //补全地址
        $res['url'] = $host.'/upload/ico/'.$res['url'];
        $tmpArr[] = $res;

    }

    //输出json
    echo json_encode($tmpArr);


?>