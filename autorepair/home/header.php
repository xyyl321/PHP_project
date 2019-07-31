<?php

//    导航栏
$sqlNav="select * from nav order by sort desc";
$dataNav=$mysql->query($sqlNav)->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>汽车维修-<?php echo $navName;?></title>
    <link rel="shortcut icon" href="/asset/home/img/logo-title.ico">
    <link rel="stylesheet" href="/asset/home/css/<?php echo $tpl; ?>.css">
</head>

<body>
<header>
    <div class="headBox">
        <div class="headLeft">
            <a href="index.html">
                <img src="/asset/home/img/logo.png" alt="">
            </a>
        </div>
        <div class="headRight">
            <a href="/home/index/index.php">首页</a>
            <?php
            foreach ($dataNav as $k){
                ?>
                <a class="<?php echo $nid==$k['id']?'col':''; ?>" href="/home/nav/index.php?nid=<?php echo $k['id']; ?>"><?php echo $k['name'] ?></a>
            <?php } ?>
        </div>
    </div>
</header>