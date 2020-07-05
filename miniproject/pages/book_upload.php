<?php

    $file = $_FILES["file"];

    //目标文件
    $dstUrl = '../upload/'.$file['name'];

    //执行上传
    move_uploaded_file($file['tmp_name'],$dstUrl);

    //返回值
    $data = array("code"=> 0 ,"msg"=> "error!" ,"data"=> array("src"=> 'upload/'.$file['name'],"title"=> "上传的图片"));

    echo json_encode( $data );
