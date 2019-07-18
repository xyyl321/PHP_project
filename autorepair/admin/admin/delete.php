<?php

include "../../config/db.php";

$id=$_GET['id'];

$sql="delete from admin where id='$id'";
$result=$mysql->query($sql);
if($mysql->affected_rows){
    $data=[
        'code'=>200,
        'msg'=>'删除成功'
    ];
}else{
    $data=[
        'code'=>404,
        'msg'=>'删除失败'
    ];
}
echo json_encode($data);