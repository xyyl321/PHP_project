<?php

include "../../config/db.php";

$id=$_GET['id'];

$sql="select * from admin where id='$id'";
$result=$mysql->query($sql);
$data=$result->fetch_all(MYSQLI_ASSOC);
//var_dump($data[0]);

echo json_encode($data[0]);