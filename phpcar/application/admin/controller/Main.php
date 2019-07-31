<?php


namespace app\admin\controller;


use think\Controller;
use think\Session;

class Main extends Base
{
    public function _initialize()
    {
        parent::_initialize();
    }
    public function index(){
        return $this->fetch();
    }
}