<?php
header("Content-type:text/html;charset=utf8;");

$id=$_GET['id'];

include "dd.php";

$sql="delete from students where id='$id'";
$result=$mysql->query($sql);
if($result){
    echo "<script>alert('删除成功')</script>";
    echo "<script>location.href='index.php'</script>";
}else{
    echo "<script>alert('删除失败')</script>";
    echo "<script>location.href='index.php'</script>";
}

?>