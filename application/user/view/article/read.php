{extend name="index/index"}
{block name="content"}
<style>
	.article img{ 
	max-width: 100%;
    max-height: 100%;}
</style>
<!--文章-->
<div class="container">
<div style="text-align: center; margin-top: 50px; margin-bottom: 20px"><h2>{$article.article_title}</h2></div>
<p style="text-align: center;">{$article.article_author}</p>
<p style="text-align: right;">{$article.article_time|date="Y-m-d H:i:s"}</p>
<div class="article"><h5>{$article.article_content|raw}</h5></div>
</div>

<!--评论-->
<div class="container" style="margin-top: 100px;">
	<div class="border border-primary" style="padding: 20px;">
	<!--输入评论-->
	<form action="{:url('article/comment',array('article_id'=>$article.id))}" method="post">
	  <div class="form-group">
	    <h5>评论</h5>
	    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content" required></textarea>
	  </div>
	  <div class="d-flex justify-content-end"><button type="submit" class="btn btn-primary">提交</button></div>	
	</form>

	<!--查看评论-->
	{volist name="comment" id="data"}
	<div class="alert alert-secondary" role="alert" style="margin-top: 20px;">
	<p>{$data.content}</p>
	<div class="d-flex justify-content-end">{$data.comment_time|date="Y-m-d H:i:s"}</div>
	</div>
	{/volist}
	</div>
</div>
{/block}