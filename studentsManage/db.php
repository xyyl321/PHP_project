<?php

$mysql=new mysqli('localhost','root','','studentsmanager');
if($mysql->connect_errno){
    die('连接失败：'.$mysql->connect_errno);
}
//echo '连接成功';
//将数据库姓名转换为中文
$mysql->query('set names utf8');
?>