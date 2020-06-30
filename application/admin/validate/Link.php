<?php

namespace app\admin\validate;
use think\Validate;


class Link extends Validate
{
    	protected $rule = [
	        'link_title' => 'require|unique:link',
	        'link_describe' => 'require', 
	        'link_url' => 'require|url',  
	    ];
	    
	    protected $message = [
		    'link_title.require' => '链接标题不能为空',
		    'link_title.unique' => '链接标题已存在',
	        'link_describe.require' => '链接描述不能为空', 
	        'link_url.require' => '链接网址不能为空', 
	        'link_url.url' => '链接网址格式不正确',   
	    ];

	    public function sceneEdit()
	    {
	      return $this->only(['link_describe','link_url']);
	    }

	    
  
}