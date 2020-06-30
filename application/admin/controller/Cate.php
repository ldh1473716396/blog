<?php

namespace app\admin\controller;

use app\admin\controller\Index;
use app\admin\model\Cate as modelCate;
use app\admin\model\Article as modelArticle;


class Cate extends Index 
{
	//1.栏目列表页面
    public function listcate()
    {
    	//1.实例化模型Cate
        $modelCate = new modelCate;

        //2.查询表cate的全部数据,以cate_sort数值排序
        $data = $modelCate->order('cate_sort','asc')->select();

        //3.调用Cate模型的catetree()函数，使数据格式化为树形结构
        $tree = $modelCate->catetree($data);

        //4.模板赋值   
        $this->assign('list',$tree);

        //5.页面显示
        return view();
    }

    //2.栏目添加页面
    public function addcate()
    {         	
        $modelCate = new modelCate;
        $data = $modelCate->order('cate_sort','asc')->select(); 
        $tree = $modelCate->catetree($data);  
    	$this->assign('list',$tree);
        return view();
    }

    //2.1栏目添加功能
    public function add()
    {   
    	//1.获取添加数据 	
        $data = input('post.');

        //验证添加数据且跳转或添加
        $validate = new \app\admin\validate\Cate();
        if(!$validate->check($data))
        {
            return $this->error($validate->getError());
        }

        //2.添加数据
        $judge = modelCate::create($data);

        //3.判断且跳转
        if($judge)
        {
            $this->success('添加栏目信息成功！','listcate');
        }
        else
        {
            $this->error('添加栏目信息失败！');
        }
        
    }    

    //3.栏目修改页面
    public function editcate($id)
    {
        //1.查询该条$id的数据
        $editdata = modelCate::where('id',$id)->find();

        //2.下拉菜单数据
        $modelCate = new modelCate;
        $data = $modelCate->order('cate_sort','asc')->select();            
        $tree = $modelCate->catetree($data);

        //3.模板赋值 
        $this->assign([
                        'edit'=>$editdata,
                        'list'=>$tree
                    ]);       

        //4.页面显示
        return view();
    }

    //3.1栏目修改功能
    public function edit($id)
    {   
        //1.获取修改数据  
        $edit_data = input('post.');

        //2.修改数据
        $judge = modelCate::where('id',$id)->update($edit_data);

        //3.判断且跳转
        if($judge)
        {
            $this->success('修改栏目信息成功！','listcate');
        }
        else
        {
            $this->error('修改栏目信息失败！');
        }
        
    }

    //4.栏目删除功能
    public function delete($id) 
    {
        //1.实例化模型Cate和Article
        $modelCate = new modelCate();
        $modelArticle = new modelArticle();

        //2.查询表cate的所有数据
        $data = $modelCate->select();

        //3.获取该删除栏目的子分类的id
        $sub_id = $modelCate->subCateID($data,$id);

        //4.获取该删除栏目的子分类的文章id
        $sub_article_data = $modelArticle->where(['article_cate'=>$sub_id])->select();
        $sub_article_id = $modelArticle->subArticle($sub_article_data);

        //5.判断该栏目是否有子分类和文章，有则删除
        if ($sub_article_id) 
        {
            db('article')->delete($sub_article_id);
        }
        if ($sub_id) 
        {
            db('cate')->delete($sub_id);
        }

        //6.删除该栏目和文章及保存的缩略图
        $del_article = $modelArticle->where('article_cate',$id)->find();
        @unlink($_SERVER['DOCUMENT_ROOT'].$del_article['article_thumbnail']);
        $judge_article = $modelArticle->where('article_cate',$id)->delete();
        $judge_cate = $modelCate->where('id',$id)->delete();

        //7.判断且跳转
        if($judge_article||$judge_cate)
        {
            $this->success('删除栏目信息成功！','listcate');
        }
        else
        {
            $this->error('删除栏目信息失败！');
        }

    }

    //5.排序
    public function sort()
    {
        //1.实例化模型Cate
        $modelCate = new modelCate;

        //2.获取排序数据
        $data = input('post.');

        //3.更新排序数据
        foreach ($data as $k => $v) 
        {
            $modelCate->where('id', $k)->update(['cate_sort' => $v]);
        }       
        
        //4.跳转    
        return $this->redirect('listcate');
    }
    

    

}
