<?php if (!defined('THINK_PATH')) exit();?><html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>用户审核</title>
  <link href="http://localhost/tpdemo/1/Application/Admin/Public/css/bootstrap.min.css" rel="stylesheet">
  <script src="http://localhost/tpdemo/1/Application/Admin/Public/js/jquery-3.1.1.min.js"></script>
  <script src="http://localhost/tpdemo/1/Application/Admin/Public/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="http://localhost/tpdemo/1/Application/Admin/Public/css/baguetteBox.min.css">
  <link rel="stylesheet" href="http://localhost/tpdemo/1/Application/Admin/Public/css/gallery-clean.css">
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
          <a href="<?php echo U('Load/load');?>" style="color:#fff;">退出登录</a>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header>
<p class="h4">管理员，欢迎您</p>
<p class="h2 text-center text-info">用户审核</p>
<div style="margin-top:20px;">
  <div class="form-box row" id="rfrom">
    <form action="<?php echo U('Index/checkuser');?>" class="form-horizontal" role="form" id="register-form">
      <div class="form-group">
        <label for="name" class="col-sm-2 col-sm-offset-2 control-label">用户名 :</label>
        <div class="col-sm-6  input-parent">
          <input type="text" class="form-control vinput" id="name" name="name"  readonly value="<?=$userDetail['account']?>">
        </div>
      </div>
      <div class="form-group">
        <label for="username" class="col-sm-2 col-sm-offset-2 control-label">姓 &nbsp;&nbsp;&nbsp;&nbsp; 名 :</label>
        <div class="col-sm-6  input-parent">
          <input type="text" class="form-control vinput" id="username" name="username" readonly value="<?=$userDetail['real_account']?>">
          <span></span>
        </div>
      </div>
      <div class="form-group">
        <label for="sex" class="col-sm-2 col-sm-offset-2  control-label">性 &nbsp;&nbsp;&nbsp;&nbsp; 别 :</label>
        <div class="col-sm-6  input-parent">
          <input type="text" class="form-control vinput" id="sex" name="sex" readonly value="<?=$userDetail['sex']?>">
          <span></span>
        </div>
      </div>
      <div class="form-group">
        <label for="birthday" class="col-sm-2 col-sm-offset-2 control-label">出生日期 :</label>
        <div class="col-sm-6  input-parent">
          <input type="text" class="form-control vinput" id="birthday" name="birthday" value="<?=$userDetail['birth']?>" readonly>
          <span></span>
        </div>
      </div>
      <div class="form-group">
        <label for="card" class="col-sm-2 col-sm-offset-2 control-label">身份证号 :</label>
        <div class="col-sm-6  input-parent">
          <input type="text" class="form-control vinput" id="card" name="card" value="<?=$userDetail['id_card']?>" readonly>    
        </div>
      </div>
       
      <div class="form-group">
        <label for="position" class="col-sm-2 col-sm-offset-2 control-label">职 &nbsp;&nbsp;&nbsp;&nbsp; 称 :</label>
        <div class="col-sm-6 input-parent">
          <input type="text" class="form-control vinput" id="call" name="call"  value="<?=$userDetail['profession']?>" readonly>
        </div>
      </div>
      <div class="form-group">
        <label for="from" class="col-sm-2 col-sm-offset-2 control-label">毕业院校 :</label>
        <div class="col-sm-6  input-parent">
          <input type="text" class="form-control vinput" id="from" name="from" value="<?=$userDetail['school']?>" readonly>    
          <span></span>
        </div>
      </div>
      <div class="form-group">
        <label for="position" class="col-sm-2 col-sm-offset-2 control-label">所学专业 :</label>
        <div class="col-sm-6 input-parent">
          <input type="text" class="form-control vinput" id="major" name="major" readonly value="<?=$userDetail['major']?>">
        </div>
      </div>
       <div class="form-group">
        <label for="position" class="col-sm-2 col-sm-offset-2 control-label">学 &nbsp;&nbsp;&nbsp;&nbsp; 历 :</label>
        <div class="col-sm-6 input-parent">
          <input type="text" class="form-control vinput" id="rank" name="rank" readonly value="<?=$userDetail['education']?>">
        </div>
      </div>
      <div class="form-group">
        <label for="graduate" class="col-sm-2 col-sm-offset-2 control-label">毕业年份 :</label>
        <div class="col-sm-6  input-parent">
          <input type="text" class="form-control vinput" id="graduate" name="graduate" value="<?=$userDetail['graduate']?>" readonly>
          <span></span>
        </div>
      </div>
      <div class="form-group">
        <label for="workplace" class="col-sm-2 col-sm-offset-2 control-label">工作单位 :</label>
        <div class="col-sm-6  input-parent">
          <input type="text" class="form-control vinput" id="workplace" name="workplace" value="<?=$userDetail['work_address']?>" readonly>    
          <span></span>
        </div>
      </div>
      <div class="form-group">
        <label for="phone" class="col-sm-2 col-sm-offset-2 control-label">手 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 机 :</label>
        <div class="col-sm-6  input-parent">
          <input type="text" class="form-control vinput" id="phone" name="telephone" value="<?=$userDetail['phone']?>" readonly>    
          <span></span>
        </div>
      </div>
     
      <div class="form-group ">
        <label for="email" class="col-sm-2 col-sm-offset-2 control-label">邮 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 箱 :</label>
        <div class="col-sm-6 input-parent">
          <input type="text" class="form-control vinput" id="email" name="email" value="<?=$userDetail['mail']?>" readonly>       
          <span></span>
        </div>
      </div>
      <div class="form-group ">
        <label for="adress" class="col-sm-2 col-sm-offset-2 control-label">通信地址 :</label>
        <div class="col-sm-6 input-parent">
          <input type="text" class="form-control vinput" id="adress" name="adress" value="<?=$userDetail['addr']?>" readonly>       
          <span></span>
        </div>
      </div>
      <div class="form-group ">
        <label for="ecode" class="col-sm-2 col-sm-offset-2 control-label">邮政编码 :</label>
        <div class="col-sm-6 input-parent">
          <input type="text" class="form-control vinput" id="ecode" name="ecode" value="<?=$userDetail['post_address']?>"readonly>       
          <span></span>
        </div>
      </div>
      <div class="form-group ">
        <label for="phone" class="col-sm-2 col-sm-offset-2 control-label">固定电话 :</label>
        <div class="col-sm-6 input-parent">
          <input type="text" class="form-control vinput" id="fixphone" name="phone" value="<?=$userDetail['tel_num']?>"readonly>       
        </div>
      </div>
      <div class="form-group ">
        <label for="password" class="col-sm-2 col-sm-offset-2 control-label">密 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 码 :</label>
        <div class="col-sm-6  input-parent">
          <input type="text" class="form-control vinput" id="password" name="password" value="<?=$userDetail['password']?>" readonly>
        </div>
      </div>
     </form>
  </div>
