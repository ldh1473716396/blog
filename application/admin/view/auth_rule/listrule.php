{extend name="index/index"}
{block name="content"}


<div  class="layui-body" style="padding: 20px;">

	<!--面包屑-->
	<blockquote class="layui-elem-quote layui-quote-nm">
		<span class="layui-breadcrumb" lay-separator="|">
		  <a href="{:url('admin/index/index')}">系统</a>
		  <a href="#">权限管理</a>
		  <a href="{:url('auth_rule/listrule')}"><cite>权限列表</cite></a>
		</span>
	</blockquote>



	<fieldset class="layui-elem-field">
	<legend>权限列表</legend>
	<div class="layui-field-box">
		<a href="{:url('auth_rule/addrule')}" class="layui-btn layui-btn-sm">
			<i class="layui-icon layui-icon-add-circle-fine"></i>
			添加
		</a>

		<!--表格-->
		<form class="layui-form layui-form-pane" action="{:url('auth_rule/sort')}" method="post">
		<table class="layui-table">
		
		  <colrule>
		    <col width="10%">
		    <col width="15%">
		    <col width="20%">
		    <col width="20%">
		    <col width="15%">
		    <col width="20%">
		  </colrule>

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
		      <th style="text-align:center;">权限名称</th>
		      <th style="text-align:center;">权限控制器方法</th>
		      <th style="text-align:center;">权限级别</th>
		      <th style="text-align:center;">操作</th>
		    </tr> 
		  </thead>

		  {volist name="list" id="data"}
		  <tbody>
		    <tr>

		      <td style="text-align:center;">{$data.id}</td>

		      <td style="text-align:center;">
		      	<input type="text" name="{$data.id}" value="{$data.sort}" style="text-align:center; width: 40px;">
		      </td>

		      <td>
		      	{if condition = "$data['level'] neq 0"}|{/if}
		      	<?php echo str_repeat('--',$data['level']*2) ?>
		      	{$data.title}
		      </td>

		      <td>{$data.name}</td>

		      <td style="text-align:center;">{$data.level+1}级</td>

		      <td style="text-align:center;">
		      	<a href="{:url('auth_rule/editrule',array('id'=>$data.id))}" class="layui-btn layui-btn-normal layui-btn-sm">
		      		<i class="layui-icon layui-icon-edit"></i>
		      		编辑
		      	</a>

		      	<a href="{:url('auth_rule/delete',array('id'=>$data.id))}" onClick="return confirm('确认删除吗？')" class="layui-btn layui-btn-danger layui-btn-sm">
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