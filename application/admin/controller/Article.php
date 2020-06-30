<?php

namespace app\admin\controller;

use app\admin\controller\Index;
use app\admin\model\Article as modelArticle;
use app\admin\model\Cate as modelCate;


class Article extends Index 
{
	//1.文章列表页面
    public function listarticle()
    {
    	//1.实例化模型Article
    	$modelArticle = new modelArticle();

        //2.以分页形式调出表admin的全部数据和表cate的cate_name数据
        $data = $modelArticle->field('article.*,cate.cate_name')->join('cate','article.article_cate = cate.id')->order('id','desc')->paginate(6);

        //3.模板赋值
        $this->assign( 'list',$data );

        //4.页面显示
        return view();
    }

    //2.文章添加页面
    public function addarticle()
    {
        //所属分类
        $modelCate = new modelCate();
        $CateData = $modelCate->order('cate_sort','asc')->select();
        $tree = $modelCate->catetree($CateData);  
        $this->assign('cate',$tree);

        return view();
    }

    //2.1文章添加功能
    public function add()
    {
        //1.获取添加数据 
        $data = input('post.');

        //验证添加数据且跳转或添加
        $validate = new \app\admin\validate\Article();
        if(!$validate->check($data))
        {
            return $this->error($validate->getError());
        }

        //2.实例化模型Article和modelCate
        $modelArticle = new modelArticle();
        $modelCate = new modelCate();

        //3.缩略图
        if ($_FILES['article_thumbnail']['tmp_name']) 
        {
            $data['article_thumbnail'] = $modelArticle->thumbnail($data);
        }       
        else
        {
            $data['article_thumbnail'] = '暂无图片';
        }        

        //4.添加数据
        $judge = $modelArticle->save($data);

        //5.判断且跳转
        if($judge)
        {
            $this->success('添加文章信息成功！','listarticle');
        }
        else
        {
            $this->error('添加文章信息失败！');
        }   
    }

    //3.文章修改页面
    public function editarticle($id)
    {
        //1.查询该条$id的数据->
        $modelArticle = new modelArticle();
        $editdata = $modelArticle->where('id',$id)->find();

        //2.下拉菜单数据    
        $modelCate = new modelCate();
        $data = $modelCate->order('cate_sort','asc')->select();
        $tree = $modelCate->catetree($data);

        //3.模板赋值 
        $this->assign([
                        'edit'=>$editdata,
                        'cate'=>$tree
                    ]);       

        //4.模板赋值
        return view();
    }

    //3.1文章修改功能
    public function edit($id)
    {
        //1.获取修改数据  
        $data = input('post.');

        //验证添加数据且跳转或添加
        $validate = new \app\admin\validate\Article();
        if(!$validate->scene('Edit')->check($data))
        {
            return $this->error($validate->getError());
        }        

        //2.实例化模型Article和modelCate
        $modelArticle = new modelArticle();
        $modelCate = new modelCate();

        //3.缩略图
        $article = $modelArticle->where('id',$id)->find();

        if ($_FILES['article_thumbnail']['tmp_name']) 
        {
        	//删除原图
        	@unlink($_SERVER['DOCUMENT_ROOT'].$article['article_thumbnail']);

        	//保存新图
            $data['article_thumbnail'] = $modelArticle->thumbnail($data);
        }
        elseif(!empty($data['article_thumbnail']))
        {
        	@unlink($_SERVER['DOCUMENT_ROOT'].$article['article_thumbnail']);

            $data['article_thumbnail'] = '暂无图片';
        }        
        else
        {            
            $data['article_thumbnail'] = $article['article_thumbnail'];
        }        
        
        //4.修改数据
        $save = $modelArticle->where('id',$id)->find();
        $judge = $save->save($data);

        //5.判断且跳转
        if($judge)
        {
            $this->success('修改文章信息成功！','listarticle');
        }
        else
        {
            $this->error('修改文章信息失败！','listarticle');
        }
        
    }

    //4.文章删除功能
    public function delete($id) 
    {
        //1.实例化模型Article
        $modelArticle = new modelArticle();

        //2.删除保存的缩略图
        $article = $modelArticle->where('id',$id)->find();
        if($article['article_thumbnail'] != '暂无图片')
        {
        	@unlink($_SERVER['DOCUMENT_ROOT'].$article['article_thumbnail']);
        }

        //3.删除该栏目
        $judge = $modelArticle->where('id',$id)->delete();

        //4.判断且跳转
        if($judge)
        {
            $this->success('删除文章信息成功！','listarticle');
        }
        else
        {
            $this->error('删除文章信息失败！');
        }

    }

    //5.前台排序
    public function sort()
    {
        $modelArticle = new modelArticle();
        $data = input('post.');
        foreach ($data as $k => $v) 
        {
            $modelArticle->where('id', $k)->update(['article_sort' => $v]);
        }       
        return $this->redirect('listarticle');
    }

    public function ContentImage()
    {
        $file = $this->request->file('file');
        $info = $file->validate(['size'=>1024*10240,'ext'=>'jpg,png,gif,jpeg'])->move('./uploads');

        $result = [];
        if ($info) {
            $result['code'] = 0;
            $result['data']['title'] = $info->getSaveName();
            $result['data']['src'] = url("uploads/".$info->getSaveName());
        }else{
            $result['code'] = 1;
            $result['msg'] = '上传失败'.$file->getError();
        }
        return json( $result ); 
    }
    

}
