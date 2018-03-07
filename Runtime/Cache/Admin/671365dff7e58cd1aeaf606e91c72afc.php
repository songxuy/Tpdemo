<?php if (!defined('THINK_PATH')) exit();?><html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>用户审核</title>
  <link href="http://localhost/Application/Admin/Public/css/bootstrap.min.css" rel="stylesheet">
  <script src="http://localhost/Application/Admin/Public/js/jquery-3.1.1.min.js"></script>
  <script src="http://localhost/Application/Admin/Public/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="http://localhost/Application/Admin/Public/css/baguetteBox.min.css">
  <link rel="stylesheet" href="http://localhost/Application/Admin/Public/css/gallery-clean.css">
</head>
<style>
.op{
  position: relative;
  font-size: 28px;
  float: right;
  margin-top:-30px;
  color:green;
}
img:hover{
  cursor: pointer;
}
</style>
<body class="container">
<header>
<nav class="navbar navbar-default" style="background-color: #29aae1;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#" style="color:#fff;">甘肃省防雷专业技术人员资格</a>
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
<p class="h4">管理员，欢迎您，上次登录时间：XXXX年XX月XX日</p>
<p class="h2 text-center text-info">用户审核</p>
<div style="margin-top:20px;">
  <div class="form-box row" id="rfrom">
    <form action="#" class="form-horizontal" role="form" id="register-form">
      <div class="form-group">
        <label for="name" class="col-sm-2 col-sm-offset-2 control-label">用户名 :</label>
        <div class="col-sm-6  input-parent">
          <input type="text" class="form-control vinput" id="name" name="name"  readonly value="">
        </div>
      </div>
      <div class="form-group">
        <label for="username" class="col-sm-2 col-sm-offset-2 control-label">姓 &nbsp;&nbsp;&nbsp;&nbsp; 名 :</label>
        <div class="col-sm-6  input-parent">
          <input type="text" class="form-control vinput" id="username" name="username" readonly value="">
          <span></span>
        </div>
      </div>
      <div class="form-group">
        <label for="sex" class="col-sm-2 col-sm-offset-2  control-label">性 &nbsp;&nbsp;&nbsp;&nbsp; 别 :</label>
        <div class="col-sm-4 col-sm-offset-2 ">
          <div class="form-control vinput">
          &nbsp;男&nbsp;<input type="radio" class=" " id="sex" name="sex" value="男" disabled="true" />
          &nbsp;女&nbsp;<input type="radio" class="" id="sex" name="sex" value="女" disabled="true"/>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="birthday" class="col-sm-2 col-sm-offset-2 control-label">出生日期 :</label>
        <div class="col-sm-6  input-parent">
          <input type="text" class="form-control vinput" id="birthday" name="birthday" readonly>
          <span></span>
        </div>
      </div>
      <div class="form-group">
        <label for="card" class="col-sm-2 col-sm-offset-2 control-label">身份证号 :</label>
        <div class="col-sm-6  input-parent">
          <input type="text" class="form-control vinput" id="card" name="card" readonly>    
        </div>
      </div>
       
      <div class="form-group">
        <label for="position" class="col-sm-2 col-sm-offset-2 control-label">职 &nbsp;&nbsp;&nbsp;&nbsp; 称 :</label>
        <div class="col-sm-6 input-parent">
          <input type="text" class="form-control vinput" id="call" name="call" readonly value="高级工程师">
        </div>
      </div>
      <div class="form-group">
        <label for="from" class="col-sm-2 col-sm-offset-2 control-label">毕业院校 :</label>
        <div class="col-sm-6  input-parent">
          <input type="text" class="form-control vinput" id="from" name="from" readonly>    
          <span></span>
        </div>
      </div>
      <div class="form-group">
        <label for="position" class="col-sm-2 col-sm-offset-2 control-label">所学专业 :</label>
        <div class="col-sm-6 input-parent">
          <input type="text" class="form-control vinput" id="major" name="major" readonly value="防雷">
        </div>
      </div>
       <div class="form-group">
        <label for="position" class="col-sm-2 col-sm-offset-2 control-label">学 &nbsp;&nbsp;&nbsp;&nbsp; 历 :</label>
        <div class="col-sm-6 input-parent">
          <input type="text" class="form-control vinput" id="rank" name="rank" readonly value="本科毕业">
        </div>
      </div>
      <div class="form-group">
        <label for="graduate" class="col-sm-2 col-sm-offset-2 control-label">毕业年份 :</label>
        <div class="col-sm-6  input-parent">
          <input type="text" class="form-control vinput" id="graduate" name="graduate" readonly>
          <span></span>
        </div>
      </div>
      <div class="form-group">
        <label for="workplace" class="col-sm-2 col-sm-offset-2 control-label">工作单位 :</label>
        <div class="col-sm-6  input-parent">
          <input type="text" class="form-control vinput" id="workplace" name="workplace" readonly>    
          <span></span>
        </div>
      </div>
      <div class="form-group">
        <label for="phone" class="col-sm-2 col-sm-offset-2 control-label">手 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 机 :</label>
        <div class="col-sm-6  input-parent">
          <input type="text" class="form-control vinput" id="phone" name="telephone" readonly>    
          <span></span>
        </div>
      </div>
       <div class="form-group">
        <label for="experience" class="col-sm-6  control-label">已从事防雷工作满3年并可提交社保证明:</label>
        <div class="col-sm-2 col-sm-offset-2 input-parent">
          <div class="form-control vinput">
          &nbsp;是&nbsp;<input type="radio" class=" " id="experience" name="experience" value="是" disabled="true"/>
          &nbsp;否&nbsp;<input type="radio" class="" id="experience" name="experience" value="否" disabled="true"/>
          </div>
        </div>
      </div>
      <div class="form-group ">
        <label for="email" class="col-sm-2 col-sm-offset-2 control-label">邮 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 箱 :</label>
        <div class="col-sm-6 input-parent">
          <input type="text" class="form-control vinput" id="email" name="email" readonly/>       
          <span></span>
        </div>
      </div>
      <div class="form-group ">
        <label for="adress" class="col-sm-2 col-sm-offset-2 control-label">通信地址 :</label>
        <div class="col-sm-6 input-parent">
          <input type="text" class="form-control vinput" id="adress" name="adress" readonly/>       
          <span></span>
        </div>
      </div>
      <div class="form-group ">
        <label for="ecode" class="col-sm-2 col-sm-offset-2 control-label">邮政编码 :</label>
        <div class="col-sm-6 input-parent">
          <input type="text" class="form-control vinput" id="ecode" name="ecode" readonly/>       
          <span></span>
        </div>
      </div>
      <div class="form-group ">
        <label for="phone" class="col-sm-2 col-sm-offset-2 control-label">固定电话 :</label>
        <div class="col-sm-6 input-parent">
          <input type="text" class="form-control vinput" id="fixphone" name="phone" readonly/>       
        </div>
      </div>
      <div class="form-group ">
        <label for="password" class="col-sm-2 col-sm-offset-2 control-label">密 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 码 :</label>
        <div class="col-sm-6  input-parent">
          <input type="text" class="form-control vinput" id="password" name="password"/>
        </div>
      </div>
     </form>
  </div>
