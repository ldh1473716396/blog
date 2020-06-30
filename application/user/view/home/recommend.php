

<!--推荐recommend-->

<style>
.card-text{ text-decoration:none; color: #fff;}
.card-text:hover{ text-decoration:underline; color: #fff;}
</style>
<div class="col-md-12 col-lg-6">
<div class="row">
{volist name="recommend" id="data"}
<div class="col-6">

<div style="margin-top: 20px;">
<a href="{:url('user/article/read',array('id'=>$data.id))}" target="_blank">
  <img src="{$data.article_thumbnail}" class="card-img" alt="...">
  <div class="card-img-overlay">
    <h5 class="card-text">
    <?php 
  		echo mb_substr($data['article_title'],0,15,'utf-8'); 
  		if(strlen($data['article_title'])>strlen(mb_substr($data['article_title'],0,15,'utf-8'))){echo '...';}
		?>
    </h5>
  </div>
</a>
</div>

</div>
{/volist}
</div>
</div>

