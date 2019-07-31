<?php

// 验证 请求方式，请求参数
if($_SERVER['REQUEST_METHOD']!='POST'){
    echo json_encode([
        'code'=>400,
        'msg'=>'请求方式不正确'
    ]);
    exit;
}
// 需要传进，并且不为空  顺序不能换，否则可能会报错
if(!isset($_POST['username'])|| empty($_POST['username'])){
    echo json_encode([
        'code'=>400,
        'msg'=>'请输入用户名'
    ]);
    exit;
}
if(!isset($_POST['password'])|| empty($_POST['password'])){
    echo json_encode([
        'code'=>400,
        'msg'=>'请输入密码'
    ]);
    exit;
}

include "../../config/db.php";

$username=$_POST['username'];
$password=$_POST['password'];

$sql="select * from admin where username='$username'";
$data=$mysql->query($sql)->fetch_all(MYSQLI_ASSOC);

if($data){
    for($i=0;$i<count($data);$i++){
        if($data[$i]['password']==md5($password)){
            session_start();
            $_SESSION['id']=$data[$i]['id'];
            $_SESSION['username']=$username;
            $datas=[
                'code'=>200,
                'msg'=>'登陆成功'
            ];
            echo json_encode($datas);
            exit;
        };
    }
    $datas=[
        'code'=>400,
        'msg'=>'用户名密码不匹配'
    ];
}else{
    $datas=[
        'code'=>400,
        'msg'=>'用户名不存在'
    ];
}
echo json_encode($datas);