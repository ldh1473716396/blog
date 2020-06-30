{extend name="index/index"}
{block name="content"}

<div  class="layui-body" style="padding: 20px;">

	<!--面包屑-->
	<blockquote class="layui-elem-quote layui-quote-nm">
		<span class="layui-breadcrumb" lay-separator="|">
		  <a href="{:url('admin/index/index')}">系统</a>
		  <a href="#">权限管理</a>
		  <a href="{:url('auth_group/listgroup')}"><cite>用户组列表</cite></a>
		</span>
	</blockquote>



	<fieldset class="layui-elem-field">
	<legend>用户组列表</legend>
	<div class="layui-field-box">
		<a href="{:url('auth_group/addgroup')}" class="layui-btn layui-btn-sm">
			<i class="layui-icon layui-icon-add-circle-fine"></i>
			添加
		</a>

		<!--表格-->
		<table class="layui-table">
		
		  <colgroup>
		    <col width="15%">
		    <col width="30%">
		    <col width="20%">
		    <col width="35%">
		  </colgroup>

		  <thead>
		    <tr>
		      <th style="text-align:center;">ID</th>
		      <th style="text-align:center;">用户组名称</th>
		      <th style="text-align:center;">启用状态</th>
		      <th style="text-align:center;">操作</th>
		    </tr> 
		  </thead>

		  {volist name="list" id="data"}
		  <tbody>
		    <tr>

		      <td style="text-align:center;">{$data.id}</td>

		      <td style="text-align:center;">{$data.title}</td>

		      <td style="text-align:center;">
		      	{if $data.status=='1'}
		      	<i class="layui-icon layui-icon-ok-circle" style="font-size: 22px; color: #5FB878;"></i>
		      	{else}
		      	<i class="layui-icon layui-icon-close-fill" style="font-size: 22px; color: #DD0000;"></i>
		      	{/if}
		      </td>

		      <td style="text-align:center;">
		      	<a href="{:url('auth_group/editgroup',array('id'=>$data.id))}" class="layui-btn layui-btn-normal layui-btn-sm">
		      		<i class="layui-icon layui-icon-edit"></i>
		      		编辑
		      	</a>

		      	<a href="{:url('auth_group/delete',array('id'=>$data.id))}" onClick="return confirm('确认删除吗？')" class="layui-btn layui-btn-danger layui-btn-sm">
		      		<i class="layui-icon layui-icon-delete"></i>
		      		删除
		      	</a>
		      </td>
		    </tr>
		  </tbody>
		  {/volist}

		  
		
		</table>



	</div>
	</fieldset>


</div>




{/block}