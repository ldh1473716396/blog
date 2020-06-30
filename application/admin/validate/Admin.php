<?php

namespace app\admin\validate;
use think\Validate;


class Admin extends Validate
{
    	protected $rule = [
    	'group_id' => 'require', 
        'admin_name' => 'require|unique:admin|max:15',
        'admin_password' => 'require|min:6',  
	    ];
	    
	    protected $message = [
	    	'group_id.require' => '所属用户组不能为空',
	    	'admin_name.require' => '名称不能为空',
	    	'admin_name.unique' => '名称已存在',
	        'admin_name.max' => '名称不能多于15位',
	        'admin_password.require' => '密码不能为空',
	        'admin_password.min' => '密码不能少于6位',
	    ];   

  
}