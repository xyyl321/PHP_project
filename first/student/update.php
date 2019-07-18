<?php
header("Content-type:text/html;charset=utf8");

//$id=$_GET['id'];

# 获取数据
$id=$_POST['id'];
$name=$_POST["name"];
$sex=$_POST["sex"];
$age=$_POST["age"];
$tel=$_POST["tel"];

//连接数据库
include "dd.php";

//创建sql语句
$sql = "update students set username='$name',sex='$sex',age='$age',tel='$tel' where id='$id'";
//执行
$result=$mysql->query($sql);
if ($mysql->affected_rows) {
    echo "<script>location.href='index.php'</script>";
} else {
    echo "<script>alert('修改失败！')</script>".$mysql->error;
    echo "<script>location.href='edit.php'</script>";
}
?>