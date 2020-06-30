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
		  <a href="{:url('conf/homeconf')}">系统配置</a>
		  <a href="{:url('conf/listconf')}"><cite>配置列表</cite></a>
		</span>
	</blockquote>



	<fieldset class="layui-elem-field">
	<legend>配置列表</legend>
	<div class="layui-field-box">
		<a href="{:url('conf/addconf')}" class="layui-btn layui-btn-sm">
			<i class="layui-icon layui-icon-add-circle-fine"></i>
			添加
		</a>

		<!--表格-->
		<form class="layui-form layui-form-pane" action="{:url('conf/sort')}" method="post">
		<table class="layui-table">

		  <colgroup>
		    <col width="6%">
		    <col width="14%">
		    <col width="20%">
		    <col width="20%">
		    <col width="20%">
		    <col width="20%">
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

		      <th style="text-align:center;">中文名称</th>
		      <th style="text-align:center;">英文名称</th>
		      <th style="text-align:center;">配置类型</th>
		      <th style="text-align:center;">操作</th>
		    </tr> 
		  </thead>

		
		{volist name="list" id="data"}
		  <tbody>
		    <tr>
		      <td style="text-align:center;">{$data.id}</td>

		      <td style="text-align:center;">
		      	<input type="text" name="{$data.id}" value="{$data.conf_sort}" style="text-align:center; width: 40px;">
		      </td>

		      <td style="text-align:center;">{$data.conf_chs_name}</td>
		      <td style="text-align:center;">{$data.conf_en_name}</td>

		      <td style="text-align:center;">
		      	{if $data.conf_type==1}
				输入框
				{elseif $data.conf_type==2}
				下拉选择框
				{elseif $data.conf_type==3}
				开关
				{elseif $data.conf_type==4}
				单选框
				{elseif $data.conf_type==5}
				复选框
				{elseif $data.conf_type==6}
				文本域
				{else}
				其他类型
				{/if}
		      </td>			

		      <td style="text-align:center;">
		      	<a href="{:url('conf/editconf',array('id'=>$data.id))}" class="layui-btn layui-btn-normal layui-btn-sm">
		      		<i class="layui-icon layui-icon-edit"></i>
		      		编辑
		      	</a>

		      	<a href="{:url('conf/delete',array('id'=>$data.id))}" onClick="return confirm('确认删除吗？')" class="layui-btn layui-btn-danger layui-btn-sm">
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
