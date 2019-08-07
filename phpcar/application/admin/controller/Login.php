<?php
namespace app\admin\controller;

// 子模块 Login  控制器（类）
//功能  方法（操作）  check
//路由 ：一种规则，调用方法 ，要找，按照地址。解析，分发到指定地方。

use think\Controller;
use think\Db;
use think\Session;
use think\Validate;

class Login extends Controller
{
    public function index(){
        return view();
    }
    public function check(){
        // 验证请求方式
        if(!$this->request->isPost()){
            return json([
                'code'=>config('code.fail'),
                'msg'=>'请求方式错误'
            ]);
        };
        //验证请求参数
        $data=$this->request->post();
        $validate=validate('Login');
        if(!$validate->check($data)){
            return json([
                'code'=>config('code.fail'),
                'msg'=>$validate->getError()
            ]);
        };
        // 业务逻辑
        $admin=Db::table('admin')->where('username',$data['username'])->find();
        if($admin){
            if(md5($data['password'])==$admin['password']){
                // 验证码
                $captcha=$data['captcha'];
                if($captcha){
                    if (captcha_check($captcha)){
                        Session::set('id',$admin['id']);
                        Session::set('username',$admin['username']);
                        Session::set('head_img',$admin['head_img']);
                        return json([
                            'code'=>config('code.success'),
                            'msg'=>'登录成功'
                        ]);
                    }else{
                        return json([
                            'code'=>config('code.fail'),
                            'msg'=>'验证码错误'
                        ]);
                    }
                }else{
                    return json([
                        'code'=>config('code.fail'),
                        'msg'=>'请输入验证码'
                    ]);
                }
            }else{
                return json([
                    'code'=>config('code.fail'),
                    'msg'=>'密码错误'
                ]);
            }
        }else{
            return json([
                'code'=>config('code.fail'),
                'msg'=>'用户名不存在'
            ]);
        }
    }

    public function logout(){
        Session::clear();
        return $this->redirect('/admin/login/index');
    }
}