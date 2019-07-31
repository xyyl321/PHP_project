<?php
$file=$_FILES['file'];
//var_dump($file);
$filetype=$file['type'];
$filesize=$file['size'];

if($file['error']>0){
    echo json_encode([
        'code'=>400,
        'msg'=>'上传出错：'.$file['error']
    ]);
}else{
    if(is_uploaded_file($file['tmp_name'])){
        if($filetype=='image/jpg' || $filetype=='image/jpeg' || $filetype=='image/png' || $filetype=='image/webp'){
            if($filesize<500*1024){
                // upload目录
                $pathname="../../upload";
                if(!file_exists($pathname)){
                    mkdir($pathname);
                }
                //日期目录
                $date=date("Y-m-d");
                $datefile=$pathname."/".$date;
                if(!file_exists($datefile)){
                    mkdir($datefile);
                }
                //设置图片名称
                $ext=explode("/",$file['type'])[1];
                $imgname=time().mt_rand(0,100).".".$ext;
                //移动路径
                if(move_uploaded_file($file['tmp_name'],$datefile."/".$imgname)){
                    echo json_encode([
                        'code'=>200,
                        "msg"=>"上传成功",
                        'src'=>"/upload/".$date."/".$imgname
                    ]);
                }else{
                    echo json_encode([
                        'code'=>400,
                        'msg'=>'上传失败'
                    ]);
                }
            }else{
                echo json_encode([
                    'code'=>400,
                    'msg'=>'图片大小超过500KB'
                ]);
            }
        }else{
            echo json_encode([
                'code'=>400,
                'msg'=>'请上传正确的图片格式'
            ]);
        }
    }else{
        echo json_encode([
            'code'=>400,
            'msg'=>'未上传'
        ]);
    }
}