<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	

	<title>{$webname['conf_value']}管理后台登陆</title>
	
	<link rel="stylesheet" type="text/css"	href="{:url('static/layui/css')}/layui.css">
	
    <style>

    	body{
			    background-size: cover;  
			    background-image: url('{:url('/uploads/login.jpg')}');
			}

    	.layui-row{	margin-top: 150px; }
    	h1{ background-size: cover; }

    	.decrib{color: #fff;}
		
	</style>

</head>

<body>
	<div class="layui-container">
	<div class="layui-row">
	<div class="
				layui-col-xs4 		 layui-col-sm4 		  layui-col-md4 
				layui-col-xs-offset4 layui-col-sm-offset4 layui-col-md-offset4">
		
		<div class="layui-field-box" style="background-color: rgba(0,0,0,.2); padding:20px 20px 20px 20px;">
		<form class="layui-form" action="{:url('login/cherk')}" method="post" >

			<div class="layui-form-item">
				<h1>{$webname['conf_value']}管理后台登陆</h1>			    
			</div>

			<div class="layui-form-item">			    
				<span class="decrib">账号：</span>
				<input type="text" name="admin_name" placeholder="请输入账号" autocomplete="off" class="layui-input" autofocus="true" required>
			</div>

			<div class="layui-form-item">				
				<span class="decrib">密码：</span>
				<input type="password" name="admin_password" placeholder="请输入密码" autocomplete="off" class="layui-input" required>
			</div>

			<div class="layui-form-item">			    
				<span class="decrib">验证码：</span>
				<div>
					<input type="text" name="captcha" placeholder="请输入验证码" autocomplete="off" class="layui-input" autofocus="true" required style="float: left; width: 200px;">
					<img src="{:url('admin/login/verify')}" onclick="this.src='{:url('admin/login/verify')}?'+Math.random();" alt="captcha" style="float: right; height: 38px; width: 130px; cursor: pointer; "/>	
				</div>				
			</div>

			<div class="layui-form-item">				
				<button class="layui-btn layui-btn-fluid" type="submit">登 录</button>				
			</div>
		
		</form>
		</div>
	
	</div>
	</div>
    </div>
</body>

<script src="{:url('/static/layui')}/layui.js" type="text/javascript" charset="utf-8"></script>


</html>