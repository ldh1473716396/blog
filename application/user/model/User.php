<?php

namespace app\user\model;

use \think\Model;


class User extends Model
{
	protected $createTime = 'createTime';
	protected $updateTime = 'updateTime';

	public function login($signin)
	{
        //1.查询登陆数据用户名称是否存在
        $check=User::getByUser_name($signin['user_name']);

        //2.判断
        if($check)
        {
        	$password_check = password_verify($signin['user_password'],$check['user_password']);
        	if($password_check)
            {
                session('user_id',$check['id']);
                session('user_name',$check['user_name']);
                return 1; //用户名称存在,密码正确
            }
            else
            {
                return 2; //用户名称存在，密码不正确
            }           
        }
        
        else
        {
            	return 3; //用户名称不存在
        }
    }
}

?>