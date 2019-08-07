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
    public function edits(){
        $file = request()->file('file');
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
        if($info){
            return json([
                'code'=>0,
                'msg'=>'上传成功',
                'data'=>[
                    'src'=>DS.'uploads'.DS.$info->getSaveName()
                ]
            ]);
        }else{
            return json([
                'code'=>config('code.fail'),
                'msg'=>'上传失败'.$file->getError()
            ]);
        }
    }

    // 删除图片
    public function imgdel(){
        $data=$this->request->post();
        $data=$data['img'];
        try{
            for($x=0;$x<count($data);$x++) {
                unlink(DEL_FILE_PATH.$data[$x]);
            }
            return json([
                'code'=>config('code.success')
            ]);
        }catch (Exception $exception){
            return json([
                'code'=>config('code.fail')
            ]);
        }
    }
}