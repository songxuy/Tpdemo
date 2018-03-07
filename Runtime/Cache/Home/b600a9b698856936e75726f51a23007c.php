<?php if (!defined('THINK_PATH')) exit();?><html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>注册</title>
  <link href="http://localhost/Application/Home/Public/css/bootstrap.min.css" rel="stylesheet">
  <link href="http://localhost/Application/Home/Public/css/normalize.css" rel="stylesheet">
  <link href="http://localhost/Application/Home/Public/css/public.css" rel="stylesheet">
  <link href="http://localhost/Application/Home/Public/css/validator.css" rel="stylesheet">
  <link href="http://localhost/Application/Home/Public/css/completer.css" rel="stylesheet">
  <link href="http://localhost/Application/Home/Public/jedate/skin/jedate.css" rel="stylesheet">
  <link href="http://localhost/Application/Home/Public/css/date.css" type="text/css" rel="stylesheet">
  <link href="http://localhost/Application/Home/Public/css/magic-check.css" rel="stylesheet" >
  <link href="http://localhost/Application/Home/Public/css/jquery-ui.css" rel="stylesheet">  
  <link href="http://localhost/Application/Home/Public/css/index.css" rel="stylesheet">  
  <script src="http://localhost/Application/Home/Public/js/jquery-3.1.1.min.js"></script>
  <script src="http://localhost/Application/Home/Public/js/bootstrap.min.js"></script>
  <script  src="http://localhost/Application/Home/Public/js/public.js"></script>
  <script  src="http://localhost/Application/Home/Public/js/date.js"></script>
  <script  src="http://localhost/Application/Home/Public/js/jquery-validate.js"></script>
  <script  src="http://localhost/Application/Home/Public/js/validator.js"></script>
  <script  src="http://localhost/Application/Home/Public/js/index.js"></script>
  <script type="text/javascript" src="http://localhost/Application/Home/Public/jedate/jedate.js"></script>

  <!--[if lt IE 9]>
  <script type="text/javascript" src="http://www.jq22.com/jquery/jquery-ui-1.10.2.js"></script>
    <script src="http://cdn.static.runoob.com/libs/html5shiv/3.7/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>  
  <![endif]-->
</head>
<style>
header{
  height:50px;
  margin-top:10px;
}
.op{
  position: relative;
  font-size: 28px;
  float: right;
  margin-top:-30px;
  color:green;
}
</style>
<body>
<header>
<div class="container">
  <span class="text-primary h3">甘肃省防雷装置检测专业技术人员能力评价管理系统注册</span><p class="text-right">返回<a href="load.html" class="h4">注册</a>页面</p>
</div>
</header>
<div class="container">
  <div class="form-box row">
    <form action="#" class="form-horizontal" method='post' role="form" id="register-form">
      <div class="form-group">
        <label for="name" class="col-sm-2  control-label">用户名 :</label>
        <div class="col-sm-10  input-parent">
          <input type="text" class="form-control vinput" id="name" name="name" placeholder="请输入用户名" >
          <span></span>
        </div>
      </div>
      <div class="form-group">
        <label for="username" class="col-sm-2  control-label">姓 &nbsp;&nbsp;&nbsp;&nbsp; 名 :</label>
        <div class="col-sm-10  input-parent">
          <input type="text" class="form-control vinput" id="username" name="username" placeholder="请输入帐户" >
          <span></span>
        </div>
      </div>
      <div class="form-group">
        <label for="sex" class="col-sm-6  control-label">性 &nbsp;&nbsp;&nbsp;&nbsp; 别 :</label>
        <div class="col-sm-6 ">
          <div class="form-control vinput">
          &nbsp;男&nbsp;<input type="radio" class=" " id="sex" name="sex" />
          &nbsp;女&nbsp;<input type="radio" class="" id="sex" name="sex" />
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
          <input type="text" class="form-control vinput" id="card" name="card" placeholder="请输入身份证号">    
          <span></span>
        </div>
      </div>
       <div class="form-group">
        <label for="health" class="col-sm-6  control-label">健康状况 :</label>
        <div class="col-sm-6 input-parent">
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
       <div class="form-group">
        <label for="experience" class="col-sm-9  control-label">已从事防雷工作满3年并可提交社保证明:</label>
        <div class="col-sm-3 input-parent">
          <div class="form-control vinput">
          &nbsp;是&nbsp;<input type="radio" class=" " id="experience" name="experience" />
          &nbsp;否&nbsp;<input type="radio" class="" id="experience" name="experience" />
          </div>
          <span></span>
        </div>
      </div>
      <div class="form-group">
        <label for="lesson" class="col-sm-5  control-label">报考科目:</label>
        <label for="lesson" class="col-sm-5  control-label">防雷装置检测</label>
        <div class="col-sm-2 input-parent">
          <div class="form-control vinput">
          <input type="checkbox" class="" id="lesson" name="lesson" />
          </div>
          <span></span>
        </div>
      </div>
      <div class="form-group ">
        <label for="email" class="col-sm-2  control-label">邮 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 箱 :</label>
        <div class="col-sm-10 input-parent">
          <input type="text" class="form-control vinput" id="email" name="email" placeholder="请输入邮箱"/>       
          <span></span>
        </div>
        <span class="op">*</span>
      </div>
      <div class="form-group ">
        <label for="adress" class="col-sm-2  control-label">通信地址 :</label>
        <div class="col-sm-10 input-parent">
          <input type="text" class="form-control vinput" id="adress" name="adress" placeholder="请输入通信地址"/>       
          <span></span>
        </div>
        <span class="op">*</span>
      </div>
      <div class="form-group ">
        <label for="ecode" class="col-sm-2  control-label">邮政编码 :</label>
        <div class="col-sm-10 input-parent">
          <input type="text" class="form-control vinput" id="ecode" name="ecode" placeholder="请输入邮政编码"/>       
          <span></span>
        </div>
        <span class="op">*</span>
      </div>
      <div class="form-group ">
        <label for="phone" class="col-sm-2  control-label">固定电话 :</label>
        <div class="col-sm-10 input-parent">
          <input type="text" class="form-control vinput" id="phone" name="phone" placeholder="请输入固定电话"/>       
          <span></span>
        </div>
        <span class="op">*</span>
      </div>
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
          <input type="text" class="form-control vinput" id="notpass" name="notpass" placeholder="请再次输入密码"/>
          <i class="glyphicon glyphicon-eye-close form-control-feedback" id="toggle-notpass"></i>
          <span></span>
        </div>
      </div>
      <br>
      <div class="form-group">
        <div class="col-sm-12">
          <input type="checkbox" class="magic-checkbox" id="accept" name="accept" />
          <label for="accept" class="accept"><span>本人对所填写内容和提交材料的真实性负法律责任</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red;">(*号部分为选填项)</span></label>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-12">
          <input type="submit" class="btn btn-primary form-control" id="submit" value="注册"/> 
        </div>
      </div>
    </form>
  </div>
</div>

<footer>
</footer>
</body>
</html>