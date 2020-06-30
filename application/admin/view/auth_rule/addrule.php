{extend name="index/index"}
{block name="content"}

<div  class="layui-body" style="padding: 20px;">

	<!--面包屑-->
	<blockquote class="layui-elem-quote layui-quote-nm">
		<span class="layui-breadcrumb" lay-separator="|">
		  <a href="{:url('admin/index/index')}">系统</a>
		  <a href="{:url('auth_rule/listrule')}"><cite>权限列表</cite></a>
		  <a href="{:url('auth_rule/addrule')}"><cite>权限添加</cite></a>
		</span>
	</blockquote>
		
	
	<fieldset class="layui-elem-field layui-field-title">
	<legend>权限添加</legend>	
	<div style="padding-top:10px;">
		<form class="layui-form layui-form-pane" action="{:url('auth_rule/add')}" method="post">

			<div class="layui-col-xs4 layui-col-sm4 layui-col-md4">

				<div class="layui-form-item">
				<label class="layui-form-label">上级权限</label>
				<div class="layui-input-block">
				<select name="pid">
				<option value="0">顶级权限</option>
				{volist name="add" id="data"}
				<option value="{$data.id}">{if condition = "$data['level'] eq 0"}{$data.title}{/if}</option>
				{/volist}
				</select>
				</div>
				</div>

				<div class="layui-form-item">
			    <label class="layui-form-label">权限名称</label>
			    <div class="layui-input-block">
			    <input type="text" name="title" required lay-verify="required" placeholder="请输入权限名称" autocomplete="off" class="layui-input">
			    </div>
			    </div>

			    <div class="layui-form-item">
			    <label class="layui-form-label">控制器方法</label>
			    <div class="layui-input-block">
			    <input type="text" name="name" required lay-verify="required" placeholder="请输入控制器方法" autocomplete="off" class="layui-input">
			    </div>
			    </div>

				<div class="layui-form-item">
				<div class="layui-input-block">		
			  	<button type="submit" class="layui-btn">立即提交</button>	
				<button type="reset" class="layui-btn layui-btn-primary">重置</button>
				</div>		
				</div>

			</div>

		</form>
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
