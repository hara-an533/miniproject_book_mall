<?php

    require_once('../include/common.in.php');

    $tmpArr = array();

    if ($code){

        $sql = "SELECT id FROM {$pre}book WHERE code='$code' LIMIT 1";

        $msql -> execute($sql);

        $res = $msql -> fetch();

        if ($res['id']){
            $tmpArr['status'] = 200;
            $tmpArr['id'] = $res['id'];

        } else {
            $tmpArr['status'] = 100;
        }

    } else {
        $tmpArr['status'] = 300;
    }

    echo json_encode($tmpArr);

?>