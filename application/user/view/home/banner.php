<!--轮播banner-->
<style>
	.banner img{ 
	max-width: 100%;
    max-height: 100%;}
</style>
<div class="col-md-12 col-lg-6">
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" style="margin-top: 22px;">

	<!--底部指标-->
	<ol class="carousel-indicators">
	{volist name="banner" id="data"}
	<li data-target="#carouselExampleCaptions" data-slide-to="{$data.article_sort}"></li>
	{/volist}
	</ol>

	<!--图片文字-->	
	<div class="carousel-inner">
	{volist name="banner" id="data"}
	<div class="carousel-item {if $data.article_sort <= 1}active{/if}" data-interval="2000">
	<a href="{:url('user/article/read',array('id'=>$data.id))}" target="_blank">
		<div class="banner">	
		<img src="{$data.article_thumbnail}" class="d-block w-100" alt="...">
		</div>
		<div class="carousel-caption d-none d-md-block">
		<div class="text">
		<h5><?php 
			echo mb_substr($data['article_title'],0,30,'utf-8'); 
			if(strlen($data['article_title'])>strlen(mb_substr($data['article_title'],0,30,'utf-8'))){echo '...';}
			?>
		</h5>
		</div>
		</div>
	</a>	
	</div>
	{/volist}
	</div>
	
	<!--左右箭头-->
	<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
	<span class="sr-only"></span>
	</a>
	<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
	<span class="carousel-control-next-icon" aria-hidden="true"></span>
	<span class="sr-only"></span>
	</a>

</div>
</div>