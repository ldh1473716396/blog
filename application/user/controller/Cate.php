<?php
namespace app\user\controller;
use app\user\controller\Index;
use app\admin\model\Cate as modelCate;

class Cate extends Index
{
    public function card($id)
    { 
    	$modelCate = new modelCate;  	
        $article_card = db('article')->where('article_cate',$id)->order('id','desc')->select();
        $cate_name = $modelCate->where('id',$id)->find();
        $this->assign(['article'=>$article_card,'cate'=>$cate_name]);
        return view();
    }
}
