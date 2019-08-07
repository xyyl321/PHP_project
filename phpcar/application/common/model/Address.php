<?php
/**
 * Created by PhpStorm.
 * User: Yuanyuan Xu
 * Date: 2019/8/4
 * Time: 20:37
 */

namespace app\common\model;


use think\Model;

class Address extends Model
{
    public function querys(){
        return $this->select();
    }
}