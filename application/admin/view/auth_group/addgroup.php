{extend name="index/index"}
{block name="content"}

<div  class="layui-body" style="padding: 20px;">

	<!--面包屑-->
	<blockquote class="layui-elem-quote layui-quote-nm">
		<span class="layui-breadcrumb" lay-separator="|">
		  <a href="{:url('admin/index/index')}">系统</a>
		  <a href="{:url('auth_group/listgroup')}"><cite>用户组列表</cite></a>
		  <a href="{:url('auth_group/addgroup')}"><cite>用户组添加</cite></a>
		</span>
	</blockquote>
		
	
	<fieldset class="layui-elem-field layui-field-title">
	<legend>用户组添加</legend>	
	<div style="padding-top:10px;">
		<form class="layui-form layui-form-pane" action="{:url('auth_group/add')}" method="post">
		<div class="layui-col-xs8 layui-col-sm8 layui-col-md8">

			<div class="layui-form-item">
		    <label class="layui-form-label">用户组名称</label>
		    <div class="layui-input-block">
		    <input type="text" name="title" required lay-verify="required" placeholder="请输入用户组名称" autocomplete="off" class="layui-input">
		    </div>
		    </div>

		    <div class="layui-form-item" pane>
		    <label class="layui-form-label">启用状态</label>
		    <div class="layui-input-block">
		    <input type="checkbox" name="status" value="1" lay-skin="switch" lay-text="ON|OFF" checked>
		    </div>
		    </div>
			
			<fieldset class="layui-elem-field layui-field-title">
			<legend>配置权限</legend>
			<div style="padding-top:10px;">
				{volist name="onelevel" id="data"}			
				<div class="layui-form-item"pane>	    					
				<label class="layui-form-label">{$data['title']}</label>
				</label>
				<div class="layui-input-block">
				<?php $sub=db('auth_rule')->where('pid',$data['id'])->order('sort','asc')->select(); ?>
				<?php  if($sub): ?>
				<?php foreach ($sub as $k => $v):?>
				<input type="checkbox" name="{$data['id']}[{$v['id']}]" title="{$v['title']}" value="{$v['id']}" >
				<?php endforeach;?>
				<?php else:?>
				<input type="checkbox" name="{$data['id']}[{$data['id']}]" title="{$data['title']}" value="{$data['id']}"/>
				<?php endif; ?>				
				</div>				
				</div>		
		    	{/volist}
			</div>
		    </fieldset>

			<div class="layui-form-item" >
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
