
<div class="layui-header" style="background-color: #393D49;">

  <ul class="layui-nav">
    <li class="layui-nav-item"><a href="{:url('admin/index/index')}"><div style="font-size: 23px; color: #F0F0F0; ">{$webname['conf_value']}管理后台</div></a></li>
    <li class="layui-nav-item layui-layout-right" style="margin-right: 20px;">
    <a href="#">
    <img src="{:url('/uploads/head.jpg')}" class="layui-nav-img">
    {$Request.session.name}
    </a>
    <dl class="layui-nav-child">
    <dd><a href="{:url('admin/login/logout')}">退出登陆</a></dd>
    <dd><a href="{:url('admin/admin/editpage',array('id'=>$Request.session.id))}">修改密码</a></dd>
    </dl>
    </li>
  </ul>

  <!--注意：导航 依赖 element 模块，否则无法进行功能性操作-->
  <script>
  layui.use('element', function(){
  var element = layui.element;
  //…
  });
  </script>
  
</div>


  


 
