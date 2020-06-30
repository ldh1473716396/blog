<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	    <title>{$webname['conf_value']}管理后台</title>

	    <link rel="stylesheet" type="text/css"	href="{:url('static/layui/css')}/layui.css">	    
	</head>

	<body class="layui-layout-body">

		<script src="{:url('/static/layui')}/layui.js" type="text/javascript" charset="utf-8"></script>

		<div class="layui-layout layui-layout-admin">
			{include file="common/header"}

			{include file="common/sidebar"}    

			{block name='content'}
				<div  class="layui-body" style="padding: 180px; text-align:center;">
					<h1>欢迎来到{$webname['conf_value']}管理后台</h1>
				</div>
			{/block}

			{include file="common/footer"} 
		</div>

	</body>
</html>