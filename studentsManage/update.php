<?php
    header('Content-type:text/html;charset:uft8');
    //连接数据
    include 'db.php';
    //拿到id
    $id=$_POST['id'];
    //var_dump($id);
    $name=$_POST['name'];
    $sex=$_POST['sex'];
    $age=$_POST['age'];
    $tel=$_POST['tel'];

    $sql="UPDATE students SET name='$name',sex='$sex',age='$age',tel='$tel' where id='$id'";
    $result=$mysql->query($sql);
    //echo $sql;
    //var_dump($mysql->affected_rows($sql));
    if($result){
//        echo "<script>alert('修改成功')</script>";
        echo "<script>location.href='index.php'</script>";
    }else{
        echo "修改失败";
    }
?>