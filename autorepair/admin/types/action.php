<?php
include "../../config/db.php";
$type=$_GET['type'];

switch($type){
    case 'add':
        $sortname=$_GET['sortname'];
//var_dump($sortname);


        if($sortname){
            $sql="select * from types where name='$sortname'";
            $result=$mysql->query($sql);
            $dataresult=$result->fetch_all(MYSQLI_ASSOC);
            if(!$dataresult){
                $sqladd="insert into types(name) values('$sortname')";
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
            }else{
                $data=[
                    'code'=>404,
                    'msg'=>'该分类名称已存在'
                ];
            }
        }else{
            $data=[
                'code'=>404,
                'msg'=>'请输入分类名称'
            ];
        }

        echo json_encode($data);
        break;

    case 'delete':
        $id=$_GET['id'];

        $sql="delete from types where id='$id'";
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

        $sql="select * from types order by id desc limit $start,$limit";
        $result=$mysql->query($sql);
        $data=$result->fetch_all(MYSQLI_ASSOC);

// 获得总数
        $sqlTol="select count(*) from types";
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
        $name=$_GET['sortname'];

        if($name !=''){
            $sql="select name from types where id='$id'";
            $result=$mysql->query($sql);
            $resultData=$result->fetch_all(MYSQLI_ASSOC);
            if($resultData[0]['name']!==$name){
                $sqlSel="select * from types where name='$name'";
                $reSel=$mysql->query($sqlSel);
                $dataSel=$reSel->fetch_all(MYSQLI_ASSOC);
                if(!$dataSel){
                    $sqlEdit="update types set name='$name' where id='$id'";
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
                }else{
                    $datas=[
                        'code'=>400,
                        'msg'=>'该名称已存在'
                    ];
                }
            }else{
                $datas=[
                    'code'=>400,
                    'msg'=>'未修改'
                ];
            }
        }else{
            $datas=[
                'code'=>400,
                'msg'=>'分类名称不能为空'
            ];
        }
        echo json_encode($datas);
        break;
}