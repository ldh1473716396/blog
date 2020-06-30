{extend name="index/index"}
{block name="content"}
	
	<div style="padding-bottom: 50px; margin-bottom: 50px;  background-color: #343a40;"><!--轮播推荐背景-->
	<!--首页内容上半部-->
	<div class="container">
	<div class="row">
		<!--轮播banner-->
		{include file="home/banner"}
		<!--推荐recommend-->
		{include file="home/recommend"}
	</div>
	</div>
	</div>
	
	<!--首页内容下半部-->
	<div class="container">
	<div class="row">
		<!--卡片card-->
		{include file="home/card"}
	</div>
	</div>
	
	<!--分页-->
	<div class="d-flex justify-content-center" style="margin-top: 50px;">
		{$card|raw}
	</div>



{/block}