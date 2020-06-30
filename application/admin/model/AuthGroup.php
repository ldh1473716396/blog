<?php

namespace app\admin\model;

use \think\Model;


class AuthGroup extends Model
{
    //给$data_edit['rules']赋值，且去除$data_edit中的数组
	public function Correct($data)
	{
        $rules_k = array();
        $rules_v = array();
		foreach ($data as $k => $v) {
            if(!is_array($v)){
                $key_name[] = $k;
                $key_value[] = $v;
            }

            if (is_array($v)) {
                $rules_k[] = $k;
                $rules_v[] = implode(',',array_values($v));
            }           
        }
        $data_correct = array_combine($key_name,$key_value);
        $rules = array_merge($rules_k,$rules_v);
        $data_correct['rules'] = implode(',',array_unique(explode(',', implode(',',$rules))));
        return $data_correct;
	}

 
}

?>