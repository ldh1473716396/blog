<?php

namespace app\admin\model;

use \think\Model;


class Conf extends Model
{
	//判断conf_value是否有值为空
	public function ValueEmpty($data,$select)
	{
		//conf表里全部en_name
		$select_en_name = array();
		foreach ($select as $k1 => $v1) {
			$select_en_name[] = $v1['conf_en_name'];
		}

		//data里全部en_name
		$data_en_name = array();
		foreach ($data as $k2 => $v2) {
			$data_en_name[] = $k2;
		}

		//array_diff()函数用于比较两个（或更多个）数组的值，并返回差集。
		$value_empty = array_diff($select_en_name,$data_en_name);

		return $value_empty;
	}

	//判断conf_value是否有值为数组
	public function ValueArray($data)
	{
		$key_name = array();
		$key_value = array();
		foreach ($data as $k3 => $v3) 
		{			
			if(is_array($v3))
			{
				$key_name[] = $k3;
				$key_value[] = implode('/',array_values($v3));
			}
		}
		if ($key_name&&$key_value) {
			$value_array[] = array_combine($key_name,$key_value);
		}
		else{
			$value_array = array();
		}

		return $value_array;
	}
	
 
}

?>