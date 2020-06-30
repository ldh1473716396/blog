<?php

namespace app\admin\controller;

use app\admin\controller\Index;
use app\admin\model\AuthGroup as modelAuthGroup;
use app\admin\model\AuthRule as modelAuthRule;

class AuthGroup extends Index 
{
    //用户组列表
	public function listgroup()
    {
        $modelAuthGroup = new modelAuthGroup;
        $data = $modelAuthGroup->select();
        $this->assign('list',$data);
        return view();
    }

    //用户组添加页
    public function addgroup()
    {
        //配置权限
        $modelAuthRule = new modelAuthRule;
        $onelevel = $modelAuthRule->where('level','0')->order('sort','asc')->select();
        $this->assign('onelevel',$onelevel);

        return view();
    }

    //用户组添加功能
    public function add()
    {
        //1.接收数据
        $add = input('post.');       

        //2.判断$add['status']是否定义
        if (!isset($add['status'])) {
            $add['status'] = "0";
        }

        //3.给'rules'赋值，且去除数据中的数组
        $modelAuthGroup = new modelAuthGroup;
        $data_correct = $modelAuthGroup->Correct($add);

        //4.添加数据
        $judge = $modelAuthGroup->save($data_correct);

        //5.判断且跳转
        if($judge)
        {
            $this->success('添加用户组信息成功！','listgroup');
        }
        else
        {
            $this->error('添加用户组信息失败！');
        }
    }

    //用户组修改页
    public function editgroup($id)
    {
        $modelAuthGroup = new modelAuthGroup;
        $data = $modelAuthGroup->where('id',$id)->find();
        $this->assign('edit',$data);

        //配置权限
        $modelAuthRule = new modelAuthRule;
        $onelevel = $modelAuthRule->where('level','0')->order('sort','asc')->select();
        $this->assign('onelevel',$onelevel);

        return view();
    }

    public function edit($id)
    {
    	//1.接收数据
        $data_edit = input('post.');

        //2.判断$add['status']是否定义
        if (!isset($data_edit['status'])) {
            $data_edit['status'] = "0";
        }

        //3.给'rules'赋值，且去除数据中的数组
        $modelAuthGroup = new modelAuthGroup;
        $data_correct = $modelAuthGroup->Correct($data_edit);

        //4.修改数据
        $judge = $modelAuthGroup->where('id',$id)->update($data_correct);

        //5.跳转
        if($judge)
        {
            $this->success('修改用户组信息成功！','listgroup');
        }
        else
        {
            $this->error('修改用户组信息失败！');
        }
    }

    public function delete($id)
    {
        $modelAuthGroup = new modelAuthGroup;
        $judge = $modelAuthGroup->where('id',$id)->delete();
        if($judge)
        {
            $this->success('删除用户组信息成功！','listgroup');
        }
        else
        {
            $this->error('删除用户组信息失败！');
        }
    }




}
