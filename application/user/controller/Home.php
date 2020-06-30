<?php
namespace app\user\controller;
use app\user\controller\Index;


class Home extends Index
{
    //首页
    public function index()
    {
    	//轮播banner
    	$article_banner = db('article')->where('article_banner','1')->order('article_sort','asc')->select();
    	$this->assign('banner',$article_banner);

    	//推荐recommend
    	$article_recommend = db('article')->where('article_recommend','1')->limit('0, 4')->order('article_sort','asc')->select();
    	$this->assign('recommend',$article_recommend);

        //卡片card
        $article_card = db('article')->field('article.*,cate.cate_name')->join('cate','article.article_cate = cate.id')->order('id','desc')->paginate(12);
        $this->assign('card',$article_card);

        return view();
    }
}
