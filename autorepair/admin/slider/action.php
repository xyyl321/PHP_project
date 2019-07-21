<?php
include "../../config/db.php";
$type=$_GET['type'];

switch($type){
    case 'add':
        $img=$_GET['sliderImg'];
        $sort=$_GET['sorting'];
        $sqladd="insert into slider(img,sort) values('$img','$sort')";
        $resultadd=$mysql->query($sqladd);
        if($resultadd){
            $data=[
                'code'=>200,
                'msg'=>'添加成功'
            ];
        }else{
            $data=[
                'code'=>404,
                'msg'=>'添加失败'
            ];
        }
        echo json_encode($data);
        break;

    case 'delete':
        $id=$_GET['id'];
        $sql="delete from slider where id='$id'";
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
        break;

    case 'find':
        $limit=$_GET['limit'];
        $page=$_GET['page'];
        $start=($page-1)*$limit;

        $sql="select * from slider order by sort desc limit $start,$limit";
        $result=$mysql->query($sql);
        $data=$result->fetch_all(MYSQLI_ASSOC);

        $sqlTol="select count(*) from slider";
        $resultTol=$mysql->query($sqlTol);
        $dataTol=$resultTol->fetch_all(MYSQLI_ASSOC);
        $num=$dataTol[0]['count(*)'];

        if($result){
            $datas=[
                'code'=>0,
                'msg'=>'',
                'count'=>$num,
                'data'=>$data
            ];
        }else{
            $datas=[
                'code'=>404,
                'msg'=>'数据获取失败',
            ];
        }
        echo json_encode($datas);
        break;

    case 'update':
        $id=$_GET['id'];
        $img=$_GET['sliderImg'];
        $sort=$_GET['sorting'];

        $sqlEdit="update slider set img='$img',sort='$sort' where id='$id'";
        $resultEdit=$mysql->query($sqlEdit);
        if($mysql->affected_rows){
            $datas=[
                'code'=>200,
                'msg'=>'修改成功'
            ];
        }else{
            $datas=[
                'code'=>400,
                'msg'=>'修改失败'
            ];
        }
        echo json_encode($datas);
        break;

    case 'sort':
        $id=$_GET['id'];
        $val=$_GET['val'];
        $sql="update slider set sort='$val' where id='$id'";
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