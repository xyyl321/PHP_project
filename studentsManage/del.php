<?php
    header('Content-type:text/html;charset=utf8');
    //创建连接
    include 'db.php';
    //获取iD
    $id=$_GET["id"];
    //var_dump($id);
    //删除数据库中的数据
    $sql="delete from students where id='$id'";
    $resutl=$mysql->query($sql);
    if($resutl){
        echo"<script>alert('删除成功')</script>";
        echo "<script>location.href='index.php'</script>";
    }else{
        echo"<script>alert('删除失败')</script>";
        echo "<script>location.href='index.php'</script>";
}
