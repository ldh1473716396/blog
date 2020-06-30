<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		{$webname['conf_value']}用户登陆
	</title>
	
	<!--bootstrap-->
	<link rel="stylesheet" type="text/css"	href="{:url('static/bootstrap/bootstrap.min.css')}">
	<script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" charset="utf-8" src="{:url('/static/bootstrap/bootstrap.min.js')}"></script>
		    
</head>

<body>		
<div class="col-lg-4 offset-lg-4" style="margin-top: 100px;">
	<div class="border border-success" style="padding: 30px;">
		<h4><div style="text-align: center;">{$webname['conf_value']}用户登陆</div></h4>
		<form action="{:url('user/signin')}" method="post">
			<div class="form-group">
			<label for="exampleInputEmail1">名称</label>
			<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="user_name" required>
			</div>
			<div class="form-group">
			<label for="exampleInputPassword1">密码</label>
			<input type="password" class="form-control" id="exampleInputPassword1" name="user_password" required>
			</div>
			<button type="submit" class="btn btn-success btn-lg btn-block">登陆</button>
		</form>
	</div>		
</div>	
	
	
</body>
</html>