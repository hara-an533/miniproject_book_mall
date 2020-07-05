<?php

    require_once('../include/common.in.php');

    // echo $status.'***'.$c1id.'***'.$c2id.'***'.$id.'***'.$openid;

    if ($c1id && $c2id && $id && $openid){

        $sql = "SELECT id FROM {$pre}favorite WHERE c2id=$c2id && pid=$id";
        $msql -> execute($sql);
        $res = $msql -> fetch();

        $dt =time();

        //如果没有则新增
        if (!$res['id']){
            $sql = "INSERT INTO {$pre}favorite(c1id,c2id,pid,openid,dt,status) VALUES ($c1id,$c2id,$id,'$openid',$dt,$status)";
            $msql -> execute($sql);
        } else { //如果有则修改
            $sql = "UPDATE {$pre}favorite SET status=$status WHERE c2id=$c2id AND pid=$id";
            $msql -> execute($sql);
        }

        //返回执行结果
        $as = $msql -> affectedRows();

        if ($as>0){
            echo 'success';
        } else {
            echo 'fail';
        }

    } else {
        echo 'fail22';
    }

?>