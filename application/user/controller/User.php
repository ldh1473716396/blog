<?php
namespace app\user\controller;
use app\user\controller\Index;
use app\user\model\User as modelUser;
use app\user\model\Mail as modelMail;

class User extends Index
{
    //注册
    public function signup_page()
    {   
        return view();
    }
    public function signup()
    {
        $signup = input('post.');
        if ($signup['user_password'] == $signup['again_password']){
        	$signup['user_password'] = password_hash($signup['again_password'],PASSWORD_BCRYPT);
            $modelUser = new modelUser();
            $judge = $modelUser->save($signup);
            if ($judge) {
               $this->success('注册成功，请登录','user/user/signin_page');
            }
            else{
               $this->error('注册失败，请重新注册'); 
            }
        }
        else{
            $this->error('两次密码填写不相同');
        }  	
    }

    //登陆
    public function signin_page()
    {   
        return view();
    }
    public function signin()
    {
        $signin = input('post.');
        $modelUser = new modelUser();
        $num = $modelUser->login($signin);
        if ($num == 1) {
        	$this->success('登陆成功','user/home/index');
        }
        if ($num == 2) {
        	$this->error('密码错误','user/user/signin_page');
        }
        if ($num == 3) {
        	$this->error('该用户名称不存在','user/user/signin_page');
        }     
    }

    //退出登陆
    public function signout()
    {
        session(null);
        $this->success('退出成功','user/home/index');
    }

    //个人中心
    public function center()
    {
        $modelUser = new modelUser();
        $user = $modelUser->order('id','asc')->select();
        $this->assign('user',$user);
    	return view();
    }

    //个人资料修改
    public function data($id)
    {
        $update = input('post.');
        $modelUser = new modelUser();
        $save = $modelUser->where('id',$id)->find();

        if (empty($update['user_password'])) {
            $update['user_password'] = $save['user_password'];
            $judge = $save->save($update);
        }
        else{
            $update['user_password'] = password_hash($update['user_password'],PASSWORD_BCRYPT);
            $judge = $save->save($update);
        }
        if ($judge) {
            session(null);
            $this->success('修改成功，请登录','user/user/signin_page');
        }
        else{
            $this->error('修改失败');
        }

    }

    //发送私信
    public function mail($out_id)
    {
        $mail = input('post.');
        $mail['out_id'] = $out_id;
        $modelMail = new modelMail();
        $judge = $modelMail->save($mail);
        if ($judge) {
            $this->success('发送成功','user/user/center');
         }
         else{
            $this->error('发送失败'); 
         }
        
    }
}
