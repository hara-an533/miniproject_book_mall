<?php

    require_once('../include/common.in.php');

    //初始化
    $dstUrl = '';

    //接收文件
    $file = $_FILES['file'];
    if ($file['name']){

        //目录
        $dir = '../upload/users';
        if (!file_exists($dir)){
            @mkdir($dir);
        }

        //上传头像
        $dstUrl = upload($dir,$file);
    }

    //入库
    if ($openid && $username && $tel && $address){

        //判断如果有则修改，如果没有则新增
        $sql = "SELECT id FROM {$pre}user WHERE openid='$openid'";
        $msql -> execute($sql);
        $res = $msql -> fetch();

        if (!$res['id']){ //没有注册过，新增

            $sql = "INSERT INTO {$pre}user (openid,name,address,tel,post,ico) VALUES ('$openid','$username','$address','$tel','$post','$dstUrl')";

        } else { //注册过，修改

            if ($dstUrl){ //重新上传头像

                $sql = "UPDATE {$pre}user SET name='$username',tel='$tel',address='$address',ico='$dstUrl' WHERE openid='$openid'";

            } else { //不更改头像
                
                $sql = "UPDATE {$pre}user SET name='$username',tel='$tel',address='$address' WHERE openid='$openid'";
            }
            
        }
        

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