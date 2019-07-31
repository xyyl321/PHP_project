<?php
include "../../config/db.php";
$type=$_GET['type'];

switch($type){
    case 'add':
        $username=$_POST['username'];
        $password=$_POST['password'];
        $repassword=$_POST['repassword'];
        $status=$_POST['status'];

// 数据验证
        if($username){
            if(strlen($username)>=6 && strlen($username)<=12){
                if($password){
                    if(strlen($password)>=6 && strlen($password)<=12){
                        if($repassword==$password){
                            // 验证用户名是否存在
                            $sql="select * from admin where username='$username'";
                            $result=$mysql->query($sql);
                            $resultdata=$result->fetch_all(MYSQLI_ASSOC);
                            if( !$resultdata){
                                // 插入数据
                                date_default_timezone_set("Asia/Shanghai");
                                $time= date("Y-m-d H:i:s");
                                $password=md5($password);
                                $sqlAdmin="insert into admin (username,password,status,time) values ('$username','$password','$status','$time')";
                                $resultAdmin=$mysql->query($sqlAdmin);
                                if($resultAdmin){
                                    $data=[
                                        "code"=>200,
                                        "msg"=>"添加成功"
                                    ];
                                }else{
                                    $data=[
                                        "code"=>400,
                                        "msg"=>"添加失败"
                                    ];
                                }
                            }else{
                                $data=[
                                    "code"=>400,
                                    "msg"=>"该用户已存在"
                                ];
                            }
                        }else{
                            $data=[
                                "code"=>400,
                                "msg"=>"两次密码不相同"
                            ];
                        }
                    }else{
                        $data=[
                            "code"=>400,
                            "msg"=>"请输入6-12位的密码"
                        ];
                    }
                }else{
                    $data=[
                        "code"=>400,
                        "msg"=>"请输入密码"
                    ];
                }
            }else{
                $data=[
                    "code"=>400,
                    "msg"=>"请输入6-12位的用户名"
                ];
            }
        }else{
            $data=[
                "code"=>400,
                "msg"=>"请输入用户名"
            ];
        }

        echo json_encode($data);
        break;

    case 'delete':
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
        break;

    case 'find':
        $page=$_GET['page'];
        $limit=$_GET['limit'];
        $start=($page-1)*$limit;

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
        break;

    case 'select':
        $id=$_GET['id'];

        $sql="select * from admin where id='$id'";
        $result=$mysql->query($sql);
        $data=$result->fetch_all(MYSQLI_ASSOC);
//var_dump($data[0]);

        echo json_encode($data[0]);
        break;

    case 'status':
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
        break;
}