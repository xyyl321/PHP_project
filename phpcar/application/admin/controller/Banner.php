<?php


namespace app\admin\controller;


use think\Config;
use think\Controller;
use think\Db;
use think\Exception;

class Banner extends Base
{
    //轮播图展示页面
    public function index(){
        return view();
    }
    // 获取数据进行表格渲染
    public function find()
    {
        $param=$this->request->get();
        if(!isset($param['page']) || empty($param['page'])){
            $page=1;
        }else{
            $page = $param['page'];
        }
        if(!isset($param['limit']) || empty($param['limit'])){
            $limit=Config::get('paginate.list_rows');
        }else{
            $limit =$param['limit'];
        }

        $datas=[];
        if(isset($param['id']) && !empty($param['id'])){
            $datas['id']=$param['id'];
        }
        if(isset($param['sort']) && !empty($param['sort'])){
            $datas['sort']=$param['sort'];
        }
        try{
            $model=model('banner');
            $data=$model->querys($datas,$page,$limit);
            $count=$model->counts($datas);
            if($data){
                return [
                    'code' => 0,
                    'msg' => '数据获取成功',
                    'count' => $count,
                    'data' => $data
                ];
            }else{
                return [
                    'code' => config('code.fail'),
                    'msg' => '数据获取失败'
                ];
            }
        }catch (Exception $exception){
            return [
                'code' => config('code.fail'),
                'msg' => '数据获取失败'
            ];
        }
    }
    // 获取要编辑的数据
    public function select()
    {
        $data = $this->request->get();
        $id=$data['id'];
        $model=model('banner');
        $datas=$model->queryone($id);
        return $datas;
    }
    // 修改数据
    public function edit()
    {
        $data=$this->request->post();
        try{
            $model=model('banner');
            $result=$model->updates($data);
            if ($result > 0) {
                return json([
                    'code' => Config::get('code.success'),
                    'msg' => '数据修改成功'
                ]);
            } else {
                return json([
                    'code' => Config::get('code.fail'),
                    'msg' => '数据修改失败'
                ]);
            }
        }catch (Exception $exception){
            return json([
                'code' => Config::get('code.fail'),
                'msg' => '数据修改失败'
            ]);
        }
    }
    // 删除
    public function delete()
    {
        $data = $this->request->get();
        $id=$data['id'];
        $model=model('banner');
        try{
            $result=$model->deletes(['id'=>$id]);
            if ($result) {
                return json([
                    'code' => Config::get('code.success'),
                    'msg' => '数据删除成功'
                ]);
            } else {
                return json([
                    'code' => Config::get('code.fail'),
                    'msg' => '数据删除失败'
                ]);
            }
        }catch (Exception $exception){
            return json([
                'code' => Config::get('code.fail'),
                'msg' =>'数据删除失败'
            ]);
        }
    }
    // 排序
    public function sort(){
        $data=$this->request->get();
        $model=model('banner');
        try{
            $result=$model->updates($data);
            if ($result) {
                return json([
                    'code' => Config::get('code.success'),
                    'msg' => '修改成功'
                ]);
            } else {
                return json([
                    'code' => Config::get('code.fail'),
                    'msg' => '修改失败'
                ]);
            }
        }catch (Exception $exception){
            return json([
                'code' => Config::get('code.fail'),
                'msg' => '修改失败'
            ]);
        }
    }
    // 轮播图添加页面
    public function addindex(){
        return view();
    }
    // 添加
    public function add(){
        $data=$this->request->post();
        $model=model('banner');
        try{
            $result=$model->inserts($data);
            if($result){
                return json([
                    'code'=>config('code.success'),
                    'msg'=>'添加成功',
                ]);
            }else{
                return json([
                    'code'=>config('code.fail'),
                    'msg'=>'添加失败',
                ]);
            }
        }catch (Exception $exception){
            return json([
                'code'=>config('code.fail'),
                'msg'=>'添加失败',
            ]);
        }
    }
}