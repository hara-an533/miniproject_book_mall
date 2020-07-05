<?php

    require_once('../include/common.in.php');

    // echo $sn.'***'.$c1id.'***'.$c2id.'***'.$openid.'***'.$pid.'***'.$stars.'***'.$notes.'***'.$cid;

    
    if ($openid && $stars && $cid){

        // $dt = time();

        // $sql = "INSERT INTO {$pre}comment (sn,c1id,c2id,pid,openid,stars,notes,dt) VALUES ('$sn',$c1id,$c2id,$pid,'$openid',$stars,'$notes',$dt)";

        $sql = "UPDATE {$pre}comment SET stars=$stars,notes='$notes' WHERE id=$cid";

        $msql -> execute($sql);

        $as = $msql -> affectedRows();

        if ($as >0){
            echo 'success';
        } else {
            echo 'fail';
        }

    } else {
        echo 'error';
    }
    

?>