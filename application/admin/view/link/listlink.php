

{extend name="index/index"}
{block name="content"}

<style>
	a{ text-decoration:none; color: #4ea1db;}
	a:hover{ text-decoration:underline; color: #ca0c16;}
</style>

<div  class="layui-body" style="padding: 20px;">

	<!--面包屑-->
	<blockquote class="layui-elem-quote layui-quote-nm">
		<span class="layui-breadcrumb" lay-separator="|">
		  <a href="{:url('admin/index/index')}">系统</a>
		  <a href="{:url('link/listlink')}">链接管理</a>
		  <a href="{:url('link/listlink')}"><cite>链接列表</cite></a>
		</span>
	</blockquote>



	<fieldset class="layui-elem-field">
	<legend>链接列表</legend>
	<div class="layui-field-box">
		<a href="{:url('link/addlink')}" class="layui-btn layui-btn-sm">
			<i class="layui-icon layui-icon-add-circle-fine"></i>
			添加
		</a>

		<!--表格-->
		<form class="layui-form layui-form-pane" action="{:url('link/sort')}" method="post">
		<table class="layui-table">
		
		  <colgroup>
		    <col width="8%">
		    <col width="12%">
		    <col width="20%">
		    <col width="25%">
		    <col width="20%">
		    <col width="15%">
		  </colgroup>

		  <thead>
		    <tr>
		      <th style="text-align:center;">ID</th>

		      <th style="text-align:center;">
		      	排序：
		      	<button type="submit" class="layui-btn layui-btn layui-btn-sm">
		      		<i class="layui-icon layui-icon-down"></i>
		      		确认
		      	</button>
		      </th>

		      <th style="text-align:center;">标题</th>
		      <th style="text-align:center;">网址</th>
		      <th style="text-align:center;">描述</th>
		      <th style="text-align:center;">操作</th>
		    </tr> 
		  </thead>

		  {volist name="list" id="data"}
		  <tbody>
		    <tr>

		      <td style="text-align:center;">{$data.id}</td>

		      <td style="text-align:center;">
		      	<input type="text" name="{$data.id}" value="{$data.link_sort}" style="text-align:center; width: 40px;">
		      </td>

		      <td>{$data.link_title}</td>

		      <td>
		      	<a href="{$data.link_url}" target="_blank">
		      		<?php 	
	      			echo mb_substr($data['link_url'],0,45,'utf-8'); 
	      			if(strlen($data['link_url'])>strlen(mb_substr($data['link_url'],0,45,'utf-8'))){echo '...';}
	      			?>
		      	</a>
		      </td>

		      <td>
		      	<?php 	
	      			echo mb_substr($data['link_describe'],0,14,'utf-8'); 
	      			if(strlen($data['link_describe'])>strlen(mb_substr($data['link_describe'],0,14,'utf-8'))){echo '...';}
	      		?>
		      </td>

		      <td style="text-align:center;">
		      	<a href="{:url('link/editlink',array('id'=>$data.id))}" class="layui-btn layui-btn-normal layui-btn-sm">
		      		<i class="layui-icon layui-icon-edit"></i>
		      		编辑
		      	</a>

		      	<a href="{:url('link/delete',array('id'=>$data.id))}" onClick="return confirm('确认删除吗？')" class="layui-btn layui-btn-danger layui-btn-sm">
		      		<i class="layui-icon layui-icon-delete"></i>
		      		删除
		      	</a>
		      </td>
		    </tr>
		  </tbody>
		  {/volist}
		
		</table>
		</form>



	</div>
	</fieldset>


</div>




{/block}