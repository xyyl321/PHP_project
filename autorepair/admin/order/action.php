<?php
include "../../config/db.php";

$type=$_GET['type'];

switch($type){
    case 'find':
        $limit=$_GET['limit'];
        $page=$_GET['page'];
        $start=($page-1)*$limit;

        $sql="select * from online order by id desc limit $start,$limit";
        $result=$mysql->query($sql);
        $data=$result->fetch_all(MYSQLI_ASSOC);

        $sqlTol="select count(*) tol from online";
        $resultTol=$mysql->query($sqlTol);
        $dataTol=$resultTol->fetch_all(MYSQLI_ASSOC);
//var_dump($dataTol);
        $num=$dataTol[0]['tol'];
        if($result){
            $datas=[
                'code'=>0,
                'msg'=>'',
                'count'=>$num,
                'data'=>$data
            ];
        }else{
            $datas=[
                'code'=>400,
                'msg'=>'查询失败'
            ];
        }
        echo json_encode($datas);
        break;
}
