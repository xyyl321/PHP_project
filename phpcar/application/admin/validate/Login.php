<?php
namespace app\admin\validate;


use think\Validate;

class Login extends Validate
{
    protected  $rule=[
        'username'=>'require',
        'password'=>'require|min:6|max:12'
    ];
    protected $message=[
        'username.require'=>'请填写用户名',
        'password.require'=>'请填写密码',
        'password.min'=>'密码不能少于6位',
        'password.max'=>'密码不能多于12位',
    ];
}