
<div class="layui-side" style="background-color: #393D49;">
  <div class="layui-side-scroll">

    <ul class="layui-nav layui-nav-tree" lay-filter="test" style="background-color: #393D49;">

      <li class="layui-nav-item">
        <a href="{:url('admin/admin/homepage')}">
          <i class="layui-icon layui-icon-user"></i>
          管理员
          <i class="layui-icon layui-icon-right layui-layout-right" style="margin-right: 8px"></i>          
        </a>
      </li>

      <li class="layui-nav-item">
        <a href="{:url('cate/listcate')}">
          <i class="layui-icon layui-icon-theme"></i>
          栏目管理
          <i class="layui-icon layui-icon-right layui-layout-right" style="margin-right: 8px"></i>          
        </a>
      </li>

      <li class="layui-nav-item">
        <a href="{:url('article/listarticle')}">
          <i class="layui-icon layui-icon-read"></i>
          文章管理
          <i class="layui-icon layui-icon-right layui-layout-right" style="margin-right: 8px"></i>           
        </a>
      </li>

      <li class="layui-nav-item">
        <a href="{:url('link/listlink')}">
          <i class="layui-icon layui-icon-link"></i>
          链接管理
          <i class="layui-icon layui-icon-right layui-layout-right" style="margin-right: 8px"></i>           
        </a>
      </li>

      <li class="layui-nav-item">
        <a href="#">
          <i class="layui-icon layui-icon-set"></i>
          配置管理          
        </a>
      	<dl class="layui-nav-child">
      	<dd>
      	<a href="{:url('conf/homeconf')}">
      	<i class="layui-icon layui-icon-align-left"></i>
      	配置项
      	<i class="layui-icon layui-icon-right layui-layout-right" style="margin-right: 8px"></i>
      	</a>
      	</dd>
      	<dd>
      	<a href="{:url('conf/listconf')}">
      	<i class="layui-icon layui-icon-list"></i>
      	配置列表
      	<i class="layui-icon layui-icon-right layui-layout-right" style="margin-right: 8px"></i>
      	</a>
      	</dd>
      	</dl>
      </li>

      <li class="layui-nav-item">
        <a href="#">
          <i class="layui-icon layui-icon-auz"></i>
          权限管理         
        </a>
  		  <dl class="layui-nav-child">
        <dd>
        <a href="{:url('auth_group/listgroup')}">
        <i class="layui-icon layui-icon-group"></i>
        用户组列表
        <i class="layui-icon layui-icon-right layui-layout-right" style="margin-right: 8px"></i>
        </a>
        </dd>
        <dd>
        <a href="{:url('auth_rule/listrule')}">
        <i class="layui-icon layui-icon-tabs"></i>
        权限列表
        <i class="layui-icon layui-icon-right layui-layout-right" style="margin-right: 8px"></i>
        </a>
        </dd>
        </dl>
      </li>
  

    </ul>

  </div>
</div>