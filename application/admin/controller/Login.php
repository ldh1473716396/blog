<?php

namespace app\admin\controller;

use think\Controller;
use app\admin\model\Admin;
use think\captcha\Captcha;


class login extends Controller
{
    //1.登陆页
    public function login()
    {
        //网站名称
        $conf_webname = db('conf')->where('conf_chs_name','网站名称')->field('conf_value')->find();
        $this->assign('webname',$conf_webname);
        return view();
    }

    //验证码
    public function verify()
    {
        $captcha = new Captcha();
        $captcha->length = 4;
        return $captcha->entry();
    }

    //2.检查登陆信息
    public function cherk()
    {
        //1.实例化模型类       
        $modelLogin = new \app\admin\model\Admin();

        //2.接收数据
        $data = input('post.');

        //3.验证码
        if(!captcha_check($data['captcha'])){
            $this->error('验证码错误','admin/login/login');
        };

        //4.验证登陆名称和密码
        $num = $modelLogin->login($data);

        //5.判断且跳转
        if ($num == 1) {
        	$this->success('登陆成功','admin/index/index');
        }
        if ($num == 2) {
        	$this->error('密码错误','admin/login/login');
        }
        if ($num == 3) {
        	$this->error('该管理员名称不存在','admin/login/login');
        }
            
        return;

    }

    //3.退出登陆
    public function logout()
    {
        session(null);
        $this->success('退出成功','admin/login/login');
    }
}
