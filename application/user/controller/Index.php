<?php
namespace app\user\controller;
use think\Controller;
use app\admin\model\Conf as modelConf;
use app\admin\model\Cate as modelCate;


class Index extends Controller
{
	protected function initialize()
    {
    	//header
		//logo
		$modelConf = new modelConf;
    	$conf_webname = $modelConf->where('conf_chs_name','网站名称')->field('conf_value')->find();
		$this->assign('webname',$conf_webname);
		//栏目
		$modelCate = new modelCate;
		$cate_one = $modelCate->cate_one_tow();
        $this->assign('cate_one',$cate_one);

        //footer
		//底部链接
        $link_data = db('link')->order('link_sort asc')->select();
        $this->assign('link',$link_data);


    }

    public function index()
    {
        return view();
    }
}
