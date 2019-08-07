<?php
/**
 * Created by PhpStorm.
 * User: Yuanyuan Xu
 * Date: 2019/8/2
 * Time: 17:46
 */

namespace app\common\model;


use think\Model;

class Nav extends Model
{
    public function querys(){
        return $this->select();
    }
}