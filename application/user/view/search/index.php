{extend name="index/index"}
{block name="content"}

{if count($result)!=0}
	<div style="text-align: center; margin-top: 55px; margin-bottom: 50px;"><h1>搜索结果</h1></div>

	<div class="container">
	<div class="row">
		<ul class="list-unstyled">
			{volist name="result" id="data"}
			<a href="{:url('user/article/read',array('id'=>$data.id))}" target="_blank">
				<li class="media my-4" style="margin-bottom: 20px">
				{if $data.article_thumbnail=='暂无图片'}
				<img src="{:url('/uploads/thumbnail.jpg')}" class="mr-3" alt="..." style="height: 130px;">
				{else}
				<img src="{$data.article_thumbnail}" class="mr-3" alt="..." style="height: 130px;">
				{/if}
				<div class="media-body" style="color: #000; margin-left: 10px;">
				<h4 class="mt-0">
				<?php 	
	      			echo mb_substr($data['article_title'],0,20,'utf-8'); 
	      			if(strlen($data['article_title'])>strlen(mb_substr($data['article_title'],0,20,'utf-8'))){echo '...';}
	      		?>
				</h4>
				<div>{$data.cate_name}</div>
				<div>{$data.article_author}</div>
				<div>{$data.article_time}</div>
				</div>
				</li>
			</a>
			{/volist}
		</ul>
	</div>
	</div>
{else}
	<div style="text-align: center; margin-top: 55px; margin-bottom: 50px;"><h1>暂无内容</h1></div>
{/if}


<!--分页-->
<div class="d-flex justify-content-center">
<div style="margin-top: 50px;">
{$result|raw}
</div>
</div>



{/block}