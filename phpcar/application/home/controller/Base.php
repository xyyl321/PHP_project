<?php
/**
 * Created by PhpStorm.
 * User: Yuanyuan Xu
 * Date: 2019/8/2
 * Time: 17:06
 */

namespace app\home\controller;


use think\Controller;

class Base extends Controller
{
    protected function _initialize()
    {
        parent::_initialize();
        // 导航
        $model=model('Nav');
        $nav=$model->querys();
        $this->assign('nav',$nav);
        // 地址
        $model=model('Address');
        $addr=$model->querys();
        $this->assign('addr',$addr);
    }
}