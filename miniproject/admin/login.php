<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        //公用文件
        require_once('../include/common.in.php');

        if(!preg_match('/^[A-Z]{4,10}$/',$username) || strtolower($code) != strtolower($_SESSION['code'])){

            echo '填写有误!';
           
        } else {

            $pwd = substr(md5(sha1($pwd)),5,15);

            $sql = "SELECT id FROM {$pre}admin WHERE username='$username' AND pwd='$pwd'";
            $msql -> execute($sql);
            $res = $msql ->fetch();

            if ($res['id']){
                
                echo '登录成功';

                //创建SESSION
                $_SESSION['ADMIN'] = $username;

                //跳转登录
                jump('../index.php');

            } else {
                echo '登录失败';
            }

        }

    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登录</title>
</head>

<body>
    <form action="" method="POST">
        <div>
            <p><label>用户名：</label><input type="text" name="username" id="username" /></p>
            <p><label>密码：</label><input type="password" name="pwd" id="pwd" /></p>
            <p><label>验证码：</label><input type="text" name="code" id="code" maxlength="4" /><img src="../include/code.php" onclick="this.src='../include/code.php?'+Math.random()" /></p>
            <p><input type="submit" value="登录" /></p>
            <p><a href="reg.php">注册</a></p>
        </div>

    </form>
</body>

</html>