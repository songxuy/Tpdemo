<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
	<title>用户中心</title>
	<script type="text/javascript" src="http://localhost/Application/Home/Public/js/jquery-3.1.1.min.js"></script>
  <script src="http://localhost/Application/Home/Public/js/jquery.slimscroll.min.js"></script> 
  <script type="text/javascript" src="http://localhost/Application/Home/Public/bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="http://localhost/Application/Home/Public/bootstrap/css/bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="http://localhost/Application/Home/Public/css/font-awesome.min.css"/>
</head>
<body>
<style>
* { margin: 0; padding: 0 }
body { font: 14px "微软雅黑", "FontAwesome", "Arial Narrow", HELVETICA; -webkit-text-size-adjust: 100%; }
li { list-style: none }
a { text-decoration: none; }
/* navMenu */
.navMenubox { width: 220px; height: 500px; background: #0186cb; margin: 0 auto; margin-top: 20px; overflow: hidden; }
.navMenu-top { padding: 10px; color: #fff; border-bottom: 1px solid rgba(255,255,255,.1) }
.navMenu> li { display: block; margin: 0; padding: 0; border: 0px; }
.navMenu>li>a { display: block; overflow: hidden; padding-left: 0px; line-height: 40px; color: #fff; transition: all .3s; position: relative; text-decoration: none; font-size: 17px; border-top: 1px solid #fff; border-bottom: 2px solid #fff; }
.navMenu > li:nth-of-type(1)> a { border-top: 1px solid transparent; }
.navMenu > li:last-child > a { border-bottom: 1px solid transparent; }
.navMenu>li>a>i { font-size: 20px; float: left; font-style: normal; margin: 0 5px; }
.navMenu li a .arrow:before { display: block; float: right; margin-top: 1px; margin-right: 15px; display: inline; font-size: 16px; font-family: FontAwesome; height: auto; content: "\f105"; font-weight: 300; text-shadow: none; }
.navMenu li a .arrow.open:before { float: right; margin-top: 1px; margin-right: 15px; display: inline; font-family: FontAwesome; height: auto; font-size: 16px; content: "\f107"; font-weight: 300; text-shadow: none; }
.navMenu>li>a.active, .navMenu>li>a:hover { color: #000; background: #fff; }
.navMenu>li>ul.sub-menu, .navMenu>li>ul.sub-menu>li>ul.sub-menu { display: none; list-style: none; clear: both; margin: 8px 0px 0px 10px; padding-bottom: 5px; }
.navMenu>li.active > ul.sub-menu, .navMenu>li>ul.sub-menu>li.active >ul.sub-menu { }
.navMenu>li>ul.sub-menu li { background: none; margin: 0px; padding: 0px; }
.navMenu>li>ul.sub-menu li>a {text-decoration: none; display: block; font-size: 16px; line-height: 36px; padding-left: 20px; color: #fff; clear: both; }
.navMenu>li>ul.sub-menu li>a.active, .navMenu>li>ul.sub-menu li>a:hover, .navMenu>li>ul.sub-menu>li.active >a { color: #000; background: #fff; }
.icon_1:before { content: "\f0ac"; }
.icon_2:before { content: "\f0ac"; }
.icon_3:before { content: "\f0ac"; }
.ss_nav{
  margin-top:20px;
}
</style>
<body class="container">
<header>
<nav class="navbar navbar-default" style="background-color: #29aae1;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#" style="color:#fff;">甘肃省防雷专业技术人员资格</a>
    </div>
    <div class="navbar-center">
      <a class="navbar-brand" href="#" style="margin-left:200px;color:#fff;">认定管理系统</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" style="color:#fff;">退出登录</a>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header>
<p>XXX，欢迎您，上次登录时间：XXXX年XX月XX日</p>
<div class="row">
  <div class="container">
  <div class="col-sm-3 s_nav">
    <div class="navMenubox">
      <div id="slimtest1">
        <div class="navMenu-top">
          <div id="mini" style=""><i class="fa fa-bars fa-2x"></i></div>
        </div>
        <ul class="navMenu">
          <li> <a href="javascript:;" class="afinve"> <i class="icon_1"></i> <span class="">通知公告</span></a></li>
          <li > <a href="javascript:;" class="afinve"> <i class="icon_2"></i> <span class="nav-text">个人信息</span> <span class="arrow"></span> </a>
            <ul class="sub-menu">
              <li><a href="javascript:;" ><span>个人资料</span></a></li>
              <li><a href="javascript:;"><span>合格证</span></a></li>
              <li><a href="javascript:;"><span>修改密码</span></a></li>
            </ul>
          </li>
          <li > <a href="javascript:;" class="afinve"><i class="my-icon nav-icon icon_2"></i><span>审核状态</span></a> </li>
          <li > <a href="javascript:;" class="afinve"> <i class="icon_3"></i> <span class="nav-text">准考证打印</span> </a></li>
          <li > <a href="javascript:;" class="afinve"> <i class="icon_3"></i> <span class="nav-text">考试结果</span></a> </li>
        </ul>
      </div>
    </div>
  </div>
  <!--默认显示部分-->
  <div class="ss_nav col-sm-9">
  <div class="div1">
   <!--报名部分-->
   <div class="baoming col-sm-12">
    <p class="alert alert-success">报名<span class="glyphicon glyphicon-menu-right"></span></p>
    <table class="table">
      <tr class="info">
        <td>考试时间</td>
        <td>考试科目</td>
        <td>我要报名</td>
      </tr>
      <tr class="primary">
        <td>xx</td>
        <td>xxxx</td>
        <td><button class="btn btn-primary bn" type="button" >报名</button></td>
      </tr>
      <tr class="primary">
        <td>xx</td>
        <td>xxxx</td>
        <td><button class="btn btn-primary bn" type="button" >报名</button></td>
      </tr>
    </table>
  </div>
   <!--审核部分-->
   <div class="shenhe col-sm-12">
    <p class="alert alert-success">审核<span class="glyphicon glyphicon-menu-right"></span></p>
    <table class="table">
      <tr class="info">
        <td>考试时间</td>
        <td>考试科目</td>
        <td>审核状态</td>
        <td>审核不过原因</td>
      </tr>
      <tr class="primary">
        <td>xx</td>
        <td>xxxx</td>
        <td>待审核</td>
        <td></td>
      </tr>
      <tr class="primary">
        <td>xx</td>
        <td>xxxx</td>
        <td class="text-danger">审核不通过</td>
        <td>材料不全</td>
      </tr>
    </table>
  </div>
  <!--准考证部分-->
  <div class="zhuikz col-sm-12">
    <p class="alert alert-info">准考证<span class="glyphicon glyphicon-menu-right"></span></p>
    <table class="table">
      <tr class="info">
        <td>考试时间</td>
        <td>考试科目</td>
        <td>考试地点</td>
        <td>座次</td>
        <td>打印准考证</td>
      </tr>
      <tr class="primary">
        <td>xx</td>
        <td>xxxx</td>
        <td>xx</td>
        <td>xx</td>
        <td><button class="btn btn-primary" type="button" >打印</button></td>
      </tr>
      <tr class="primary">
        <td>xx</td>
        <td>xxxx</td>
        <td>xxx</td>
        <td>xxx</td>
        <td><button class="btn btn-primary" type="button" >打印</button></td>
      </tr>
    </table>
  </div>
  <!--考试结果部分-->
  <div class="result col-sm-12">
    <p class="alert alert-danger">考试结果<span class="glyphicon glyphicon-menu-right"></span></p>
    <table class="table">
      <tr class="info">
        <td>考试时间</td>
        <td>考试科目</td>
        <td>准考证号</td>
        <td>考试结果</td>
      </tr>
      <tr class="primary">
        <td>xx</td>
        <td>xxxx</td>
        <td>xxx</td>
        <td>合格</td>
      </tr>
      <tr class="primary">
        <td>xx</td>
        <td>xxxx</td>
        <td>xxx</td>
        <td>不合格</td>
      </tr>
    </table>
  </div>
  <!--上传报名内容部分-->
  <div class="content col-sm-12">
    <p>请注意:每个附件以图片形式上传,图片格式为JPEG,大小不超过200K;带*的为必填项;报名审核通过以后,资料不允许修改或删除</p>
    <table class="table">
      <tr class="info">
        <td></td>
        <td>资料名称</td>
        <td>上传</td>
        <td>状态</td>
        <td>查看</td>
        <td>删除</td>
      </tr>
      <tr class="primary">
        <td>*</td>
        <td>个人身份证（正反面）</td>
        <td><button class="btn btn-primary" type="button" >上传</button></td>
        <td>已上传</td>
        <td><button class="btn btn-primary" type="button" >查看</button></td>
        <td><button class="btn btn-primary" type="button" >删除</button></td>
      </tr>
      <tr class="primary">
        <td>*</td>
        <td>甘肃省防雷专业资格申请表</td>
        <td><button class="btn btn-primary" type="button" >上传</button></td>
        <td>已上传</td>
        <td><button class="btn btn-primary" type="button" >查看</button></td>
        <td><button class="btn btn-primary" type="button" >删除</button></td>
      </tr>
      <tr class="primary">
        <td>*</td>
        <td>近期正面免冠白底彩照</td>
        <td><button class="btn btn-primary" type="button" >上传</button></td>
        <td>已上传</td>
        <td><button class="btn btn-primary" type="button" >查看</button></td>
        <td><button class="btn btn-primary" type="button" >删除</button></td>
      </tr>
    </table>
  </div>
  </div>
  <div class="div2">
  <!--个人资料部分-->
  <div class="info col-sm-12">
    <p class="alert alert-info">个人资料<span class="glyphicon glyphicon-menu-right"></span></p>
    <form action="#" class="form-horizontal" role="form" id="register-form">
      <div class="form-group">
        <label for="name" class="col-sm-2  control-label">用户名 :</label>
        <div class="col-sm-10  input-parent">
          <input type="text" class="form-control vinput" id="name" name="name" disabled="true">
          <span></span>
        </div>
      </div>
      <div class="form-group">
        <label for="username" class="col-sm-2  control-label">姓 &nbsp;&nbsp;&nbsp;&nbsp; 名 :</label>
        <div class="col-sm-10  input-parent">
          <input type="text" class="form-control vinput" id="username" name="username"  disabled="true">
          <span></span>
        </div>
      </div>
      <div class="form-group">
        <label for="sex" class="col-sm-2  control-label">性 &nbsp;&nbsp;&nbsp;&nbsp; 别 :</label>
        <div class="col-sm-10 ">
          <div class="form-control vinput">
          &nbsp;男&nbsp;<input type="radio" class=" " id="sex" name="sex" disabled="true"/>
          &nbsp;女&nbsp;<input type="radio" class="" id="sex" name="sex" disabled="true"/>
          </div>
          <span></span>
        </div>
      </div>
      <div class="form-group">
        <label for="birthday" class="col-sm-2  control-label">出生日期 :</label>
        <div class="col-sm-10  input-parent">
          <input type="text" class="form-control vinput" id="birthday" name="birthday" placeholder="请选择出生日期" readonly>
          <span></span>
        </div>
      </div>
      <div class="form-group">
        <label for="card" class="col-sm-2  control-label">身份证号 :</label>
        <div class="col-sm-10  input-parent">
          <input type="text" class="form-control vinput" id="card" name="card" disabled="true">    
          <span></span>
        </div>
      </div>
       <div class="form-group">
        <label for="health" class="col-sm-2  control-label">健康状况 :</label>
        <div class="col-sm-10 input-parent">
          <div class="form-control vinput">
          &nbsp;是&nbsp;<input type="radio" class=" " id="health" name="health" />
          &nbsp;否&nbsp;<input type="radio" class="" id="health" name="health" />
          </div>
          <span></span>
        </div>
      </div>
      <div class="form-group">
        <label for="position" class="col-sm-2  control-label">职 &nbsp;&nbsp;&nbsp;&nbsp; 称 :</label>
        <div class="col-sm-10 input-parent">
          <select class="form-control vinput">
          <option value="研究员">研究员</option>
          <option value="高级工程师">高级工程师</option>
          <option value="工程师">工程师</option>
          <option value="助理工程师">助理工程师</option>
          <option value="技术员">技术员</option>
          <option value="无职称">无职称</option>
          </select>
          <span></span>
        </div>
      </div>
      <div class="form-group">
        <label for="from" class="col-sm-2  control-label">毕业院校 :</label>
        <div class="col-sm-10  input-parent">
          <input type="text" class="form-control vinput" id="from" name="from" placeholder="请输入毕业院校">    
          <span></span>
        </div>
      </div>
      <div class="form-group">
        <label for="position" class="col-sm-2  control-label">所学专业 :</label>
        <div class="col-sm-10 input-parent">
          <select class="form-control vinput">
          <option value="防雷">防雷</option>
          <option value="建筑">建筑</option>
          <option value="电子">电子</option>
          <option value="电气">电气</option>
          <option value="气象">气象</option>
          <option value="通信">通信</option>
          <option value="电力">电力</option>
          <option value="计算机">计算机</option>
          <option value="非相关专业">非相关专业</option>
          </select>
          <span></span>
        </div>
      </div>
       <div class="form-group">
        <label for="position" class="col-sm-2  control-label">学 &nbsp;&nbsp;&nbsp;&nbsp; 历 :</label>
        <div class="col-sm-10 input-parent">
          <select class="form-control vinput">
          <option value="防雷">硕士研究生以上</option>
          <option value="建筑">本科</option>
          <option value="电子">大专</option>
          <option value="电气">中专</option>
          <option value="气象">中专以下</option>
          </select>
          <span></span>
        </div>
      </div>
      <div class="form-group">
        <label for="graduate" class="col-sm-2  control-label">毕业年份 :</label>
        <div class="col-sm-10  input-parent">
          <input type="text" class="form-control vinput" id="graduate" name="graduate" placeholder="请输入毕业年份" readonly>
          <span></span>
        </div>
      </div>
      <div class="form-group">
        <label for="workplace" class="col-sm-2  control-label">工作单位 :</label>
        <div class="col-sm-10  input-parent">
          <input type="text" class="form-control vinput" id="workplace" name="workplace" placeholder="请输入工作单位">    
          <span></span>
        </div>
      </div>
      <div class="form-group">
        <label for="phone" class="col-sm-2  control-label">手 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 机 :</label>
        <div class="col-sm-10  input-parent">
          <input type="text" class="form-control vinput" id="phone" name="telephone" placeholder="请输入手机号">    
          <span></span>
        </div>
      </div>
      <div class="form-group ">
        <label for="email" class="col-sm-2  control-label">邮 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 箱 :</label>
        <div class="col-sm-10 input-parent">
          <input type="text" class="form-control vinput" id="email" name="email" placeholder="请输入邮箱"/>       
          <span></span>
        </div>
      </div>
      <div class="form-group ">
        <label for="adress" class="col-sm-2  control-label">通信地址 :</label>
        <div class="col-sm-10 input-parent">
          <input type="text" class="form-control vinput" id="adress" name="adress" placeholder="请输入通信地址"/>       
          <span></span>
        </div>
      </div>
      <div class="form-group" style="float:right;">
        <div class="col-sm-12 input-parent">
            <button type="submit" class="btn btn-primary">提交</button>
            <button type="reset" class="btn btn-default">取消</button>
        </div>
      </div>
    </form>
  </div>
  <!--合格证部分-->
   <div class="hgcard col-sm-12">
    <p class="alert alert-warning">合格证查看<span class="glyphicon glyphicon-menu-right"></span></p>
    <ul class="list-group">
    <li href="#" class="list-group-item disabled">
      姓名：
      <span class="badge">nihao</span>
    </li>
    <li href="#" class="list-group-item">性别： <span class="badge">男</span></li>
    <li href="#" class="list-group-item">考试科目： <span class="badge">防雷装置检测</span></li>
    <li href="#" class="list-group-item">考试日期：<span class="badge">xxxx-xx-xx</span></li>
    <li href="#" class="list-group-item">考试成绩：<span class="badge">xx</span></li>
    <li href="#" class="list-group-item">签发日期：<span class="badge">xxxx-xx-xx</span></li>
    <li href="#" class="list-group-item">电子印章：</li>
    <li href="#" class="list-group-item list-group-item-danger">审验及延续提醒：<span class="badge">xx</span></li>
    </ul>
  </div>
  <!--密码修改部分-->
  <div class="hgcard col-sm-12">
    <p class="alert alert-danger">密码修改<span class="glyphicon glyphicon-menu-right"></span></p>
    <form class="form-horizontal" >
    <div class="form-group ">
        <label for="password" class="col-sm-2  control-label">密 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 码 :</label>
        <div class="col-sm-10  input-parent">
          <input type="password" class="form-control vinput" id="password" name="password" placeholder="请输入密码"/>
          <i class="glyphicon glyphicon-eye-close form-control-feedback" id="toogle-password"></i>
          <span></span>
        </div>
      </div>
      <div class="form-group">
        <label for="notpass" class="col-sm-2  control-label">确认密码 :</label>
        <div class="col-sm-10  input-parent">
          <input type="password" class="form-control vinput" id="notpass" name="notpass" placeholder="请再次输入密码"/>
          <i class="glyphicon glyphicon-eye-close form-control-feedback" id="toggle-notpass"></i>
          <span></span>
        </div>
      </div>
      <div class="form-group" style="float:right;">
        <div class="col-sm-12 input-parent">
            <button type="submit" class="btn btn-primary">提交</button>
            <button type="reset" class="btn btn-default">取消</button>
        </div>
      </div>
    </form>
    </div><!--密码修改-->
   </div><!--div2-->
   </div><!--ss_nav-->
 </div>
</div>
<footer>
  <nav class="navbar-default text-center">
      Copyright xxx Gan su Meteorological Society<br>
      甘肃省气象学会 &copy;版权所有
  </nav>
</footer>
</body>
</html>
<script>
  $(function(){
    $('.navMenu>li a').eq(0).addClass("active");
    $('.ss_nav .div2>div').hide()
    $('.ss_nav .div1 div').eq(0).show().siblings().hide();
    $('.navMenu>li').click(function(){
      var oo=$(this).index();
      if(oo==0){
        $('.ss_nav .div1 div').eq(oo).show().siblings().hide();
        $('.ss_nav .div2>div').hide()
      }else if(oo>1){
        $('.ss_nav .div1 div').eq(oo-1).show().siblings().hide();
        $('.ss_nav .div2 div').hide()
      }
    })
    $('.navMenu .sub-menu>li').click(function(){
      var oo2=$(this).index();
      $('.ss_nav .div1 div').hide();
      $('.ss_nav .div2>div').eq(oo2).show().siblings().hide();
      $('.ss_nav .div2>div').eq(oo2).find('div').show()
    })
   $('.navMenu li a').on('click',function(){
       var parent = $(this).parent().parent();//获取当前页签的父级的父级
       var labeul =$(this).parent("li").find(">ul")  
             if ($(this).parent().hasClass('open') == false) {
                //展开未展开
           parent.find('ul').slideUp(300);
           parent.find("li").removeClass("open")
           parent.find('li a').removeClass("active").find(".arrow").removeClass("open")
                  $(this).parent("li").addClass("open").find(labeul).slideDown(300);
          $(this).addClass("active").find(".arrow").addClass("open")
            }else{
         $(this).parent("li").removeClass("open").find(labeul).slideUp(300);
          if($(this).parent().find("ul").length>0){
          $(this).removeClass("active").find(".arrow").removeClass("open")
          }else{
          $(this).addClass("active") 
          }
            }
      
    });
  })
</script>