<?php

# 连接数据库
$mysql = new mysqli('localhost','root','','student');
if ($mysql->connect_error) {
    // die 输出，并且终止
    die("<br>连接失败: " . $mysql->connect_error);
}
//echo "<br>连接成功";

# mysql中文数据库出现乱码数据库采用UTF8编码
$mysql->query("set names utf8");
//$mysql->set_charset('utf8');

?>