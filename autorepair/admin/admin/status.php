<?php

include "../../config/db.php";

$id=$_GET['id'];
$state=$_GET['state'];

$sql="update admin set status='$state' where id='$id'";
$result=$mysql->query($sql);
if($mysql->affected_rows){
    $data=[
        'code'=>200,
        'msg'=>'状态改变'
    ];
}else{
    $data=[
        'code'=>404,
        'msg'=>'状态未发生改变'
    ];
}

echo json_encode($data);