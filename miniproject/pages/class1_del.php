<?php

    require_once('../include/common.in.php');

    if ($id){

        $sql = "DELETE FROM {$pre}class1 WHERE id=$id";

        $msql -> execute($sql);

        $as = $msql -> affectedRows();

        if ($as >0){
            echo 'success';
        } else {
            echo 'fail';
        }

    } else {
        echo 'fail';
    }

?>