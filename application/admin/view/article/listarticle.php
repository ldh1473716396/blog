

{extend name="index/index"}
{block name="content"}

<style>
/*分页*/
.pagination {display: flex;justify-content: center;}
.pagination li {display: inline-block;margin-right: -1px;padding: 5px;border: 1px solid #e2e2e2;min-width: 20px;text-align: center;}
.pagination li.active {background: #009688;color: #fff;border: 1px solid #009688;}
.pagination li a {display: block;text-align: center;}
</style>


<div  class="layui-body" style="padding: 20px;">

	<!--面包屑-->
	<blockquote class="layui-elem-quote layui-quote-nm">
		<span class="layui-breadcrumb" lay-separator="|">
		  <a href="{:url('admin/index/index')}">系统</a>
		  <a href="{:url('article/listarticle')}">文章管理</a>
		  <a href="{:url('article/listarticle')}"><cite>文章列表</cite></a>
		</span>
	</blockquote>



	<fieldset class="layui-elem-field">
	<legend>文章列表</legend>
	<div class="layui-field-box">
		<a href="{:url('article/addarticle')}" class="layui-btn layui-btn-sm">
			<i class="layui-icon layui-icon-add-circle-fine"></i>
			添加
		</a>

		<!--表格-->
		<form class="layui-form layui-form-pane" action="{:url('article/sort')}" method="post">
		<table class="layui-table">
		
		  <colgroup>
			<col width="6%">
			<col width="14%">
			<col width="20%">
			<col width="15%">
			<col width="15%">
			<col width="15%">
			<col width="15%">
		  </colgroup>

		  <thead>
		    <tr>
		      <th style="text-align:center;">ID</th>
		      <th style="text-align:center;">
		      	<button type="submit" class="layui-btn layui-btn layui-btn-sm">
		      		<i class="layui-icon layui-icon-down"></i>
		      		前台排序
		      	</button>
		      </th>
		      <th style="text-align:center;">标题</th>
		      <th style="text-align:center;">作者</th>
		      <th style="text-align:center;">所属栏目</th>
		      <th style="text-align:center;">缩略图</th>
		      <th style="text-align:center;">操作</th>
		    </tr> 
		  </thead>

		  {volist name="list" id="data"}
		  <tbody>
		    <tr>

		      <td style="text-align:center;">{$data.id}</td>

		      <td style="text-align:center;">
		      	<input type="text" name="{$data.id}" value="{$data.article_sort}" style="text-align:center; width: 40px;">
		      	{if condition = "$data['article_banner'] eq '1'"}(轮播){/if}
		      	{if condition = "$data['article_recommend'] eq '1'"}(推荐){/if}
		      </td>

		      <td>
		      	<?php 
	      			echo mb_substr($data['article_title'],0,14,'utf-8'); 
	      			if(strlen($data['article_title'])>strlen(mb_substr($data['article_title'],0,14,'utf-8'))){echo '...';}
		      	?>
		      </td>

		      <td style="text-align:center;">{$data.article_author}</td>

		      <th style="text-align:center;">{$data.cate_name}</th>

		      <td style="text-align:center;">
		      	<img src="{$data.article_thumbnail}" alt="{$data.article_thumbnail}" style="height: 35px;">
		      </td>   

		      <td style="text-align:center;">
		      	<a href="{:url('article/editarticle',array('id'=>$data.id))}" class="layui-btn layui-btn-normal layui-btn-sm">
		      		<i class="layui-icon layui-icon-edit"></i>
		      		编辑
		      	</a>

		      	<a href="{:url('article/delete',array('id'=>$data.id))}" onClick="return confirm('确认删除吗？')" class="layui-btn layui-btn-danger layui-btn-sm">
		      		<i class="layui-icon layui-icon-delete"></i>
		      		删除
		      	</a>
		      </td>

		    </tr>
		  </tbody>
		  {/volist}
		
		</table>
		</form>

		<!--分页-->
		<div id=".pagination">
			{$list|raw}
		</div>


	</div>
	</fieldset>


</div>




{/block}
