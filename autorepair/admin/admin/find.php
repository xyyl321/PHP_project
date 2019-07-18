<?php

include "../../config/db.php";

$page=$_GET['page'];
$limit=$_GET['limit'];
$start=($page-1)*5;

$sql ="select * from admin order by id desc limit $start,$limit";
$result=$mysql->query($sql);
$tableData=$result->fetch_all(MYSQLI_ASSOC);
//var_dump($tableData);

$sqlTol="select count(*) tol from admin";
$resultTol=$mysql->query($sqlTol);
$dataTol=$resultTol->fetch_all(MYSQLI_ASSOC);
//var_dump($dataTol);
$num=$dataTol[0]['tol'];


if($tableData){
    $getData=[
      'code'=>0,
      'msg'=>'',
      'count'=>$num,
      'data'=>$tableData
    ];
}else{
    $getData=[
        'code'=>400,
        'msg'=>'查询失败'
    ];
}

echo json_encode($getData);

