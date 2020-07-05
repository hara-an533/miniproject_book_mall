<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>注册</title>
</head>

<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        //公用文件
        require_once('../include/common.in.php');

        if(!preg_match('/^[A-Z]{4,10}$/',$username) || $pwd != $pwd2 || strtolower($code) != strtolower($_SESSION['code'])){

            echo '填写有误!';
           
        } else {

            $pwd = substr(md5(sha1($pwd)),5,15);

            $sql = "INSERT INTO {$pre}admin (username,pwd) VALUES ('$username','$pwd')";
            $msql -> execute($sql);

            $res = $msql -> affectedRows();
            if ($res >0){
                
                echo '注册成功';

                //跳转登录
                jump('login.php');

            } else {
                echo '注册失败';
                $msql -> error();
            }

        }

    }

?>

<body>
    <form action="" method="POST">
        <div>
            <p><label>用户名：</label><input type="text" name="username" id="username" /></p>
            <p><label>密码：</label><input type="password" name="pwd" id="pwd" /></p>
            <p><label>密码确认：</label><input type="password" name="pwd2" id="pwd2" /></p>
            <p><label>验证码：</label><input type="text" name="code" id="code" /><img src="../include/code.php" onclick="this.src='../include/code.php?'+Math.random()" /></p>
            <p><input type="submit" value="注册" /></p>
            <p><a href="login.php">登录</a></p>
        </div>

    </form>
</body>

</html>