<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});

Route::get('hello/:name', 'index/hello');


//blog
//admin
Route::get('verify','admin/login/verify');//登陆验证码
Route::get('admin/login','admin/login/login');//登陆
Route::get('admin/logout','admin/login/logout');//退出登陆

Route::get('admin/home','admin/index/index');//首页

Route::get('admin/list','admin/admin/homepage');//管理员列表
Route::get('admin/add','admin/admin/addpage');//管理员添加
Route::get('admin/edit','admin/admin/editpage');//管理员修改
Route::get('admin/del','admin/admin/del');//管理员删除


//user
Route::get('/','user/home/index');//首页
Route::get('cate','user/cate/card');//栏目
Route::get('user/search','user/search/index');//搜索
Route::get('read','user/article/read');//阅读




return [

];
