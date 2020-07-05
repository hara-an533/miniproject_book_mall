<?php
    require_once('../include/common.in.php');

    //删除缩略图文件
    if ($id){

        $sql = "SELECT url FROM {$pre}thumb WHERE pid=$id";

        $msql -> execute($sql);

        while($res = $msql -> fetch()){

            $url = '../upload/photos/'.$res['url'];

            if (file_exists($url)){
                @unlink($url);
            }

        }

    }

    //删除缩略图记录
    $sql = "DELETE FROM {$pre}thumb WHERE pid=$id";
    $msql -> execute($sql);


    //删除封面文件
    $sql = "SELECT poster FROM {$pre}book WHERE id=$id LIMIT 1";
    
    $msql -> execute($sql);

    $res = $msql -> fetch();

    $url = '../upload/poster/'.$res['poster'];

    if (file_exists($url)){
        @unlink($url);
    }

    //删除主体记录
    $sql = "DELETE FROM {$pre}book WHERE id=$id";

    $msql -> execute($sql);

    $as = $msql -> affectedRows();

    if ($as >0){

        echo 'success';
    } else {
        echo 'fail';
    }

?>