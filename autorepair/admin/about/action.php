<?php
include "../../config/db.php";

// 验证 请求方式，参数
if($_SERVER['REQUEST_METHOD']!='POST'){
    echo json_encode([
        'code'=>400,
        'msg'=>'请求方式错误'
    ]);
    exit;
};
if(!isset($_POST['id'])|| empty($_POST['id']) || !is_int($_POST['id']*1)){
    echo json_encode([
        'code'=>200,
        'msg'=>'id获取错误'
    ]);
    exit;
}
if(!isset($_POST['content'])|| empty($_POST['content'])){
    echo json_encode([
        'code'=>400,
        'msg'=>'请输入描述内容'
    ]);
    exit;
}
if(!isset($_POST['imgurl'])|| empty($_POST['imgurl'])){
    echo json_encode([
        'code'=>400,
        'msg'=>'请上传图片'
    ]);
    exit;
}

$id=$_POST['id'];
$content=$_POST['content'];
$imgurl=$_POST['imgurl'];
$sql="update about set content='$content',imgurl='$imgurl' where id='$id'";
$result=$mysql->query($sql);
if($result){
    echo json_encode([
        'code'=>200,
        'msg'=>"提交成功"
    ]);
}else{
    echo json_encode([
        'code'=>400,
        'msg'=>"提交失败"
    ]);
}