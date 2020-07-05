<?php

    require_once('../include/common.in.php');

    if ($openid){

        $sql = "SELECT id,name,ico,tel,address,post FROM {$pre}user WHERE openid='$openid' LIMIT 1";

        $msql -> execute($sql);

        $res = $msql -> fetch();

        if ($res['id']){

            //地址
            $res['ico'] = $host.'/upload/users/'.$res['ico'];

            echo json_encode($res);

        } else {
            echo 'none';
        }

    } else {
        echo 'error';
    }

?>