<?php
/**
 * Created by PhpStorm.
 * User: Yuanyuan Xu
 * Date: 2019/7/31
 * Time: 8:24
 */

namespace app\common\model;


use think\Model;

class Goodsdetail extends Model
{
    // 自动写入时间戳
    protected $autoWriteTimestamp = true;
    // 添加一条数据
    public function inserts($data){
        return $this->allowField(true)->isUpdate(false)->save($data);
    }
    // 获取当前选中一条数据
    public function queryone($gid){
        return $this->where($gid)->find();
    }
    // 修改当前数据
    public function edits($gid,$data){
        return $this->allowField(true)->isUpdate(true)->save($data,['gid'=>$gid]);
    }
}