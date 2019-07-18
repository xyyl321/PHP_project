<?php
header("Content-type:text/html;charset=utf8;");

$id=$_GET['id'];

include "dd.php";

$sql="select * from students where id='$id'";
$result=$mysql->query($sql);
$data=$result->fetch_all(MYSQLI_ASSOC);
$v=$data[0];

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<style>
    .container{
        margin-top:50px;
    }

</style>
<body>
<div class="container">
    <form method="post" action="update.php" class="form-horizontal" >
        <input type="hidden" name="id" value="<?php echo $v['id']?>">
        <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">姓名</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" value="<?php echo $v['username'] ?>" name="name">
            </div>
        </div>
        <div class="form-group">
            <label for="inputSex" class="col-sm-2 control-label">性别</label>
            <div class="col-sm-10">
                <?php
                    if($v['sex']){
                        echo "
                        <label class=\"radio-inline\">
                            <input type=\"radio\" name=\"sex\" value=\"0\">男
                        </label>
                        <label class=\"radio-inline\">
                            <input type=\"radio\" name=\"sex\" value=\"1\" checked>女
                        </label>
                        ";
                    }else{
                        echo "
                        <label class=\"radio-inline\">
                            <input type=\"radio\" name=\"sex\" value=\"0\" checked>男
                        </label>
                        <label class=\"radio-inline\">
                            <input type=\"radio\" name=\"sex\" value=\"1\">女
                        </label>
                        ";
                    }
                ?>

            </div>
        </div>
        <div class="form-group">
            <label for="inputAge" class="col-sm-2 control-label">年龄</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="inputAge" value="<?php echo $v['age'] ?>" name="age">
            </div>
        </div>
        <div class="form-group">
            <label for="inputTel" class="col-sm-2 control-label">联系方式</label>
            <div class="col-sm-10">
                <input type="tel" class="form-control" id="inputTel" value="<?php echo $v['tel'] ?>" name="tel">
            </div>
        </div>
        <div class="form-group">
            <label for="inputTel" class="col-sm-2 control-label"></label>
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">修改</button>
            </div>
        </div>
    </form>
</div>

</body>
</html>