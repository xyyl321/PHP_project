<?php
    header('Content-type:text/html;charset:uft8');
    include 'db.php';
    //var_dump($_POST);
    $name=$_POST['name'];
    $sex=$_POST['sex'];
    $age=$_POST['age'];
    $tel=$_POST['tel'];
    //将数据插入本地库当中
    $sql="insert into students(name,sex,age,tel)VALUES('$name','$sex','$age','$tel')";
    echo $sql;
    if($mysql->query($sql)===true){
//        echo "<script>alert('添加成功')</script>";
        echo "<script>location.href='index.php'</script>";
    }else{
        echo 'Error:'.$mysql->error;
    }
?>