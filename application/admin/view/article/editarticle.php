{extend name="index/index"}
{block name="content"}

<div  class="layui-body" style="padding: 20px;">

	<!--面包屑-->
	<blockquote class="layui-elem-quote layui-quote-nm">
		<span class="layui-breadcrumb" lay-separator="|">
		  <a href="{:url('admin/index/index')}">系统</a>
		  <a href="{:url('article/listarticle')}">文章管理</a>
		  <a href="{:url('article/editarticle')}"><cite>文章修改</cite></a>
		</span>
	</blockquote>
		
	
	<fieldset class="layui-elem-field layui-field-title">
	<legend>文章修改</legend>	
	<div style="padding-top:10px;">
		
	<form class="layui-form layui-form-pane" action="{:url('article/edit',array('id'=>$edit.id))}" enctype="multipart/form-data" method="post">
	<div class="layui-col-xs8 layui-col-sm8 layui-col-md8">

	<div class="layui-form-item">
    <label class="layui-form-label">所属栏目</label>
    <div class="layui-input-inline">
    <select name="article_cate" lay-verify="required">
    {volist name="cate" id="data"}
    <option value="{$data.id}"><option {if condition = "$data.id eq $edit.article_cate"} selected="selected"  {/if} value="{$data.id}">{if condition = "$data['level'] neq 0"}|{/if}<?php echo str_repeat('--',$data['level']*3) ?>{$data.cate_name}</option></option>
    {/volist}
    </select>
    </div>
    </div>

    <div class="layui-form-item">
    <label class="layui-form-label">标题</label>
    <div class="layui-input-block">
    <input type="text" name="article_title" required placeholder="请输入标题" value="{$edit.article_title}" autocomplete="off" class="layui-input">
    </div>
    </div>

    <div class="layui-form-item">
    <label class="layui-form-label">作者</label>
    <div class="layui-input-block">
    <input type="text" name="article_author" required placeholder="请输入作者" value="{$edit.article_author}" autocomplete="off" class="layui-input">
    </div>
    </div>

    <div class="layui-form-item">
    <label class="layui-form-label">关键词</label>
    <div class="layui-input-block">
    <input type="text" name="article_keyword" required="" lay-verify="required" value="{$edit.article_keyword}" autocomplete="off" class="layui-input">
    </div>
    </div>

    
    <div class="layui-form-item">
    <label class="layui-form-label">缩略图</label>
    <div class="layui-input-inline">   
    <input type="file" name="article_thumbnail" autocomplete="off" class="layui-input">
    </div>
    <img src="{$edit.article_thumbnail}" alt="{$edit.article_thumbnail}" style="height: 35px;">
    {if condition = "$edit.article_thumbnail neq '暂无图片'"}
    <input type="checkbox" name="article_thumbnail" title="删除图片" value="1">
    {/if}
    </div>

    <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">描述</label>
    <div class="layui-input-block">
    <textarea type="text" name="article_describe" required="" lay-verify="required" class="layui-textarea" >{$edit.article_describe}</textarea>
    </div>
    </div>

    </div>

    <div class="layui-col-xs11 layui-col-sm11 layui-col-md11">
    <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">内容</label>
    <div class="layui-input-block">
    <textarea name='article_content' class="layui-textarea" id="LAY_demo1" style="display: none;">{$edit.article_content}</textarea>
    </div>
    </div>
    </div>

    <div class="layui-col-xs8 layui-col-sm8 layui-col-md8">
    <div class="layui-form-item" pane="">
    <label class="layui-form-label">上轮播页</label>
    <div class="layui-input-block">
    <input type="radio" name="article_banner" value="1" title="是" {if condition = "$edit['article_banner'] eq 1"} checked {/if}>
    <input type="radio" name="article_banner" value="0" title="否" {if condition = "$edit['article_banner'] eq 0"} checked {/if}>
    </div>
    </div>

    <div class="layui-form-item" pane="">
    <label class="layui-form-label">是否推荐</label>
    <div class="layui-input-block">
    <input type="radio" name="article_recommend" value="1" title="是" {if condition = "$edit['article_recommend'] eq 1"} checked {/if}>
    <input type="radio" name="article_recommend" value="0" title="否" {if condition = "$edit['article_recommend'] eq 0"} checked {/if}>
    </div>
    </div>

    <div class="layui-form-item">
    <button class="layui-btn" lay-submit="" lay-filter="formDemoPane">立即提交</button>
    </div>
	
	</div>
    </form>

	</div>
	</fieldset>

</div>
 
<script>
//Demo
layui.use('form', function(){
  var form = layui.form;
  
  //监听提交
  form.on('submit(formDemo)', function(data){
    layer.msg(JSON.stringify(data.field));
    return false;
  });
});

layui.use('layedit', function(){
var layedit = layui.layedit,
$ = layui.jquery;

//上传图片设置
layedit.set
({
uploadImage: 
{
url: "{:url('admin/article/ContentImage')}",//接口url
type: 'post', //默认post
}
});

//构建一个默认的编辑器
var index = layedit.build('LAY_demo1');

layedit.build('LAY_demo1', {
height: 400

})
});
</script>
		



{/block}
