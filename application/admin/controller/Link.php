<?php

namespace app\admin\controller;

use app\admin\controller\Index;
use app\admin\model\Link as modelLink;


class Link extends Index 
{
	//1.链接列表页面
    public function listlink()
    {
    	//1.实例化模型link
        $modelLink = new modelLink;

        //2.查询表link的全部数据,以link_sort数值排序
        $data = $modelLink->order('link_sort','asc')->select();

        //3.模板赋值   
        $this->assign('list',$data);

        //4.页面显示
        return view();
    }

    //2.链接添加页面
    public function addlink()
    {         	    	
        return view();
    }

    //2.1链接添加功能
    public function add()
    {         	    	
        $add = input('post.');

        //验证添加数据且跳转或添加
        $validate = new \app\admin\validate\Link();
        if(!$validate->check($add))
        {
            return $this->error($validate->getError());
        }        
        
        //2.添加数据
        $modelLink = new modelLink;
        $judge = $modelLink->save($add);

        //3.判断且跳转
        if($judge)
        {
            $this->success('添加链接信息成功！','listlink');
        }
        else
        {
            $this->error('添加链接信息失败！');
        }
    }

    //3.链接修改页面
    public function editlink($id)
    {
    	$modelLink = new modelLink;
    	$editdata = $modelLink->where('id',$id)->find();
    	$this->assign('edit',$editdata);
    	return view();
    }

    //3.1链接修改功能
    public function edit($id)
    {
    	$modelLink = new modelLink;
    	$edit = input('post.');

        //验证添加数据且跳转或添加
        $validate = new \app\admin\validate\Link();
        if(!$validate->scene('Edit')->check($edit))
        {
            return $this->error($validate->getError());
        } 

    	$judge = $modelLink->where('id',$id)->update($edit);
        if($judge)
        {
            $this->success('修改链接信息成功！','listlink');
        }
        else
        {
            $this->error('修改链接信息失败！');
        }
    }

    //4.链接删除
    public function delete($id)
    {
    	$modelLink = new modelLink;
    	$judge = $modelLink->where('id',$id)->delete();
    	if($judge)
        {
            $this->success('删除链接信息成功！','listlink');
        }
        else
        {
            $this->error('删除链接信息失败！');
        }
    }

   	//5.排序
    public function sort()
    {
        //1.实例化模型Cate
        $modelLink = new modelLink;

        //2.获取排序数据
        $data = input('post.');

        //3.更新排序数据
        foreach ($data as $k => $v) 
        {
            $modelLink->where('id', $k)->update(['link_sort' => $v]);
        }       
        
        //4.跳转    
        return $this->redirect('listlink');
    }
    

    

}
