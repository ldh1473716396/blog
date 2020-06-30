<?php

namespace app\admin\model;

use \think\Model;


class Cate extends Model
{

	//将栏目分类数据格式化为树形结构
	public function catetree($data,$pid=0,$level=0)
	{
		//1.声明一个静态变量
		static $array = array();

		//2.遍历cate数据表的数据
		foreach ($data as $key => $value) 
		{
			//第一次顶级栏目的pid为0时
			if ($value['cate_pid'] == $pid) 
			{
				$value['level'] = $level;
				$array[] = $value;
				//使用递归方式获取分类下的子分类
				$this->catetree($data,$value['id'],$level+1);
			}
		}

		//3.返回查询结果
		return $array;
	}


	//获取该删除栏目的子分类的id
	public function subCateID($data,$id) 
	{
		//1.声明一个静态变量
		static $array = array();

		//2.遍历cate数据表的数据
        foreach ($data as $key => $value) 
        {
            //找出cate_pid与删除的栏目id一致的子分类
            if ($value['cate_pid'] == $id) 
            {
                $array[] = $value['id'];
             
                //使用递归方式再找出该子分类的子分类的id
                $this->subCateID($data,$value['id']);
            }
        }

        //3.返回查找结果
		return $array;
	}

	//前台一二级栏目
	public function cate_one_tow()
    {
    	//一级栏目
		$cate_one = $this->where('cate_pid','0')->order('cate_sort','asc')->select();

		//二级栏目
		foreach ($cate_one as $k => $v) {
			$cate_two = $this->where('cate_pid',$v['id'])->order('cate_sort','asc')->select();
			if ($cate_two) {
				$cate_one[$k]['cate_two'] = $cate_two;
			}
		}

		return $cate_one;
    }
 
}

?>