<?php

# 头信息  页面设置为html, 解析中文
header("Content-type:text/html;charset=utf8");

# 获取数据
$name=$_POST["name"];
$sex=$_POST["sex"];
$age=$_POST["age"];
$tel=$_POST["tel"];

//连接数据库
include "dd.php";

//创建sql语句
$sql = "INSERT INTO students (username, sex, age,tel)
VALUES ('$name','$sex','$age','$tel')";
//执行
if ($mysql->query($sql)) {
    echo "<script>location.href='index.php'</script>";
} else {
    echo "<script>alert('添加失败！')</script>".$mysql->error;
    echo "<script>location.href='add.php'</script>";
}
?>