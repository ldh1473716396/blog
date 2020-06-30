<?php
namespace app\user\controller;
use app\user\controller\Index;
use app\admin\model\Article as modelArticle;

class Search extends Index
{
    //搜索结果
    public function Index()
    {   	
        $data = input('post.');
        $data_string = implode($data);
        $modelArticle = new modelArticle;
        $search_result = $modelArticle->field('article.*,cate.cate_name')->join('cate','article.article_cate = cate.id')
        						->where('cate_name|article_title|article_author|article_keyword|article_describe|article_content','like',"%{$data_string}%")
        						->order('id','desc')
        						->paginate(10);

        $this->assign('result',$search_result);
        return view();     
    }
}
