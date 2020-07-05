<?php
    require_once('../include/common.in.php');

    if ($title){
        $sql = "INSERT INTO {$pre}class1 (c1name) VALUES ('$title')";

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