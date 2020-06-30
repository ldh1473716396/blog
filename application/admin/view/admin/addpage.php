{extend name="index/index"}
{block name="content"}
<script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>
<div  class="layui-body" style="padding: 20px;">

	<!--面包屑-->
	<blockquote class="layui-elem-quote layui-quote-nm">
		<span class="layui-breadcrumb" lay-separator="|">
		  <a href="{:url('admin/index/index')}">系统</a>
		  <a href="{:url('admin/admin/homepage')}">管理员</a>
		  <a href="{:url('admin/admin/addpage')}"><cite>管理员添加</cite></a>
		</span>
	</blockquote>
		
	
	<fieldset class="layui-elem-field layui-field-title">
	<legend>管理员添加</legend>	
	<div style="padding-top:10px;">
		<div class="layui-col-xs6 layui-col-sm6 layui-col-md6">
		<form class="layui-form layui-form-pane" action="{:url('admin/admin/add')}" method="post">

			<div class="layui-form-item">
			<label class="layui-form-label">所属用户组</label>
			<div class="layui-input-inline">
			<select name="group_id" lay-verify="required" required>
			<option value=""></option>
			{volist name="group" id="groupData"}
			{if $groupData.status=='1'}
			<option value="{$groupData.id}">{$groupData.title}</option>
			{/if}
			{/volist}				
			</select>
			</div>
			</div>

			<div class="layui-form-item">
			<label class="layui-form-label">名称</label>
			<div class="layui-input-block">
			<input type="text" name="admin_name" required  lay-verify="required" placeholder="请输入名称" autocomplete="off" class="layui-input">
			</div>
			</div>

			<div class="layui-form-item">
			<label class="layui-form-label">密码</label>
			<div class="layui-input-block">
			<input type="password" name="admin_password" required lay-verify="required" placeholder="请输入密码至少6位" autocomplete="off" class="layui-input">
			</div>
			</div>

			<div class="layui-form-item">
			<div class="layui-input-block">			
		  	<button type="submit" class="layui-btn">立即提交</button>	      		
			<button type="reset" class="layui-btn layui-btn-primary">重置</button>
			</div>		
			</div>
			
		</form>
		 <div  class="inner"></div>
		</div>
	</div>
	</fieldset>
 
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
</script>
		


</div>




{/block}
