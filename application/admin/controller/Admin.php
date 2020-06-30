<?php

namespace app\admin\controller;

use app\admin\controller\Index;
use app\admin\model\Admin as modelAdmin;
use app\admin\model\AuthGroup as modelAuthGroup;


class Admin extends Index 
{
	//1.管理员列表页
    public function homepage()
    {
        $admin = modelAdmin::paginate(2);
        foreach ($admin as $k => $v) {
            $group_access = db('auth_group_access')->where('uid',$v['id'])->find();
            $auth_group = db('auth_group')->where('id',$group_access['group_id'])->find();
            $v['group_title'] = $auth_group['title'];
        }

        $this->assign( 'list',$admin );
        return view();
    }

    //2.管理员添加页
    public function addpage()
    { 
    	//所属用户组
    	$modelAuthGroup = new modelAuthGroup;
    	$auth_group = $modelAuthGroup->select();
    	$this->assign( 'group',$auth_group );

        return view();
    }

    //2.1添加功能
    public function add()
    {
        //1.获取添加数据
        $add = input('post.');

        //2.实例化模型modelAdmin
        $modelAdmin = new modelAdmin();

        //3.验证添加数据且跳转或添加
        $validate = new \app\admin\validate\Admin();

        if(!$validate->check($add))
        {
            return $this->error($validate->getError());
        }
        else
        {
            $data['admin_password'] = md5($add['admin_password']);
        	$data['admin_name'] = $add['admin_name'];
        	$judge_admin = $modelAdmin->save($data);
        	$AuthGroupAccess['uid'] = $modelAdmin->id;
        	$AuthGroupAccess['group_id'] = $add['group_id'];
        	$judge_access = db('auth_group_access')->insert($AuthGroupAccess);
        }

        //4.判断且跳转
        if($judge_admin&&$judge_access)
        {
            $this->success('添加管理员信息成功！','admin/admin/homepage');
        }
        else
        {
            $this->error('添加管理员信息失败！');
        }
         
    }

 	//3.管理员修改页
    public function editpage($id)
    {
        //所属用户组
        $modelAuthGroup = new modelAuthGroup;
        $auth_group = $modelAuthGroup->select();
        $access = db('auth_group_access')->where('uid',$id)->find();
        $this->assign([
                        'group' => $auth_group,
                        'access' => $access
                    ]);

        //1.查询该条$id的数据 	
    	$editpage = modelAdmin::where('id',$id)->find();
        
        //2.模板赋值
    	$this->assign('data',$editpage);

        //3.页面显示
        return view();
    }

    //3.1修改功能
    public function edit($id)
    { 
        //1.获取修改数据
        $edit = input('post.');
        
        //2.判断管理员名称和密码是否修改，无修改则为原值
        $data = modelAdmin::where('id' , $id)->find();
        if ( !$edit['admin_name'] )
        {
            $edit['admin_name'] = $data['admin_name'];
        }
        if ( !$edit['admin_password'] )
        {
            $edit['admin_password'] = $data['admin_password'];
        }
        else
        {
            $edit['admin_password'] = md5($edit['admin_password']);
        }

        //3.修改数据
        $editAdmin['admin_name'] = $edit['admin_name'];
        $editAdmin['admin_password'] = $edit['admin_password'];
        $judge_admin = modelAdmin::where('id',$id)->update($editAdmin);
        $judge_access = db('auth_group_access')->where('uid',$id)->update(['group_id'=>$edit['group_id']]);

        //4.判断且跳转
        if($judge_admin||$judge_access)
        {
            $this->success('修改管理员信息成功！','admin/admin/homepage');
        }
        else
        {
            $this->error('修改管理员信息失败！');
        }

        
    }

    //4. 删除
    public function del($id)
    { 
    	//1.删除数据
    	$judge = modelAdmin::where('id',$id)->delete();

    	//2.判断且跳转
        if($judge)
        {
            $this->success('删除管理员信息成功！','admin/admin/homepage');
        }
        else
        {
            $this->error('删除管理员信息失败！');
        }
        
    }

}
