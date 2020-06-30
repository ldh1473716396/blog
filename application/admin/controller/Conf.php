<?php

namespace app\admin\controller;

use app\admin\controller\Index;
use app\admin\model\Conf as modelConf;


class Conf extends Index 
{
    public function homeconf()
    {
    	$modelConf = new modelConf;
        $data = $modelConf->order('conf_sort','asc')->select();
        $this->assign( 'home',$data );
        return view();        
    }
    public function home()
    {
        $modelConf = new modelConf;
        $data = input('post.');

        if ($data)
        {
        	//1.判断conf_value是否有值为空
        	$select = $modelConf->field('conf_en_name')->select();
        	$value_empty = $modelConf->ValueEmpty($data,$select);
        	if ($value_empty) {
        		foreach ($value_empty as $k => $v) {
        			$modelConf->where('conf_en_name',$v)->update(['conf_value'=>""]);
        		}
        	}
        	
        	//2.判断conf_value是否有值为数组
        	$value_array = $modelConf->ValueArray($data);
        	if ($value_array) {
        		foreach ($value_array as $k1 => $v1) {
        			foreach ($v1 as $k2 => $v2) {
        				$modelConf->where('conf_en_name',$k2)->update(['conf_value'=>$v2]);
        			}       			
        		}
        	}

        	//3.修改conf_value
        	foreach ($data as $key => $value) {
        		if (!is_array($value)) {
        			$modelConf->where('conf_en_name',$key)->update(['conf_value'=>$value]);
        		}       		
        	}
        	$this->success('编辑配置项信息成功','homeconf');
        }
        else{$this->error('编辑配置项信息失败');}
    }

    //1.列表
    public function listconf()
    {
        $modelConf = new modelConf;
        $data = $modelConf->order('conf_sort','asc')->paginate(6);
        $this->assign( 'list',$data );
        return view();
    }

	//2.添加页	
	public function addconf()
    {
        return view();
    }

    //2.1添加功能
    public function add()
    {
        $add = input('post.');

        //验证数据
        $validate = new \app\admin\validate\Conf();
        if(!$validate->check($add))
        {
            return $this->error($validate->getError());
        }

        $add['conf_en_name'] = str_replace(" ","_",$add['conf_en_name']);//英文名称
        $modelConf = new modelConf;
        $judge = $modelConf->save($add);
        if($judge)
        {
            $this->success('添加配置信息成功！','listconf');
        }
        else
        {
            $this->error('添加配置信息失败！');
        }
    }

    //3.修改页
    public function editconf($id)
    {
        $modelConf = new modelConf;
    	$editdata = $modelConf->where('id',$id)->find();
    	$this->assign('edit',$editdata);
    	return view();
    }

    //3.1修改功能
    public function edit($id)
    {
        $modelConf = new modelConf;
        $edit = input('post.');

        //验证数据
        $validate = new \app\admin\validate\Conf();
        if(!$validate->scene('Edit')->check($edit))
        {
            return $this->error($validate->getError());
        }

        $edit['conf_en_name'] = str_replace(" ","_",$edit['conf_en_name']);//英文名称
    	$judge = $modelConf->where('id',$id)->update($edit);
        if($judge)
        {
            $this->success('修改配置信息成功！','listconf');
        }
        else
        {
            $this->error('修改配置信息失败！');
        }
    }

    //4.链接删除
    public function delete($id)
    {
    	$modelConf = new modelConf;
    	$judge = $modelConf->where('id',$id)->delete();
    	if($judge)
        {
            $this->success('删除配置信息成功！','listconf');
        }
        else
        {
            $this->error('删除配置信息失败！');
        }
    }

    //5.排序
    public function sort()
    {
        //1.实例化模型Cate
        $modelConf = new modelConf;

        //2.获取排序数据
        $data = input('post.');

        //3.更新排序数据
        foreach ($data as $k => $v) 
        {
            $modelConf->where('id', $k)->update(['conf_sort' => $v]);
        }       
        
        //4.跳转    
        return $this->redirect('listconf');
    }


}
