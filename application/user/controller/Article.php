<?php
namespace app\user\controller;
use app\user\controller\Index;
use app\user\model\Comment as modelComment;

class Article extends Index
{
    //文章
    public function read($id)
    {   	
        $article = db('article')->where('id',$id)->find();
        $comment = db('comment')->where('article_id',$id)->order('id','desc')->select();
        $this->assign(['article' => $article,
                        'comment' => $comment]);
        return view();
    }

    //评论
    public function comment($article_id)
    {
        $data = input('post.');
        $data['article_id'] = $article_id;
        $modelComment = new modelComment();
        $judge = $modelComment->save($data);
        if($judge)
        {
            $this->redirect('user/article/read',array($article_id));
        }
        else
        {
            $this->error('提交评论失败！');
        }

        
    }
}
