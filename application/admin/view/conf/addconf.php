{extend name="index/index"}
{block name="content"}


<div  class="layui-body" style="padding: 20px;">

	<!--面包屑-->
	<blockquote class="layui-elem-quote layui-quote-nm">
		<span class="layui-breadcrumb" lay-separator="|">
		  <a href="{:url('admin/index/index')}">系统</a>
		  <a href="{:url('conf/homeconf')}">系统配置</a>
		  <a href="{:url('conf/addconf')}"><cite>配置添加</cite></a>
		</span>
	</blockquote>

	<fieldset class="layui-elem-field layui-field-title">
	<legend>配置添加</legend>	
	<div style="padding-top:10px;">
		<form class="layui-form layui-form-pane" action="{:url('conf/add')}" method="post">

			<div class="layui-col-xs8 layui-col-sm8 layui-col-md8">

				<div class="layui-form-item">
				<label class="layui-form-label">中文名称</label>
				<div class="layui-input-block">
				<input type="text" name="conf_chs_name" required  lay-verify="required" placeholder="请输入中文名称" autocomplete="off" class="layui-input">
				</div>
				</div>

				<div class="layui-form-item">
				<label class="layui-form-label">英文名称</label>
				<div class="layui-input-block">
				<input type="text" name="conf_en_name" required lay-verify="required" placeholder="请输入英文名称" autocomplete="off" class="layui-input">
				</div>
				</div>

				<div class="layui-form-item">
				<label class="layui-form-label">配置类型</label>
				<div class="layui-input-inline">
				<select name="conf_type" lay-verify="required">
					<option value=""></option>
					<option value="1">输入框</option>
					<option value="2">下拉选择框</option>
					<option value="3">开关</option>
					<option value="4">单选框</option>
					<option value="5">复选框</option>
					<option value="6">文本域</option>					
				</select>
				</div>
				</div>

				<div class="layui-form-item layui-form-text">
			    <label class="layui-form-label">可选值</label>
			    <div class="layui-input-block">
			    <textarea type="text" name="conf_values" placeholder="请用“ / ”符号隔开，否则无效" class="layui-textarea"></textarea>
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