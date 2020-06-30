<?php

namespace app\admin\validate;
use think\Validate;


class Article extends Validate
{
    	protected $rule = [
	    	'article_cate' => 'require',
	        'article_title' => 'require|unique:article',
	        'article_author' => 'require',
	        'article_content' => 'require', 
	    ];
	    
	    protected $message = [
		    'article_cate.require' => '文章所属栏目不能为空',
	        'article_title.require' => '文章标题不能为空',
	        'article_title.unique' => '文章标题已存在',
	        'article_author.require' => '文章作者不能为空',
	        'article_content.require' => '文章内容不能为空',    
	    ];

	    public function sceneEdit()
	    {
	      return $this->only(['article_cate','article_author','article_content']);
	    }    

  
}