<?php
header("Content-type:text/html;charset=utf8;");

// 连接数据库
include "dd.php";

$sql="select * from students order by id desc";
//发送一条sql语句
$result=$mysql->query($sql);
// 查询所有并返回一个关联数组
$data=$result->fetch_all(MYSQLI_ASSOC);
//var_dump($data);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>学生信息管理</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div class="container">
        <table class="table table-bordered">
            <tr class="warning">
                <th>姓名</th>
                <th>性别</th>
                <th>年龄</th>
                <th>联系方式</th>
                <th>操作</th>
            </tr>
            <?php
                foreach ($data as $k=>$v){
            ?>
                    <tr>
                        <td><?php echo $v['username']  ?></td>
                        <?php
                            if($v['sex']){
                                echo "<td>女</td>";
                            }else{
                                echo "<td>男</td>";
                            }
                        ?>
                        <td><?php echo $v['age']  ?></td>
                        <td><?php echo $v['tel']  ?></td>
                        <td>
                            <?php
                                echo "
                                <a href=\"edit.php?id=$v[id]\">
                                    <button type=\"button\" class=\"btn btn-info\" aria-label=\"Left Align\">
                                        <span class=\"glyphicon glyphicon-pencil\" aria-hidden=\"true\"></span>
                                    </button>
                                </a>
                                "
                            ?>

                            <a href="del.php?id=<?php echo $v['id'] ?>">
                                <button type="button" class="btn btn-danger" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                </button>
                            </a>
                        </td>
                    </tr>
            <?php
                }
            ?>

        </table>
        <a href="add.php" class="a-add">
            <button class="btn btn-success add">添加</button>
        </a>
    </div>
</body>
</html>