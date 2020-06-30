{extend name="index/index"}
{block name="content"}

<div  class="layui-body" style="padding: 20px;">

	<!--面包屑-->
	<blockquote class="layui-elem-quote layui-quote-nm">
		<span class="layui-breadcrumb" lay-separator="|">
		  <a href="{:url('admin/index/index')}">系统</a>
		  <a href="{:url('cate/listcate')}">栏目管理</a>
		  <a href="#"><cite>栏目修改</cite></a>
		</span>
	</blockquote>
		
	
	<fieldset class="layui-elem-field layui-field-title"> 
	<legend>栏目修改</legend>	
	<div style="padding-top:10px;">
		<form class="layui-form layui-form-pane" action="{:url('cate/edit',array('id'=>$edit.id))}" method="post">
			
			<div class="layui-col-xs4 layui-col-sm4 layui-col-md4">

				<div class="layui-form-item">
				<label class="layui-form-label">上级栏目</label>
				<div class="layui-input-block">
				<select name="cate_pid">
				<option value="0">顶级栏目</option>
					{volist name="list" id="data"}
					<option {if condition = "$data.id eq $edit.cate_pid"} selected="selected" {/if} value="{$data.id}">{if condition = "$data['level'] neq 0"}|{/if}<?php echo str_repeat('--',$data['level']*3) ?>{$data.cate_name}</option>
					{/volist}
				</select>
				</div>
				</div>

				<div class="layui-form-item">
				<label class="layui-form-label">栏目名称</label>
				<div class="layui-input-block">
				<input type="text" name="cate_name" required placeholder="请输入栏目名称" value="{$edit.cate_name}" autocomplete="off" class="layui-input">
				</div>
				</div>

				<div class="layui-form-item" pane="">
				<label class="layui-form-label">栏目类型</label>
				<div class="layui-input-block">
				<input type="radio" name="cate_type" value="1" title="列表" {if condition = "$edit['cate_type'] eq 1"} checked {/if}>
				<input type="radio" name="cate_type" value="2" title="单页" {if condition = "$edit['cate_type'] eq 2"} checked {/if}>
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
