<?php

    //公用文件
    require_once('include/common.in.php');

    if (!$_SESSION['ADMIN'] || !preg_match('/^[A-Z]{4,10}$/',$_SESSION['ADMIN'])){

        //提示
        echo '请登录！';

        //页面跳转
        jump('admin/login.php');

        die();

    }

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>layout 后台大布局 - Layui</title>
  <link rel="stylesheet" href="statics/layui/css/layui.css">
  <script src="statics/layui/layui.js"></script>
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
  <div class="layui-header">
    <div class="layui-logo">layui 后台布局</div>
    <!-- 头部区域（可配合layui已有的水平导航） -->
    <ul class="layui-nav layui-layout-left">
      <li class="layui-nav-item"><a href="">控制台</a></li>
      <li class="layui-nav-item"><a href="">商品管理</a></li>
      <li class="layui-nav-item"><a href="">用户</a></li>
      <li class="layui-nav-item">
        <a href="javascript:;">其它系统</a>
        <dl class="layui-nav-child">
          <dd><a href="">邮件管理</a></dd>
          <dd><a href="">消息管理</a></dd>
          <dd><a href="">授权管理</a></dd>
        </dl>
      </li>
    </ul>
    <ul class="layui-nav layui-layout-right">
      <li class="layui-nav-item">
        <a href="javascript:;">
          <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
          <?PHP echo $_SESSION['ADMIN']; ?>
        </a>
        <dl class="layui-nav-child">
          <dd><a href="">基本资料</a></dd>
          <dd><a href="">安全设置</a></dd>
        </dl>
      </li>
      <li class="layui-nav-item"><a href="admin/exit.php">退了</a></li>
    </ul>
  </div>
  
  <div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
      <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
      <ul class="layui-nav layui-nav-tree"  lay-filter="test">
        <li class="layui-nav-item layui-nav-itemed">
          <a class="" href="javascript:;">分类管理</a>
          <dl class="layui-nav-child">
            <dd><a href="javascript:;" id="class1">一级分类</a></dd>
            <dd><a href="javascript:;" id="class2">二级分类</a></dd>
          </dl>
        </li>

        <li class="layui-nav-item layui-nav-itemed">
          <a class="" href="javascript:;">产品管理</a>
          <dl class="layui-nav-child">
            <dd><a href="javascript:;" id="book">图书</a></dd>
            <dd><a href="javascript:;" id="music">音乐</a></dd>
            <dd><a href="javascript:;" id="film">电影</a></dd>
          </dl>
        </li>

        <li class="layui-nav-item layui-nav-itemed">
          <a class="" href="javascript:;">缩略图管理</a>
          <dl class="layui-nav-child">
            <dd><a href="javascript:;">列表</a></dd>
          </dl>
        </li>

        <li class="layui-nav-item">
          <a href="javascript:;">用户管理</a>
          <dl class="layui-nav-child">
            <dd><a href="javascript:;">列表</a></dd>
            <dd><a href="javascript:;">收藏</a></dd>
            <dd><a href="javascript:;">历史</a></dd>
          </dl>
        </li>

        <li class="layui-nav-item">
          <a href="javascript:;">订单管理</a>
          <dl class="layui-nav-child">
            <dd><a href="javascript:;">列表</a></dd>
          </dl>
        </li>

        <li class="layui-nav-item"><a href="">云市场</a></li>
        <li class="layui-nav-item"><a href="">发布商品</a></li>
      </ul>
    </div>
  </div>
  
  <div class="layui-body">
    <!-- 内容主体区域 -->
    <div style="padding: 15px;" id="showBody">内容主体区域</div>
  </div>
  
  <div class="layui-footer">
    <!-- 底部固定区域 -->
    © layui.com - 底部固定区域
  </div>
</div>

<script>
//JavaScript代码区域
layui.use(['element','jquery','layer'], function(){
  var element = layui.element;
  var $ = layui.jquery;
  var layer = layui.layer;

  //一级分类列表
  $("#class1").click(()=>{
    $("#showBody").load('pages/class1_list.php');
  })

  //二级分类列表
  $("#class2").click(()=>{
    $("#showBody").load('pages/class2_list.php');
  })

  //图书列表
  $("#book").click(function(){

    $("#showBody").load('pages/book_list.php');

  })

  
});
</script>
</body>
</html>