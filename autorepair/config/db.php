<?php

    header("Content-type:text/html;charset=utf8;");

    $mysql = new mysqli("localhost","root","","autorepair");
    if($mysql->connect_errno){
        die('连接失败：'.$mysql->connect_errno);
    }
    //echo '连接成功';
    //将数据库姓名转换为中文
    $mysql->set_charset('utf8');

?>