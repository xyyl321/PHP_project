<?php


namespace app\admin\validate;


use think\Validate;

class Nav extends Validate
{
    protected $rule = [
        'name' => 'require|min:2|max:5',
        'sorting' => 'require|number',
        'site' => 'require',
        'id' => 'require|number'
    ];
    protected $message = [
        'name.require' => '请输入导航项名称',
        'name.min' => '导航项名称长度为2-4位',
        'name.max' => '导航项名称长度为2-4位',
        'sorting.require'=>'序号必填',
        'sorting.number'=>'序号为数字',
        'id.require'=>'id必填',
        'id.number'=>'id为数字',
    ];
    protected $scene = [
        'add' => ['name', 'sorting', 'site'],
    ];
}