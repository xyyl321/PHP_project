<?php

namespace app\admin\controller;


use think\Config;
use think\Controller;
use think\Db;
use think\Exception;

class Nav extends Base
{
    // 导航展示页面
    public function index()
    {
        return view();
    }
    // 获取所有数据进行表格渲染
    public function find()
    {
        $param=$this->request->get();
        // 分页 page,limit
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
        // 搜索时需要判断的数据
        $datas=[];
        if(isset($param['name']) && !empty($param['name'])){
            $datas['name']=['like','%'.$param['name'].'%'];
        }
        if(isset($param['site']) && !empty($param['site'])){
            $datas['url']=['like','%'.$param['site'].'%'];
        }
        if(isset($param['sort']) && !empty($param['sort'])){
            $datas['sort']=$param['sort'];
        }
        try{
            $result = Db::table('nav')->where($datas)->order('sort', 'desc')->page($page,$limit)->select();
            $count=DB::table('nav')->where($datas)->count();
            if($result){
                return [
                    'code' => 0,
                    'msg' => '',
                    'count' => $count,
                    'data' => $result
                ];
            }else{
                return [
                    'code' => config('code.fail'),
                    'msg' => '数据获取失败',
                ];
            }
        }catch (Exception $exception){
            return [
                'code' => config('code.fail'),
                'msg' => '数据获取失败',
            ];
        }
    }
    // 编辑时获取当前这一条数据
    public function select()
    {
        $id = $this->request->get();
        $result = Db::table('nav')->where($id)->find();
        return $result;
    }
    // 修改数据
    public function edit()
    {
        $data = $this->request->post();
        $id = $data['id'];
        $name = $data['username'];
        $sort = $data['sorting'];
        $site = $data['site'];
        try{
            $result = Db::table('nav')->where('id',$id)->update(['name' => $name, 'sort' => $sort, 'url' => $site]);
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
    // 删除一条数据
    public function delete()
    {
        $id = $this->request->get();
        try{
            $result = Db::table('nav')->where($id)->delete();
            if ($result > 0) {
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
                'msg' => '数据删除失败'
            ]);
        }
    }
    // 排序
    public function sort(){
        $id=$this->request->get('id');
        $val=$this->request->get('val');
        $result = Db::table('nav')->where('id',$id)->update(['sort' => $val]);
        if ($result > 0) {
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
    }

    // 导航添加页面
    public function addindex()
    {
        return view();
    }
    // 添加一条数据
    public function add()
    {
        // 验证请求方式
        if (!$this->request->isPost()) {
            return json([
                'code' => Config::get('code.fail'),
                'msg' => '错误的请求方式'
            ]);
        }
        // 验证数据
        $data = $this->request->post();
        $validate = validate('Nav');
        if (!$validate->scene('add')->check($data)) {
            return json([
                'code' => Config::get('code.fail'),
                'msg' => $validate->getError()
            ]);
        }
        // 要添加的字段
        $datas=[
            'name'=>$data['name'],
            'url'=>$data['site'],
            'sort'=>$data['sorting']
        ];
        $result = Db::table('nav')->insert($datas);
        try {
            if ($result) {
                return json([
                    'code' => Config::get('code.success'),
                    'msg' => '添加成功'
                ]);
            } else {
                return json([
                    'code' => Config::get('code.fail'),
                    'msg' => '添加失败'
                ]);
            }
        } catch (Exception $exception) {
            return json([
                'code' => Config::get('code.fail'),
                'msg' => '数据提交失败'
            ]);
        }
    }
}