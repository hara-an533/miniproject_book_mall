<?php

    require_once('../include/common.in.php');

    //初始化
    $tmpArr = array();
    $where_ = "";
    
    //开始读取的位置
    $start = $start ? $start :0;

    //每页读取的记录数
    $pageSize = 4;

    //接收类别和分类ID
    if ($tag && $c2id){

        //搜索词
        if ($columnName && $keywords){

            if ($columnName == 'publicer'){
                $where_ = " AND publicer='$keywords'";
            }

            if ($columnName == 'author'){
                $where_ = " AND author='$keywords'";
            }

        }

        switch ($tag){

            case 'book':
                $sql = "SELECT id,title,poster,author,publicer,descript,dt,price FROM {$pre}book WHERE c2id=$c2id $where_ LIMIT $start,$pageSize";
            break;

            case 'music':
                $sql = "";
            break;

            case 'film':
                $sql = "";
            break;

        }

        //执行语句，获取数据
        $msql -> execute($sql);

        while($res = $msql -> fetch()){

            //补全地址
            $res['poster'] = $host.'/upload/poster/'.$res['poster'];

            //出版时间
            $res['dt'] = date('Y-m-d H:i:s',$res['dt']);

            //描述
            $res['descript'] = strip_tags($res['descript']);
            $res['descript'] = mb_substr($res['descript'],0,30,'utf8').'...';

            //价格
            $price = explode('.',$res['price']);
            $res['price_int'] = $price[0];
            $res['price_dec'] = $price[1];

            $tmpArr[] = $res;

        }

        //json输出
        echo json_encode($tmpArr);


    }

?>