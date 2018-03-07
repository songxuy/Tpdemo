<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
	<title>用户中心</title>
	<script type="text/javascript" src="http://localhost/Application/Home/Public/js/jquery-3.1.1.min.js"></script>
  <script src="http://localhost/Application/Home/Public/js/jquery.slimscroll.min.js"></script> 
  <script type="text/javascript" src="http://localhost/Application/Home/Public/bootstrap/js/bootstrap.min.js"></script>
  <script  src="http://localhost/Application/Home/Public/js/jquery-validate.js"></script>
  <script  src="http://localhost/Application/Home/Public/js/user.js"></script>
  <script  src="http://localhost/Application/Home/Public/js/validator.js"></script>
  <script  src="http://localhost/Application/Home/Public/js/index.js"></script>
  <script type="text/javascript" src="http://localhost/Application/Home/Public/js/jquery.my-modal.1.1.js"></script>
  <link href="http://localhost/Application/Home/Public/css/validator.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="http://localhost/Application/Home/Public/bootstrap/css/bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="http://localhost/Application/Home/Public/css/font-awesome.min.css"/>
  <link rel="stylesheet" type="text/css" href="http://localhost/Application/Home/Public/css/jquery.my-modal.1.1.winStyle.css" />
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
      <a class="navbar-brand" href="#" style="color:#fff;">甘肃省防雷装置检测专业技术人员能力评价管理系统</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="../Load/load.html" style="color:#fff;">退出登录</a>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header>
<p><?php echo I('session.username') ?>，欢迎您，上次登录时间：XXXX年XX月XX日</p><p class="text-right text-danger" style="margin-top:-30px;">用户审核状态：审核通过</p>
<!--<div class="m-modal" id="mod1">
      <div class="m-modal-dialog">
        <div class="m-top">
          <h4 class="m-modal-title">
            资料上传
          </h4>
          <span class="m-modal-close">&times;</span>
        </div>
        <div class="m-middle">
        <form action="#" class="form-horizontal">
        <div class="form-group">
        <label for="notpass" class="col-sm-12  control-label text-left">上传电子资料(有一定的像素要求) </label>
        <table class="table table-condensed">
          <tr>
            <td class="info text-center" style="line-height: 60px;">本人1寸近期正面免冠白底彩照</td>
            <td class="text-center" style="line-height: 60px;">文件名格式：姓名+照片</td>
            <td>
              <div id="addCommodityIndex">
                <div class="input-group row">
                    <div class="col-sm-12 big-photo">
                      <div id="preview1">
                            <img id="imghead1" border="0" src="http://localhost/Application/Home/Public/images/photo_icon.png" width="50" height="50"  onclick="$('#previewImg1').click();">
                         </div>         
                        <input type="file" onchange="previewImage(this,1)" style="display: none;" id="previewImg1">
                    </div>
                </div>
                </div>
            </td>
          </tr>
          <tr>
            <td class="info text-center" style="line-height: 60px;">身份证正面扫描件</td>
            <td class="text-center" style="line-height: 60px;">文件名格式：姓名+身份证+正面</td>
            <td>
              <div id="addCommodityIndex2">
                <div class="input-group row">
                    <div class="col-sm-12 big-photo">
                      <div id="preview2">
                            <img id="imghead" border="0" src="http://localhost/Application/Home/Public/images/photo_icon.png" width="50" height="50"  onclick="$('#previewImg2').click();">
                         </div>         
                        <input type="file" onchange="previewImage(this,2)" style="display: none;" id="previewImg2">
                    </div>
                </div>
                </div>
            </td>
          </tr>
          <tr>
            <td class="info text-center" style="line-height: 60px;">身份证背面扫描件</td>
            <td class="text-center" style="line-height: 60px;">文件名格式：姓名+身份证+背面</td>
            <td>
              <div id="addCommodityIndex3">
                <div class="input-group row">
                    <div class="col-sm-12 big-photo">
                      <div id="preview3">
                            <img id="imghead3" border="0" src="http://localhost/Application/Home/Public/images/photo_icon.png" width="50" height="50"  onclick="$('#previewImg3').click();">
                         </div>         
                        <input type="file" onchange="previewImage(this,3)" style="display: none;" id="previewImg3">
                    </div>
                </div>
                </div>
            </td>
          </tr>
          <tr>
            <td class="info text-center" style="line-height: 60px;">毕业证书扫描件</td>
            <td class="text-center" style="line-height: 60px;">文件名格式：姓名+毕业证</td>
            <td>
              <div id="addCommodityIndex4">
                <div class="input-group row">
                    <div class="col-sm-12 big-photo">
                      <div id="preview4">
                            <img id="imghead4" border="0" src="http://localhost/Application/Home/Public/images/photo_icon.png" width="50" height="50"  onclick="$('#previewImg4').click();">
                         </div>         
                        <input type="file" onchange="previewImage(this,4)" style="display: none;" id="previewImg4">
                    </div>
                </div>
                </div>
            </td>
          </tr>
          <tr>
            <td class="info text-center" style="line-height: 60px;">职称证书扫描件</td>
            <td class="text-center" style="line-height: 60px;">文件名格式：职称证书扫描件</td>
            <td>
              <div id="addCommodityIndex5">
                <div class="input-group row">
                    <div class="col-sm-12 big-photo">
                      <div id="preview5">
                            <img id="imghead5" border="0" src="http://localhost/Application/Home/Public/images/photo_icon.png" width="50" height="50"  onclick="$('#previewImg5').click();">
                         </div>         
                        <input type="file" onchange="previewImage(this,5)" style="display: none;" id="previewImg5">
                    </div>
                </div>
                </div>
            </td>
          </tr>
          <tr>
            <td class="info text-center" style="line-height: 60px;">从业证明、社保证明扫描件</td>
            <td class="text-center" style="line-height: 60px;">文件名格式：姓名+从业社保证明</td>
            <td>
              <div id="addCommodityIndex6">
                <div class="input-group row">
                    <div class="col-sm-12 big-photo">
                      <div id="preview6">
                            <img id="imghead6" border="0" src="http://localhost/Application/Home/Public/images/photo_icon.png" width="50" height="50"  onclick="$('#previewImg6').click();">
                         </div>         
                        <input type="file" onchange="previewImage(this,6)" style="display: none;" id="previewImg6">
                    </div>
                </div>
                </div>
            </td>
          </tr>
        </table>
      </div>   
      <div class="m-bottom">
      <div class="form-group">
        <div class="col-sm-12 input-parent" style="margin-top:0px;">
          <button type="reset" class="btn btn-default m-btn-cancel">取消</button>
          <button type="submit" class="btn btn-primary m-btn-sure">上传</button>
        </div>
      </div>
      </div>
      </form> 
  </div>
