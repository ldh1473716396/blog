<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		{$webname['conf_value']}
	</title>
	
	<!--bootstrap-->
	<link rel="stylesheet" type="text/css"	href="{:url('static/bootstrap/bootstrap.min.css')}">
    
		    
</head>

<body>
	
	<script type="text/javascript" charset="utf-8" src="{:url('/static/bootstrap/popper.min.js')}"></script>
    <script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="{:url('/static/bootstrap/bootstrap.min.js')}"></script>		
	
	{include file="common/header"}<!--头部-->
		
	{block name='content'}{/block}<!--中部-->
		
	{include file="common/footer"}<!--尾部-->
	
</body>
</html>