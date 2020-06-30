<?php

namespace app\admin\controller;

use app\admin\controller\Index;
use app\admin\model\AuthRule as modelAuthRule;


class AuthRule extends Index 
{
    //权限列表
	public function listrule()
    {
        $modelAuthRule = new modelAuthRule;
        $data = $modelAuthRule->order('sort','asc')->select();
        $tree = $modelAuthRule->ruletree($data);
        $this->assign('list',$tree);
        return view();
    }

    //权限添加页
    public function addrule()
    {
        //上级权限
        $modelAuthRule = new modelAuthRule;
        $data = $modelAuthRule->order('sort','asc')->select();
        $tree = $modelAuthRule->ruletree($data);
        $this->assign('add',$tree);

        return view();
    }

    //权限添加功能
    public function add()
    {
        $modelAuthRule = new modelAuthRule;

        //1.接收数据
        $add = input('post.');

        //2.level设定
        if($add['pid'] != '0'){           
            $pid = $modelAuthRule->where('id',$add['pid'])->field('level')->find();
            $add['level'] = $pid['level']+1;
        }

        //3.添加数据
        $judge = $modelAuthRule->save($add);

        //4.判断且跳转
        if($judge)
        {
            $this->success('添加权限信息成功！','listrule');
        }
        else
        {
            $this->error('添加权限信息失败！');
        }
    }

    //权限修改页
    public function editrule($id)
    {
        $modelAuthRule = new modelAuthRule;

        //上级权限
        $modelAuthRule = new modelAuthRule;
        $data = $modelAuthRule->order('sort','asc')->select();
        $tree = $modelAuthRule->ruletree($data);
        $edit = $modelAuthRule->where('id',$id)->find();
        $this->assign([
                        'edit'=>$edit,
                        'pid'=>$tree
                    ]);
        return view();
    }

    public function edit($id)
    {
        $data_edit = input('post.');

        $modelAuthRule = new modelAuthRule;
        $judge = $modelAuthRule->where('id',$id)->update($data_edit);
        if($judge)
        {
            $this->success('修改权限信息成功！','listrule');
        }
        else
        {
            $this->error('修改权限信息失败！');
        }
    }

    public function delete($id)
    {
        $modelAuthRule = new modelAuthRule;
        $data = $modelAuthRule->select();

        //获取该删除权限的子分类的id，有则删除
        $sub_id = $modelAuthRule->subRuleID($data,$id);
        
        if ($sub_id) 
        {
            db('auth_rule')->delete($sub_id);
        }

        //删除本条$id的数据
        $judge = $modelAuthRule->where('id',$id)->delete();
        if($judge)
        {
            $this->success('删除权限信息成功！','listrule');
        }
        else
        {
            $this->error('删除权限信息失败！');
        }
    }


    //排序
    public function sort()
    {
        $modelAuthRule = new modelAuthRule;
        $data = input('post.');
        foreach ($data as $k => $v) 
        {
            $modelAuthRule->where('id', $k)->update(['sort' => $v]);
        }       
        
        //4.跳转    
        return $this->redirect('listrule');
    }




}