<div class="tz-gallery">
<div class="row">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <a class="lightbox" href="<?=$src1?>">
        <img src="<?=$src1?>" alt="ps1" style="width:300px;height:300px; ">
      </a>
      <div class="caption">
        <h3 class="text-center">本人1寸近期正面免冠白底彩照</h3>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <a class="lightbox" href="<?=$src2?>">
        <img src="<?=$src2?>" alt="ps2" style="width:300px;height:300px; ">
      </a>
      <div class="caption">
        <h3 class="text-center">身份证正面扫描件</h3>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <a class="lightbox" href="<?=$src3?>">
        <img src="<?=$src3?>" alt="ps3" style="width:300px;height:300px;">
      </a>
      <div class="caption">
        <h3 class="text-center">身份证背面扫描件</h3>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
     <a class="lightbox" href="<?=$src4?>">
        <img src="<?=$src4?>" alt="ps7" style="width:300px;height:300px;">
      </a>
      <div class="caption">
        <h3 class="text-center">毕业证书扫描件</h3>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <a class="lightbox" href="<?=$src5?>">
        <img src="<?=$src5?>" alt="ps2" style="width:300px;height:300px; ">
      </a>
      <div class="caption">
        <h3 class="text-center">职称证书扫描件</h3>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <a class="lightbox" href="<?=$src6?>">
        <img src="<?=$src6?>" alt="ps11" style="width:300px;height:300px; ">
      </a>
      <div class="caption">
        <h3 class="text-center">从业证明、社保证明扫描件</h3>
      </div>
    </div>
  </div>
</div>
</div>
<div class="row">
<form action="<?php echo U('Index/tijiao');?>" class="form-horizontal" method="post">
  <div class="form-group ">
        <label for="email" class="col-sm-2 col-sm-offset-2 control-label"> 审核确认 :</label>
        <div class="col-sm-6 input-parent">
		<input type="hidden" name="account" value="<?=$userDetail['account']?>"/>
          <select class="form-control vinput" name="result" id="result">
            <option value="审核通过">审核通过</option>
            <option value="审核不通过">审核不通过</option>
          </select>
        </div>
  </div>
  <div class="form-group" id="why">
        <label for="phone" class="col-sm-2 col-sm-offset-2 control-label">审核不过原因 :</label>
        <div class="col-sm-6 input-parent">
        <input type="text" class="form-control vinput" id="unsuccess" name="reason" />       
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
<script type="text/javascript" src="http://localhost/tpdemo/1/Application/Admin/Public/js/baguetteBox.min.js"></script>
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