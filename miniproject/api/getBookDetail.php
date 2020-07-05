<?php

    require_once('../include/common.in.php');

    //初始化
    $tmpArr = array();

    //获取详情
    if ($id){

        $sql = "SELECT b.id,b.c1id,c2id,title,price,descript,author,publicer,c2name,poster FROM {$pre}book as b LEFT JOIN {$pre}class2 as c2 ON (b.c2id=c2.id) WHERE b.id=$id LIMIT 1";

        $msql -> execute($sql);

        $res = $msql -> fetch();

        //封面地址
        $res['poster'] = $host.'/upload/poster/'.$res['poster'];

        //价格
        $price = explode('.',$res['price']);
        $res['price_int'] = $price[0];
        $res['price_dec'] = $price[1];

        //缩略图
        $sql = "SELECT url FROM {$pre}thumb WHERE pid=$id";
        $msql -> execute($sql);
        while($rej = $msql ->fetch()){

            //补全地址
            $rej['url'] = $host.'/upload/photos/'.$rej['url'];

            //存入数组
            $tmpArr[] = $rej;

        }

        //收藏
        $sql = "SELECT status FROM {$pre}favorite WHERE pid=$id AND c2id=".$res['c2id'];
        $msql -> execute($sql);
        $rex = $msql -> fetch();
        if (!$rex['status']){
            $res['favoriteStatus'] = false;
        } else {
            $res['favoriteStatus'] = true;
        }

        //评论


        $res['thumb'] = $tmpArr;

        echo json_encode($res);

    }

?>