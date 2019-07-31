<?php


namespace app\admin\controller;


use think\Controller;

class Upload extends Controller
{
    public function index(){
        $file = request()->file('file');
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
        if($info){
            return json([
                'code'=>config('code.success'),
                'msg'=>'上传成功',
                'src'=>DS.'uploads'.DS.$info->getSaveName()
            ]);
        }else{
            return json([
                'code'=>config('code.fail'),
                'msg'=>'上传失败'.$file->getError()
            ]);
        }
    }
    public function indexs(){
        $files = request()->file('file');
        foreach($files as $file){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($info){
                return json([
                    'code'=>config('code.success'),
                    'msg'=>'上传成功',
                    'src'=>DS.'uploads'.DS.$info->getFilename()
                ]);
            }else{
                return json([
                    'code'=>config('code.fail'),
                    'msg'=>'上传失败'.$file->getError()
                ]);
            }
        }
    }
}