<?php
namespace app\admin\controller;

use think\Controller;
use think\facade\Request;


class Index extends Controller
{
    //控制器初始方法	
	protected function initialize()
    {
        if(!session('id') || !session('name'))
        {
           $this->error('请登录','admin/login/login'); 
        }

		//获取当前网址名称：控制器/方法
		$controller = Request::controller();//当前控制器名称
        $action = Request::action();//当前方法名称
		$name = $controller.'/'.$action;//控制器/方法


		//管理员权限
		$auth = new Auth();
        $notcheck = array('Index/index');
        if (session('id')!=1) {
            if (!in_array($name, $notcheck)) {
                if (!$auth->check($name,session('id'))) {
                $this->error('暂无权限','admin/index/index'); 
                }
            }
        }
        
		//网站名称
        $conf_webname = db('conf')->where('conf_chs_name','网站名称')->field('conf_value')->find();
        $this->assign('webname',$conf_webname);

    }

    public function index()
    {
        return view();
    }
}

