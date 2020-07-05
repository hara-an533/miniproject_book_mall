<?php

//页面跳转
function jump($url, $time = 2000)
{

    echo '<script>';
    echo 'setTimeout(function(){location.href="' . $url . '"},' . $time . ')';
    echo '</script>';
}

//文件上传
function upload($path = 'uploads', $file)
{

    if ($file['name']) {

        //临时文件地址
        $tmpPath = $file['tmp_name'];

        //目录创建
        if (!is_dir($path)) {
            @mkdir($path);
        }

        //新文件名
        $newFileName = time() . mt_rand(10, 99);

        //扩展名
        $pathinfo = pathinfo($file['name']);
        $extention = $pathinfo['extension'];

        //远程文件地址
        $dstPath = $path . '/' . $newFileName . '.' . $extention;  //uploads/15254513213.jpg

        //上传
        if (move_uploaded_file($tmpPath, $dstPath)) {
            return $newFileName . '.' . $extention;
        } else {
            return 'fail';
        }
    } else {
        return 'no choice!';
    }
}

//上传多文件
function uploadMore($path = 'uploads', $file)
{

    if ($file) {

        //目录创建
        if (!is_dir($path)) {
            @mkdir($path);
        }

        //初始化
        $tmpArr = array();


        for ($i = 0; $i < count($file['name']); $i++) {

            //当前文件的名称
            $currentFileName = $file['name'][$i];

            //当前文件的临时文件路径
            $currentTmpName = $file['tmp_name'][$i];

            //新文件名
            $newFileName = time() . mt_rand(10, 99).$i;

            //扩展名
            $pathinfo = pathinfo($currentFileName);
            $extention = $pathinfo['extension'];

            //远程文件地址
            $dstPath = $path . '/' . $newFileName . '.' . $extention;  //uploads/15254513213.jpg

             //上传
            if (move_uploaded_file($currentTmpName, $dstPath)) {
                array_push($tmpArr,$newFileName . '.' . $extention);
            } else {
                return 'fail';
            }

        }

        //返回结果
        return $tmpArr;

       
    } else {
        return 'no choice!';
    }
}

?>