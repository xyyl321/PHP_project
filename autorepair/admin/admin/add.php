<?php

include "../../config/db.php";

//var_dump($_POST);

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
                        $time=time();
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



?>