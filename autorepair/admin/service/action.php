<?php
include "../../config/db.php";

$type=$_GET['type'];

switch($type){
    case 'add':
        $sname=$_POST['sname'];
        $simg=$_POST['simg'];
        $scon=$_POST['scon'];
        $ssort=$_POST['ssort'];
        $sqlName="select * from service where sname='$sname'";
        $resName=$mysql->query($sqlName);
        $dataName=$resName->fetch_all(MYSQLI_ASSOC);
        if(!$dataName){
           $sqlIn="insert into service(sname,simg,scon,ssort) values('$sname','$simg','$scon','$ssort')";
            $resIn=$mysql->query($sqlIn);
            if($resIn){
                $data=[
                    'code'=>200,
                    'msg'=>"添加成功"
                ];
            }else{
                $data=[
                    'code'=>400,
                    'msg'=>"添加失败".$mysql->error
                ];
            }
        }else{
            $data=[
                'code'=>400,
                'msg'=>"该名称已存在"
            ];
        }
        echo json_encode($data);
        break;

    case 'find':
        $limit=$_GET['limit'];
        $page=$_GET['page'];
        $start=($page-1)*$limit;

        $sql="select * from service order by ssort desc limit $start,$limit";
        $result=$mysql->query($sql);
        $data=$result->fetch_all(MYSQLI_ASSOC);

        $sqlTol="select count(*) tol from service";
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

    case 'select':
        $sid=$_GET['sid'];
        $sql="select * from service where sid='$sid'";
        $result=$mysql->query($sql);
        $data=$result->fetch_all(MYSQLI_ASSOC);
//var_dump($data[0]);
        echo json_encode($data[0]);
        break;

    case 'edit':
        $sid=$_POST['sid'];
        $sname=$_POST['sname'];
        $simg=$_POST['simg'];
        $scon=$_POST['scon'];
        $ssort=$_POST['ssort'];
        $sqlIn="update service set sname='$sname',simg='$simg',scon='$scon',ssort='$ssort'where sid='$sid'";
        $resIn=$mysql->query($sqlIn);
        if($resIn){
            $data=[
                'code'=>200,
                'msg'=>"修改成功"
            ];
        }else{
            $data=[
                'code'=>400,
                'msg'=>"修改失败"
            ];
        }
        echo json_encode($data);
        break;

    case 'delete':
        $sid=$_GET['sid'];
        $sql="delete from service where sid='$sid'";
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
        };
        echo json_encode($data);
        break;

    case 'sort':
        $sid=$_GET['sid'];
        $val=$_GET['val'];
        $sql="update service set ssort='$val' where sid='$sid'";
        $result=$mysql->query($sql);
        if($mysql->affected_rows){
            $data=[
                'code'=>200,
                'msg'=>'修改成功'
            ];
        }else{
            $data=[
                'code'=>400,
                'msg'=>'修改失败'
            ];
        }
        echo json_encode($data);
        break;
}
