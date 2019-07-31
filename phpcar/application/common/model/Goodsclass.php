<?php
/**
 * Created by PhpStorm.
 * User: Yuanyuan Xu
 * Date: 2019/7/30
 * Time: 17:36
 */

namespace app\common\model;


use think\Model;

class Goodsclass extends Model
{
    public function querys(){
        return $this->order('id','desc')->select();
    }
}