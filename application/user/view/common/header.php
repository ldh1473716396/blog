<style>
.logo{ text-decoration:none; color: #fff;}
.logo:hover{ text-decoration:underline; color: #fff;}
</style>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container">

	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
	
	<a class="navbar-brand" href="{:url('user/home/index')}" style="font-size: 30px;"><div class="logo">{$webname['conf_value']}</div></a>
	
	<div class="collapse navbar-collapse" id="navbarTogglerDemo03" style="font-size: 20px;">
		
		<ul class="navbar-nav">
			{volist name = "cate_one" id = "one"}
			{if count($one['cate_two'])==0}
			<li class="nav-item">
	        <a class="nav-link" href="{:url('user/cate/card',array('id'=>$one.id))}">{$one['cate_name']}</a>
	      	</li>
	      	{else}
			<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			{$one['cate_name']}
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
			<?php foreach ($one['cate_two'] as $k => $v): ?>
			<a class="dropdown-item" href="{:url('user/cate/card',array('id'=>$v['id']))}">{$v['cate_name']}</a>
			<?php endforeach; ?>
			</div>
			</li>
			{/if}
			{/volist}			
		</ul>
		
		<form class="form-inline" action="{:url('user/search/index')}" method="post">
		<input class="form-control" type="search" name="search" placeholder="宁可少字不能错字" required aria-label="Search">
		&nbsp;
		<button class="btn btn-outline-success" type="submit">搜索</button>
		</form>
				
		<ul class="navbar-nav">
		{if !$Request.session.user_name}
		<li class="nav-item">
		<a class="nav-link" href="{:url('user/user/signup_page')}">注册</a>
		</li>
		<li class="nav-item">
		<a class="nav-link" href="{:url('user/user/signin_page')}">登陆</a>
		</li>
		{else}
		<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		{$Request.session.user_name}
		</a>
		<div class="dropdown-menu" aria-labelledby="navbarDropdown">
		<a class="dropdown-item" href="{:url('user/user/center')}">个人中心</a>
		<a class="dropdown-item" href="{:url('user/user/signout')}">退出登陆</a>
		</div>
		</li>
		{/if}		
		</ul>
	

	</div>

</div>
</nav>






  

  


 