</div>
</div>-->
<div class="row">
  <div class="container">
  <div class="col-sm-3 s_nav">
    <div class="navMenubox">
      <div id="slimtest1">
        <div class="navMenu-top">
          <div id="mini" style=""><i class="fa fa-bars fa-2x"></i></div>
        </div>
        <ul class="navMenu">
          <li> <a href="<?php echo U('User/info');?>" class="afinve"> <i class="glyphicon glyphicon-envelope" style="line-height: 40px;"></i> <span class="">通知公告</span></a></li>
          <li> <a href="<?php echo U('User/baoming');?>" class="afinve"> <i class="glyphicon glyphicon-tag" style="line-height: 40px;"></i> <span class="">报名通知</span></a></li>
          <li > <a href="javascript:;" class="afinve"> <i class="glyphicon glyphicon-user" style="line-height: 40px;"></i> <span class="nav-text">个人信息</span> <span class="arrow"></span> </a>
            <ul class="sub-menu">
              <li><a href="javascript:;" ><span>个人资料</span></a></li>
              <li><a href="javascript:;"><span>合格证</span></a></li>
              <li><a href="javascript:;"><span>修改密码</span></a></li>
            </ul>
          </li>
          <li > <a href="javascript:;" class="afinve"><i class="glyphicon glyphicon-check" style="line-height: 40px;"></i><span>审核状态</span></a> </li>
          <li > <a href="javascript:;" class="afinve"> <i class="glyphicon glyphicon-save" style="line-height: 40px;"></i> <span class="nav-text">准考证打印</span> </a></li>
          <li > <a href="javascript:;" class="afinve"> <i class="icon_3"></i> <span class="nav-text">考试结果</span></a> </li>
        </ul>
      </div>
    </div>
  </div>
  <!--默认显示部分-->
  <div class="ss_nav col-sm-9">
  <div class="div1">
  <!--通知部分-->
    <!--<div class="ale col-sm-12">
      <p class="alert alert-success">通知公告<span class="glyphicon glyphicon-menu-right"></span></p>
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">报名通知</h3>
        </div>
        <div class="panel-body">
          地点为：xxxxxxxxxxxxxx
        </div>
      </div>
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">关于防雷</h3>
        </div>
        <div class="panel-body">
          地点为：xxxxxxxxxxxxxx
        </div>
      </div>
    </div>
   <!--报名部分-->
   <!--<div class="baoming col-sm-12" style="display:none;">
    <p class="alert alert-success">报名<span class="glyphicon glyphicon-menu-right"></span></p>
    <table class="table">
      <tr class="info">
        <td>考试时间</td>
        <td>考试科目</td>
        <td>我要报名</td>
      </tr>

      <tr class="primary">
        <td><?php if(is_array($examtell)): $i = 0; $__LIST__ = $examtell;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$e): $mod = ($i % 2 );++$i; echo ($e["time"]); endforeach; endif; else: echo "" ;endif; ?></td>
        <td><?php if(is_array($examtell)): $i = 0; $__LIST__ = $examtell;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$e): $mod = ($i % 2 );++$i; echo ($e["subject"]); endforeach; endif; else: echo "" ;endif; ?></td>
        <td><button class="btn btn-primary bn" type="button" >报名</button></td>
      </tr>
    </table>
  </div>
   <!--审核部分-->
   <!--<div class="shenhe col-sm-12" style="display:none;">
    <p class="alert alert-success">审核<span class="glyphicon glyphicon-menu-right"></span></p>
    <table class="table">
      <tr class="info">
        <td>审核状态</td>
        <td>审核不过原因</td>
        <td></td>
      </tr>
      <tr class="primary">
        <td>待审核</td>
        <td></td>
        <td></td>
      </tr>
      <tr class="primary">
        <td class="text-danger">审核不通过</td>
        <td>材料不全</td>
        <td><button class="btn btn-primary bn btn1" type="button" >重新上传</button></td>
      </tr>
    </table>
  </div>
  <!--准考证部分-->
  <!--<div class="zhuikz col-sm-12" style="display:none;">
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
        <td><button class="btn btn-primary pbtn" type="button" >打印</button></td>
      </tr>
      <tr class="primary">
        <td>xx</td>
        <td>xxxx</td>
        <td>xxx</td>
        <td>xxx</td>
        <td><button class="btn btn-primary pbtn" type="button" >打印</button></td>
      </tr>
    </table>
  </div>
  <!--考试结果部分-->
  <!--<div class="result col-sm-12" style="display:none;">
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
  </div>
  <!--<div class="div2">
  <!--个人资料部分-->
  <!--<div class="info col-sm-12">
    <p class="alert alert-info">个人资料<span class="glyphicon glyphicon-menu-right"></span></p>
    <form action="<?php echo U('User/user');?>" class="form-horizontal" role="form" id="register-form" method="post">
      <div class="form-group">
        <label for="name" class="col-sm-2  control-label">用户名 :</label>
        <div class="col-sm-10  input-parent">
          <input type="text" class="form-control vinput" id="name" name="name" value="<?php if(is_array($userinfo)): $i = 0; $__LIST__ = $userinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u): $mod = ($i % 2 );++$i; echo ($u["account"]); endforeach; endif; else: echo "" ;endif; ?>" disabled="true">
          <span></span>
        </div>
      </div>
      <div class="form-group">
        <label for="username" class="col-sm-2  control-label">姓 &nbsp;&nbsp;&nbsp;&nbsp; 名 :</label>
        <div class="col-sm-10  input-parent">
          <input type="text" class="form-control vinput" id="username" name="username"  value="<?php if(is_array($userinfo)): $i = 0; $__LIST__ = $userinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u): $mod = ($i % 2 );++$i; echo ($u["real_account"]); endforeach; endif; else: echo "" ;endif; ?>" disabled="true">
          <span></span>
        </div>
      </div>
      <div class="form-group">
	    <label for="username" class="col-sm-2  control-label">性 &nbsp;&nbsp;&nbsp;&nbsp; 别 :</label>
        <div class="col-sm-10  input-parent">
         <input type="text" class="form-control vinput" id="sex" name="sex"  value="<?php if(is_array($userinfo)): $i = 0; $__LIST__ = $userinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u): $mod = ($i % 2 );++$i; echo ($u["sex"]); endforeach; endif; else: echo "" ;endif; ?>" disabled="true">
         </div>
        </div>

      <div class="form-group">
        <label for="birthday" class="col-sm-2  control-label">出生日期 :</label>
        <div class="col-sm-10  input-parent">
          <input type="text" class="form-control vinput" id="birthday" name="birthday" value="<?php if(is_array($userinfo)): $i = 0; $__LIST__ = $userinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u): $mod = ($i % 2 );++$i; echo ($u["birth"]); endforeach; endif; else: echo "" ;endif; ?>" readonly>
          <span></span>
        </div>
      </div>
      <div class="form-group">
        <label for="card" class="col-sm-2  control-label">身份证号 :</label>
        <div class="col-sm-10  input-parent">
          <input type="text" class="form-control vinput" id="card" name="card" value="<?php if(is_array($userinfo)): $i = 0; $__LIST__ = $userinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u): $mod = ($i % 2 );++$i; echo ($u["id_card"]); endforeach; endif; else: echo "" ;endif; ?>" disabled="true">    
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
          <select class="form-control vinput" name="profession">
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
          <input type="text" class="form-control vinput" id="from" name="from" value="<?php if(is_array($userinfo)): $i = 0; $__LIST__ = $userinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u): $mod = ($i % 2 );++$i; echo ($u["school"]); endforeach; endif; else: echo "" ;endif; ?>">    
          <span></span>
        </div>
      </div>
      <div class="form-group">
        <label for="position" class="col-sm-2  control-label">所学专业 :</label>
        <div class="col-sm-10 input-parent">
          <select class="form-control vinput" name="major">
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
          <select class="form-control vinput" name="education">
          <option value="硕士研究生以上">硕士研究生以上</option>
          <option value="本科">本科</option>
          <option value="大专">大专</option>
          <option value="中专">中专</option>
          <option value="中专以下">中专以下</option>
          </select>
          <span></span>
        </div>
      </div>
      <div class="form-group">
        <label for="graduate" class="col-sm-2  control-label">毕业年份 :</label>
        <div class="col-sm-10  input-parent">
          <input type="text" class="form-control vinput" id="graduate" name="graduate" value="<?php if(is_array($userinfo)): $i = 0; $__LIST__ = $userinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u): $mod = ($i % 2 );++$i; echo ($u["graduate"]); endforeach; endif; else: echo "" ;endif; ?>" readonly>
          <span></span>
        </div>
      </div>
      <div class="form-group">
        <label for="workplace" class="col-sm-2  control-label">工作单位 :</label>
        <div class="col-sm-10  input-parent">
          <input type="text" class="form-control vinput" id="workplace" name="workplace" value="<?php if(is_array($userinfo)): $i = 0; $__LIST__ = $userinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u): $mod = ($i % 2 );++$i; echo ($u["work_address"]); endforeach; endif; else: echo "" ;endif; ?>">    
          <span></span>
        </div>
      </div>
      <div class="form-group">
        <label for="phone" class="col-sm-2  control-label">手 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 机 :</label>
        <div class="col-sm-10  input-parent">
          <input type="text" class="form-control vinput" id="phone" name="telephone" value="<?php if(is_array($userinfo)): $i = 0; $__LIST__ = $userinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u): $mod = ($i % 2 );++$i; echo ($u["phone"]); endforeach; endif; else: echo "" ;endif; ?>">    
          <span></span>
        </div>
      </div>
      <div class="form-group ">
        <label for="email" class="col-sm-2  control-label">邮 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 箱 :</label>
        <div class="col-sm-10 input-parent">
          <input type="text" class="form-control vinput" id="email" name="email" value="<?php if(is_array($userinfo)): $i = 0; $__LIST__ = $userinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u): $mod = ($i % 2 );++$i; echo ($u["mail"]); endforeach; endif; else: echo "" ;endif; ?>"/>       
          <span></span>
        </div>
      </div>
      <div class="form-group ">
        <label for="address" class="col-sm-2  control-label">通信地址 :</label>
        <div class="col-sm-10 input-parent">
          <input type="text" class="form-control vinput" id="address" name="address" value="<?php if(is_array($userinfo)): $i = 0; $__LIST__ = $userinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u): $mod = ($i % 2 );++$i; echo ($u["addr"]); endforeach; endif; else: echo "" ;endif; ?>"/>       
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
   <!--<div class="hgcard col-sm-12" style="display:none;">
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
  <!--<div class="hgcard col-sm-12" style="display:none;">
    <p class="alert alert-danger">密码修改<span class="glyphicon glyphicon-menu-right"></span></p>
    <form class="form-horizontal" id="changpwd">
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
<!--</div>-->
<br><br><br><br>
<footer>
  <nav>
      <p style="text-align: center;">Copyright xxx Gan su Meteorological Society</p>
      <p style="text-align: center;">甘肃省气象学会 &copy;版权所有<p>
  </nav>
</footer>
<!--<footer>
  <nav class="navbar-default text-center navbar-fixed-bottom">
      Copyright xxx Gan su Meteorological Society<br>
      甘肃省气象学会 &copy;版权所有
  </nav>
</footer>-->
</body>
</html>
<script>
</script>