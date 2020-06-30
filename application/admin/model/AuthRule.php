<?php

namespace app\admin\model;

use \think\Model;


class AuthRule extends Model
{
	//将权限名称数据格式化为树形结构
	public function ruletree($data,$pid=0)
	{
		//1.声明一个静态变量
		static $array = array();

		//2.遍历数据表的数据
		foreach ($data as $key => $value) 
		{
			//第一次顶级权限的pid为0时
			if ($value['pid'] == $pid) 
			{
				$array[] = $value;
				//使用递归方式获取分类下的子分类
				$this->ruletree($data,$value['id']);
			}
		}

		//3.返回查询结果
		return $array;
	}

	//获取该删除权限的子权限的id
	public function subRuleID($data,$id) 
	{
		//1.声明一个静态变量
		static $array = array();

		//2.遍历rule数据表的数据
        foreach ($data as $key => $value) 
        {
            //找出rule.pid与删除的权限id一致的子分类
            if ($value['pid'] == $id) 
            {
                $array[] = $value['id'];
             
                //使用递归方式再找出该子分类的子分类的id
                $this->subRuleID($data,$value['id']);
            }
        }

        //3.返回查找结果
		return $array;
 	}

 	
}

?>