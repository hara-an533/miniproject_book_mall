<?php

    require_once('../include/common.in.php');

    $tmpArr = array();

    $sql = "SELECT pid, avg(stars) as avgstars FROM {$pre}comment WHERE c1id=".BID." GROUP BY pid Having avgstars=5 ORDER BY id DESC LIMIT 1";

    $msql -> execute($sql);

    while($res = $msql -> fetch()){

        $tmpArr[] = $res;

    }

    echo json_encode($tmpArr);

?>