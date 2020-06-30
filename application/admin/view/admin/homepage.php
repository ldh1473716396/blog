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
		  <a href="{:url('admin/admin/homepage')}">管理员</a>
		  <a href="{:url('admin/admin/homepage')}"><cite>管理员列表</cite></a>
		</span>
	</blockquote>

	<fieldset class="layui-elem-field">
	<legend>管理员列表</legend>
	<div class="layui-field-box">
		<a href="{:url('admin/admin/addpage')}" class="layui-btn layui-btn-sm">
			<i class="layui-icon layui-icon-add-circle-fine"></i>
			添加
		</a>

		<!--表格-->
		<table class="layui-table">

		  <colgroup>
		    <col width="10%">
		    <col width="28%">
		    <col width="28%">
		    <col width="34%">
		  </colgroup>

		  <thead>
		    <tr>
		      <th style="text-align:center;">ID</th>
		      <th style="text-align:center;">管理员名称</th>
		      <th style="text-align:center;">所属用户组</th>
		      <th style="text-align:center;">操作</th>
		    </tr> 
		  </thead>

		  {volist name="list" id="data"}
		  <tbody>
		    <tr>
		      <td style="text-align:center;">{$data.id}</td>
		      <td style="text-align:center;">{$data.admin_name}</td>

		      <td style="text-align:center;">
		      		{$data.group_title}
		      </td>

		      <td style="text-align:center;">
		      	<a href="{:url('admin/admin/editpage',array('id'=>$data.id))}" class="layui-btn layui-btn-normal layui-btn-sm">
		      		<i class="layui-icon layui-icon-edit"></i>
		      		编辑
		      	</a>

		      	<a href="{:url('admin/admin/del',array('id'=>$data.id))}" onClick="return confirm('确认删除吗？')" class="layui-btn layui-btn-danger layui-btn-sm">
		      		<i class="layui-icon layui-icon-delete"></i>
		      		删除
		      	</a>
		      </td>
		    </tr>
		  </tbody>
		  {/volist}

		</table>
		

		<!--分页-->
		<div class ="pagination">
			{$list|raw}
		</div>

	</div>
	</fieldset>


</div>




{/block}
