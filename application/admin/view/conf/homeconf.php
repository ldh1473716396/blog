{extend name="index/index"}
{block name="content"}


<div  class="layui-body" style="padding: 20px;">

	<!--面包屑-->
	<blockquote class="layui-elem-quote layui-quote-nm">
		<span class="layui-breadcrumb" lay-separator="|">
		  <a href="{:url('admin/index/index')}">系统</a>
		  <a href="{:url('conf/homeconf')}">系统配置</a>
		  <a href="{:url('conf/homeconf')}"><cite>配置项</cite></a>
		</span>
	</blockquote>

	<fieldset class="layui-elem-field">
	<legend>网站配置</legend>	
	<div style="padding-top:10px;">
	<div class="layui-field-box">
		<form class="layui-form layui-form-pane" action="{:url('conf/home')}" method="post">
		<div class="layui-col-xs10 layui-col-sm10 layui-col-md10">

			{volist name="home" id="data"}
			<div class="layui-form-item {if $data.conf_type==6}layui-form-text{/if}" {if $data.conf_type==3||$data.conf_type==4||$data.conf_type==5}pane{/if}>
			<label class="layui-form-label">{$data.conf_chs_name}</label>
			<div class="{if $data.conf_type==2} layui-input-inline {else} layui-input-block {/if}">

				<!--输入框-->
				{if $data.conf_type==1}
				<input type="text" name="{$data.conf_en_name}" value="{$data.conf_value}"  lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
				{/if}
	
				<!--下拉选择框-->
				<?php if($data['conf_type']==2 && strstr($data['conf_values'],'/')):$conf_values = explode('/', $data['conf_values']);?>
					<select name="{$data.conf_en_name}" lay-verify="required">
						<?php foreach($conf_values as $k2 => $v2): ?>					
						<option {if $v2==$data.conf_value}selected="selected"{/if}>{$v2}</option>
						<?php endforeach; ?>
				    </select>
			    	<?php elseif($data['conf_type']==2): ?>
			    	<select name="{$data.conf_en_name}">					
						<option disabled>无效</option>
				    </select>
				<?php endif; ?>

				<!--开关-->
				<?php if($data['conf_type']==3 && strstr($data['conf_values'],'/')):$conf_values = explode('/', $data['conf_values']);?>
				<input type="checkbox" name="{$data.conf_en_name}" lay-skin="switch" lay-text="{$conf_values[0]}|{$conf_values[1]}" {if condition="$data['conf_value'] eq 'on'"}checked{/if}>
			    	<?php elseif($data['conf_type']==3): ?>
			    	<input type="checkbox" name="{$data.conf_en_name}" lay-skin="switch" disabled>
				<?php endif; ?>

				<!--单选框-->
				<?php if($data['conf_type']==4 && strstr($data['conf_values'],'/')):$conf_values = explode('/', $data['conf_values']);?>
					<?php foreach($conf_values as $k4 => $v4): ?>					
					<input type="radio" name="{$data.conf_en_name}" value="{$v4}" title="{$v4}" {if $v4==$data.conf_value}checked{/if}>
					<?php endforeach; ?>
					<?php elseif($data['conf_type']==4): ?>
					<input type="radio" name="{$data.conf_en_name}" value="{$v4}" title="无效" disabled>
				<?php endif; ?>

				<!--复选框-->
				<?php if($data['conf_type']==5 && strstr($data['conf_values'],'/')):$conf_values = explode('/', $data['conf_values']);?>
					<?php foreach($conf_values as $k5 => $v5): ?>					
					<input type="checkbox" name="{$data.conf_en_name}[{$v5}]" value="{$v5}" title="{$v5}" {if strstr($data.conf_value,$v5)}checked{/if}>
					<?php endforeach; ?>
					<?php elseif($data['conf_type']==5): ?>
					<input type="checkbox" name="{$data.conf_en_name}[{$v5}]" value="{$v5}" title="无效" disabled>
				<?php endif; ?>

				<!--文本域-->
				{if $data.conf_type==6}
					<textarea type="text" name="{$data.conf_en_name}" placeholder="请输入内容" class="layui-textarea" lay-verify="required">{$data.conf_value}</textarea>
				{/if}

			</div>
			</div>
			{/volist}

			<div class="layui-form-item">
			<button type="submit" class="layui-btn">立即提交</button>
			</div>
		</div>
		</div>
		</form>

	</div>
	</fieldset>

</div>

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
{/block}

