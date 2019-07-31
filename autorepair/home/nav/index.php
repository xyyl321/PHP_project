<?php
include "../../config/db.php";
$nid=$_GET['nid'];
$sql="select * from nav where id='$nid'";
$dataNav=$mysql->query($sql)->fetch_assoc();
$tpl=$dataNav['url'];
$navName=$dataNav['name'];
$img1=$dataNav['img1'];

include "../views/".$tpl.".php";
