<?php

namespace app\admin\validate;
use think\Validate;


class Conf extends Validate
{
    	protected $rule = [
	        'conf_chs_name' => 'require|unique:conf',
	        'conf_en_name' => 'require|unique:conf', 
	        'conf_type' => 'require',  
	    ];
	    
	    protected $message = [
			'conf_chs_name.require' => '中文名称不能为空',
			'conf_chs_name.unique' => '中文名称已存在',
			'conf_en_name.require' => '英文名称不能为空',
			'conf_en_name.unique' => '英文名称已存在',
			'conf_type.require' => '配置类型不能为空',
	    ];

	    public function sceneEdit()
	    {
	      return $this->only(['conf_chs_name','conf_en_name'])->remove('conf_chs_name', 'unique')->remove('conf_en_name', 'unique');
	    }

	    
  
}