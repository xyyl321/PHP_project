<?php
/**
 * Created by PhpStorm.
 * User: Yuanyuan Xu
 * Date: 2019/7/30
 * Time: 17:22
 */

namespace app\admin\controller;


use think\Db;
use think\Exception;

class Goodsdetail extends Base
{
    // 产品管理-添加页面
    public function addindex(){
        $goodsclass=model('Goodsclass');
        $data=$goodsclass->querys();
        $this->assign('goodsclass',$data);
        return $this->fetch();
    }
    // 添加
    public function add(){
        // 验证请求方式
        if (!$this->request->isPost()) {
            return json([
                'code' => Config::get('code.fail'),
                'msg' => '错误的请求方式'
            ]);
        }
        // 验证数据
        $data = $this->request->post();
        if(!isset($data['shelf']) || empty($data['shelf'])){
            $data['shelf']=0;
        }
        $validate = validate('Goodsdetail');
        if (!$validate->scene('add')->check($data)) {
            return json([
                'code' => config('code.fail'),
                'msg' => $validate->getError()
            ]);
        }
        // 添加数据
        $model=model('goodsdetail');
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
    }

    public function index(){
        $goodsclass=model('Goodsclass');
        $data=$goodsclass->querys();
        $this->assign('goodsclass',$data);
        return view();
    }
    public function find(){
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
//        try{
            // $data=Db::table('goodsdetail')->page($page,$limit)->order('id','desc')->select();
            $count=Db::table('goodsdetail')->count();
            $data=Db::table('goodsdetail')->alias('de')->join('goodsclass cl','de.typeid=cl.id')
                ->page($page,$limit)->order('de.gid','desc')->select();
            if($data){
                for($x=0;$x<count($data);$x++) {
                    $data[$x]['create_time']=date("Y-m-d h:i:s",$data[$x]['create_time']);
                    $data[$x]['update_time']=date("Y-m-d h:i:s",$data[$x]['update_time']);
                }
                return json([
                    'code'=>0,
                    'msg'=>'数据获取成功',
                    'count'=>$count,
                    'data'=>$data
                ]);
            }else{
                return json([
                    'code'=>config('code.fail'),
                    'msg'=>'数据获取失败'
                ]);
            }
//        }catch (Exception $exception){
//            return json([
//                'code'=>config('code.fail'),
//                'msg'=>'数据获取失败'
//            ]);
//        }
    }
    public function states(){
        $data=$this->request->get();
        $gid=$data['gid'];
        $shelf=$data['shelf'];
        $result=Db::table('goodsdetail')->where('gid',$gid)->update(['shelf'=>$shelf]);
        if($result){
            return json([
                'code'=>config('code.success'),
                'msg'=>'状态改变'
            ]);
        }else{
            return json([
                'code'=>config('code.fail'),
                'msg'=>'状态改变'
            ]);
        }
    }
    public function delete()
    {
        $gid = $this->request->get();
        try{
            $result = Db::table('goodsdetail')->where($gid)->delete();
            if ($result > 0) {
                return json([
                    'code' => config('code.success'),
                    'msg' => '数据删除成功'
                ]);
            } else {
                return json([
                    'code' => config('code.fail'),
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
    public function selects()
    {
        $gid = $this->request->get();
        $result = Db::table('goodsdetail')->where($gid)->find();
        return $result;
    }
}