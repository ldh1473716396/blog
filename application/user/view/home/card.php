

<!--卡片card-->
<style>
figcaption{ text-decoration:none; color: #000;}
figcaption:hover{ text-decoration:underline; color: #000;}
</style>
{volist name="card" id="data"}
<div class="col-md-6 col-lg-3">
<div style="margin-top: 20px;">
	<figure class="figure">
	<a href="{:url('user/article/read',array('id'=>$data.id))}" target="_blank">
		{if $data.article_thumbnail=='暂无图片'}
		<img src="{:url('/uploads/thumbnail.jpg')}" class="figure-img img-fluid rounded" alt="...">
		{else}
		<img src="{$data.article_thumbnail}" class="figure-img img-fluid rounded" alt="...">
		{/if}
		<figcaption class="figure-caption"><h5>{$data.cate_name}</h5></figcaption>
		<figcaption class="figure-caption" style="color: #000;"><h5>
			<?php 
	  			echo mb_substr($data['article_title'],0,15,'utf-8'); 
	  			if(strlen($data['article_title'])>strlen(mb_substr($data['article_title'],0,15,'utf-8'))){echo '...';}
		    ?>
		</h5></figcaption>
	</a>
	</figure>
</div>
</div>
{/volist}



