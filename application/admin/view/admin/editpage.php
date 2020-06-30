{extend name="index/index"}
{block name="content"}

<div  class="layui-body" style="padding: 20px;">

	<!--面包屑-->
	<blockquote class="layui-elem-quote layui-quote-nm">
		<span class="layui-breadcrumb" lay-separator="|">
		  <a href="{:url('admin/index/index')}">系统</a>
		  <a href="{:url('admin/admin/homepage')}">管理员</a>
		  <a href="#"><cite>管理员修改</cite></a>
		</span>
	</blockquote>
		
	
	<fieldset class="layui-elem-field layui-field-title">
	<legend>管理员修改</legend>	
	<div style="padding-top:10px;">
		<div class="layui-col-xs6 layui-col-sm6 layui-col-md6">
		<form class="layui-form layui-form-pane" action="{:url('admin/admin/edit',array('id'=>$data.id))}" method="post">

			<div class="layui-form-item">
			<label class="layui-form-label">所属用户组</label>
			<div class="layui-input-inline">
			<select name="group_id" lay-verify="required" required>
			{volist name="group" id="groupData"}
			{if $groupData.status=='1'}
			<option value="{$groupData.id}" {if $groupData.id == $access.group_id} selected="selected" {/if}>{$groupData.title}</option>
			{/if}
			{/volist}				
			</select>
			</div>
			</div>


			<div class="layui-form-item">
			<label class="layui-form-label">名称</label>
			<div class="layui-input-block">
			<input type="text" name="admin_name" value="{$data.admin_name}" placeholder="不填写则为无更改" autocomplete="off" class="layui-input">
			</div>
			</div>

			<div class="layui-form-item">
			<label class="layui-form-label">密码</label>
			<div class="layui-input-block">
			<input type="password" name="admin_password" placeholder="不填写则为无更改" autocomplete="off" class="layui-input">
			</div>
			</div>

			<div class="layui-form-item">
			<div class="layui-input-block">			
		  	<button type="submit" class="layui-btn">立即提交</button>	      		
			<button type="reset" class="layui-btn layui-btn-primary">重置</button>
			</div>		
			</div>

		</form>
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
