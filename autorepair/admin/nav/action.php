<?php
include "../../config/db.php";

$type=$_GET['type'];

switch($type){
    case 'add':
        $name=$_POST['username'];
        $url=$_POST['site'];
        $sort=$_POST['sorting'];
        $sqlName="select * from nav where name='$name'";
        $resName=$mysql->query($sqlName);
        $dataName=$resName->fetch_all(MYSQLI_ASSOC);
        if(!$dataName){
            // 检测 URL 地址是否合法
//            if (preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)) {
                $sqlIn="insert into nav(name,url,sort) values('$name','$url','$sort')";
                $resIn=$mysql->query($sqlIn);
                if($resIn){
                    $data=[
                        'code'=>200,
                        'msg'=>"添加成功"
                    ];
                }else{
                    $data=[
                        'code'=>400,
                        'msg'=>"添加失败"
                    ];
                }
//            }else{
//                $data=[
//                    'code'=>400,
//                    'msg'=>"请输入合法的 URL 的地址"
//                ];
//            }
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

        $sql="select * from nav order by sort desc limit $start,$limit";
        $result=$mysql->query($sql);
        $data=$result->fetch_all(MYSQLI_ASSOC);

        $sqlTol="select count(*) tol from nav";
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
        $id=$_GET['id'];
        $sql="select * from nav where id='$id'";
        $result=$mysql->query($sql);
        $data=$result->fetch_all(MYSQLI_ASSOC);
//var_dump($data[0]);
        echo json_encode($data[0]);
        break;

    case 'edit':
        $id=$_POST['id'];
        $name=$_POST['username'];
        $url=$_POST['site'];
        $sort=$_POST['sorting'];
//        $sqlName="select * from nav where name='$name'";
//        $resName=$mysql->query($sqlName);
//        $dataName=$resName->fetch_all(MYSQLI_ASSOC);
//        if(!$dataName){
            // 检测 URL 地址是否合法
//            if (preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)) {
                $sqlIn="update nav set name='$name',url='$url',sort='$sort'where id='$id'";
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
//            }else{
//                $data=[
//                    'code'=>400,
//                    'msg'=>"请输入合法的 URL 的地址"
//                ];
//            }
//        }else{
//            $data=[
//                'code'=>400,
//                'msg'=>"该名称已存在"
//            ];
//        }
        echo json_encode($data);
        break;

    case 'delete':
        $id=$_GET['id'];
        $sql="delete from nav where id='$id'";
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
        $id=$_GET['id'];
        $val=$_GET['val'];
        $sql="update nav set sort='$val' where id='$id'";
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
