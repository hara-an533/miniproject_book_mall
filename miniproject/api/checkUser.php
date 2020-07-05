<?php

    require_once('../include/common.in.php');

    if ($openid){

        $sql = "SELECT id,name,tel,address FROM {$pre}user WHERE openid='$openid' LIMIT 1";

        $msql -> execute($sql);

        $res = $msql -> fetch();

        if ($res['id']){

            echo json_encode($res);

        } else {
            echo 'fail';
        }

    } else {
        echo 'OPENID ERROR!';
    }

?>