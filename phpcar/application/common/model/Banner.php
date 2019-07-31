<?php


namespace app\common\model;


use think\Model;

class Banner extends Model
{
    // 查询所有数据
    public function querys($datas,$page,$limit){
        return $this->where($datas)->order('sort','desc')->page($page,$limit)->select();
    }
    // 数据总数
    public function counts($datas){
        return $this->where($datas)->count();
    }
    // 查询单条数据
    public function queryone($id){
        return $this->where(['id'=>$id])->find();
    }
    // 修改数据
    public function updates($data){
        $id=$data['id'];
        unset($data['id']);
        return $this->isUpdate(true)->allowField(true)->save($data,['id'=>$id]);
    }
    // 删除一条数据
    public function deletes($arr){
        return $this->where($arr)->delete();
    }
    // 添加一条数据
    public function inserts($data){
        return $this->isUpdate(false)->save($data);
    }
}