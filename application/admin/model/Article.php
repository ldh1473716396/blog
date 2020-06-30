<?php

namespace app\admin\model;

use \think\Model;


class Article extends Model
{
	protected $createTime = 'article_time';
	protected $updateTime = 'article_time';

	//缩略图数据处理
	public function thumbnail($data)
    {
		//1.接收图片
		$file = request()->file('article_thumbnail');

		//2.验证图片且保存图片
		$info = $file->validate(['size'=>1024*10240,'ext'=>'jpg,png,gif,jpeg'])->move('./uploads');

		//3.赋值
		$article_thumbnail = url("uploads/".$info->getSaveName());

		//4.返回数值
		return $article_thumbnail;
	}

	//获取该删除栏目的子分类的文章id和保存的文章缩略图地址
	public function subArticle($sub_article_data) 
	{
		static $sub_id = array();

        foreach ($sub_article_data as $key => $value) 
        {
            $sub_id[] = $value['id'];
            @unlink($_SERVER['DOCUMENT_ROOT'].$value['article_thumbnail']);
        }

        return $sub_id;
	} 

}

?>