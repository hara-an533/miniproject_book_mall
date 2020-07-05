<?php

    require_once('../include/common.in.php');

    session_destroy();

    jump('login.php',0);

?>