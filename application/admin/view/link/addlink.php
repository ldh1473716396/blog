{extend name="index/index"}
{block name="content"}

<div  class="layui-body" style="padding: 20px;">

	<!--面包屑-->
	<blockquote class="layui-elem-quote layui-quote-nm">
		<span class="layui-breadcrumb" lay-separator="|">
		  <a href="{:url('admin/index/index')}">系统</a>
		  <a href="{:url('link/listlink')}">链接列表</a>
		  <a href="{:url('link/addlink')}"><cite>链接添加</cite></a>
		</span>
	</blockquote>
		
	
	<fieldset class="layui-elem-field layui-field-title">
	<legend>链接添加</legend>	
	<div style="padding-top:10px;">
		<form class="layui-form layui-form-pane" action="{:url('link/add')}" method="post">

			<div class="layui-col-xs8 layui-col-sm8 layui-col-md8">

				<div class="layui-form-item">
			    <label class="layui-form-label">标题</label>
			    <div class="layui-input-block">
			    <input type="text" name="link_title" required="" lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
			    </div>
			    </div>

			    <div class="layui-form-item">
			    <label class="layui-form-label">网址</label>
			    <div class="layui-input-block">
			    <input type="text" name="link_url" required="" lay-verify="required" placeholder="请输入网址" autocomplete="off" class="layui-input">
			    </div>
			    </div>

			    <div class="layui-form-item layui-form-text">
			    <label class="layui-form-label">描述</label>
			    <div class="layui-input-block">
			    <textarea type="text" name="link_describe" required="" lay-verify="required" placeholder="请输入内容" class="layui-textarea"  ></textarea>
			    </div>
			    </div>

				<div class="layui-form-item">
				<div class="layui-input-block">
				<div class="layui-layout-left">			
			  	<button type="submit" class="layui-btn">立即提交</button>	      		
				<button type="reset" class="layui-btn layui-btn-primary">重置</button>
				</div>
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