<div class="tz-gallery">
<div class="row">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <a class="lightbox" href="http://localhost/Application/Admin/Public/images/ps1.jpg">
        <img src="http://localhost/Application/Admin/Public/images/ps1.jpg" alt="ps1" style="width:300px;height:300px; ">
      </a>
      <div class="caption">
        <h3 class="text-center">本人1寸近期正面免冠白底彩照</h3>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <a class="lightbox" href="http://localhost/Application/Admin/Public/images/ps2.jpg">
        <img src="http://localhost/Application/Admin/Public/images/ps2.jpg" alt="ps2" style="width:300px;height:300px; ">
      </a>
      <div class="caption">
        <h3 class="text-center">身份证正面扫描件</h3>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <a class="lightbox" href="http://localhost/Application/Admin/Public/images/ps3.jpg">
        <img src="http://localhost/Application/Admin/Public/images/ps3.jpg" alt="ps3" style="width:300px;height:300px;">
      </a>
      <div class="caption">
        <h3 class="text-center">身份证背面扫描件</h3>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
     <a class="lightbox" href="http://localhost/Application/Admin/Public/images/ps7.jpg">
        <img src="http://localhost/Application/Admin/Public/images/ps7.jpg" alt="ps7" style="width:300px;height:300px;">
      </a>
      <div class="caption">
        <h3 class="text-center">毕业证书扫描件</h3>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <a class="lightbox" href="http://localhost/Application/Admin/Public/images/ps10.jpg">
        <img src="http://localhost/Application/Admin/Public/images/ps10.jpg" alt="ps2" style="width:300px;height:300px; ">
      </a>
      <div class="caption">
        <h3 class="text-center">职称证书扫描件</h3>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <a class="lightbox" href="http://localhost/Application/Admin/Public/images/ps11.jpg">
        <img src="http://localhost/Application/Admin/Public/images/ps11.jpg" alt="ps11" style="width:300px;height:300px; ">
      </a>
      <div class="caption">
        <h3 class="text-center">从业证明、社保证明扫描件</h3>
      </div>
    </div>
  </div>
</div>
</div>
<div class="row">
<form action="#" class="form-horizontal">
  <div class="form-group ">
        <label for="email" class="col-sm-2 col-sm-offset-2 control-label"> 审核确认 :</label>
        <div class="col-sm-6 input-parent">
          <select class="form-control vinput" name="result" id="result">
            <option value="审核通过">审核通过</option>
            <option value="审核不通过">审核不通过</option>
          </select>
        </div>
  </div>
  <div class="form-group" id="why">
        <label for="phone" class="col-sm-2 col-sm-offset-2 control-label">审核不过原因 :</label>
        <div class="col-sm-6 input-parent">
        <input type="text" class="form-control vinput" id="unsuccess" name="unsuccess" />       
  </div>
  </div>
  <div class="form-group">
        <div class="col-sm-4 col-sm-offset-8 input-parent">
            <button type="submit" class="btn btn-primary">提交审核</button>
            <button type="reset" class="btn btn-default">取消</button>
        </div>
      </div>
</form>
</div>
</div>

<footer>
  <nav>
      <p style="text-align: center;">Copyright xxx Gan su Meteorological Society</p>
      <p style="text-align: center;">甘肃省气象学会 &copy;版权所有<p>
  </nav>
</footer>
</body>
</html>
<script type="text/javascript" src="http://localhost/Application/Admin/Public/js/baguetteBox.min.js"></script>
<script type="text/javascript">
$(function(){
  $("#why").hide()
  $("#result").change(function(){
       var selected=$(this).children('option:selected').val()
      // alert(selected);
       if(selected=="审核不通过"){
           //document.getElementById("search_content_id").
           $('#why').show();
       }else{
        $('#why').hide();
       }
   });
})
baguetteBox.run('.tz-gallery');
</script>