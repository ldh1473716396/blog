
<!--个人资料修改-->
<h4><div style="text-align: center;">个人资料修改</div></h4>
<form action="{:url('user/data',array('id'=>$Request.session.user_id))}" method="post">
	<div class="form-group">
	<label for="exampleInputEmail1">名称</label>
	<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="user_name" value="{$Request.session.user_name}" required>
	</div>
	<div class="form-group">
	<label for="exampleInputPassword1">密码</label>
	<input type="password" class="form-control" id="exampleInputPassword1" name="user_password" placeholder="不修改密码则无需填写">
	</div>
	<button type="submit" class="btn btn-primary">修改</button>
</form>

