<?php

namespace app\admin\model;

use \think\Model;


class Admin extends Model
{
	public function login($data)
	{
        //1.查询登陆数据管理员名称是否存在
        $check=Admin::getByAdmin_name($data['admin_name']);

        //2.判断
        if($check)
        {
        	if($check['admin_password'] == md5($data['admin_password']))
            {
                session('id',$check['id']);
                session('name',$check['admin_name']);
                return 1; //管理员名称存在,密码正确
            }
            else
            {
                return 2; //管理员名称存在，密码不正确
            }           
        }
        
        else
        {
            	return 3; //管理员名称不存在
        }
    }
 
}

?>