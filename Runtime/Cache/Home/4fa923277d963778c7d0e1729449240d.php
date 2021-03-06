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
img:hover{
  cursor: pointer;
}
</style>
<body>
<header>
<div class="container">
  <span class="text-primary h3">甘肃省防雷装置检测专业技术人员能力评价管理系统注册</span><p class="text-right">返回<a href="load.html" class="h4" style="text-decoration: none;color:#8cd5ed;">登录</a>页面</p>
</div>
</header>
<div class="container" style="margin-top:20px;">
  <div class="form-box row" id="rfrom">
    <form action="<?php echo U('User/rigist');?>" class="form-horizontal" role="form" id="register-form" method="POST" enctype="multipart/form-data">
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
          <input type="text" class="form-control vinput" id="username" name="username" placeholder="请输入姓名" >
          <span></span>
        </div>
      </div>
      <div class="form-group">
        <label for="sex" class="col-sm-6  control-label">性 &nbsp;&nbsp;&nbsp;&nbsp; 别 :</label>
        <div class="col-sm-6 ">
          <div class="form-control vinput">
          &nbsp;男&nbsp;<input type="radio" class=" " id="sex" name="sex" value="男" checked/>
          &nbsp;女&nbsp;<input type="radio" class="" id="sex" name="sex" value="女"/>
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
          &nbsp;是&nbsp;<input type="radio" class=" " id="health" name="health" value="是" checked/>
          &nbsp;否&nbsp;<input type="radio" class="" id="health" name="health" value="否"/>
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
          <input type="text" class="form-control vinput" id="from" name="from" placeholder="请输入毕业院校">    
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
          <input type="text" class="form-control vinput" id="graduate" name="graduate" placeholder="请输入毕业年份" >
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
          &nbsp;是&nbsp;<input type="radio" class=" " id="experience" name="experience" value="是" checked/>
          &nbsp;否&nbsp;<input type="radio" class="" id="experience" name="experience" value="否"/>
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
        <label for="address" class="col-sm-2  control-label">通信地址 :</label>
        <div class="col-sm-10 input-parent">
          <input type="text" class="form-control vinput" id="address" name="address" placeholder="请输入通信地址"/>       
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
          <input type="text" class="form-control vinput" id="phone" name="tel_num" placeholder="请输入固定电话"/>       
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
        <label for="notpass" class="col-sm-12  control-label">上传电子资料(有一定的像素要求) :</label>
        <table class="table table-condensed">
          <tr>
            <td class="info text-center" style="line-height: 60px;">本人1寸近期正面免冠白底彩照</td>
            <td class="text-center" style="line-height: 60px;">文件名格式：姓名+照片</td>
            <td>
              <div id="addCommodityIndex">
                <div class="input-group row">
                    <div class="col-sm-12 big-photo">
                      <div id="preview1">
                            <img id="imghead1" border="0" src="http://localhost/Application/Home/Public/images/photo_icon.png" width="60" height="60"  onclick="$('#previewImg1').click();">
                         </div>         
                        <input type="file" name="upload[]"onchange="previewImage(this,1)" style="display: none;" id="previewImg1">
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
                            <img id="imghead" border="0" src="http://localhost/Application/Home/Public/images/photo_icon.png" width="60" height="60"  onclick="$('#previewImg2').click();">
                         </div>         
                        <input type="file"  name="upload[]" onchange="previewImage(this,2)" style="display: none;" id="previewImg2">
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
                            <img id="imghead3" border="0" src="http://localhost/Application/Home/Public/images/photo_icon.png" width="60" height="60"  onclick="$('#previewImg3').click();">
                         </div>         
                        <input type="file"  name="upload[]"  onchange="previewImage(this,3)" style="display: none;" id="previewImg3">
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
                            <img id="imghead4" border="0" src="http://localhost/Application/Home/Public/images/photo_icon.png" width="60" height="60"  onclick="$('#previewImg4').click();">
                         </div>         
                        <input type="file"   name="upload[]" onchange="previewImage(this,4)" style="display: none;" id="previewImg4">
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
                            <img id="imghead5" border="0" src="http://localhost/Application/Home/Public/images/photo_icon.png" width="60" height="60"  onclick="$('#previewImg5').click();">
                         </div>         
                        <input type="file"   name="upload[]" onchange="previewImage(this,5)" style="display: none;" id="previewImg5">
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
                            <img id="imghead6" border="0" src="http://localhost/Application/Home/Public/images/photo_icon.png" width="60" height="60"  onclick="$('#previewImg6').click();">
                         </div>         
                        <input type="file"   name="upload[]" onchange="previewImage(this,6)" style="display: none;" id="previewImg6">
                    </div>
                </div>
                </div>
            </td>
          </tr>
        </table>
      </div>
      <br>
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
<script type="text/javascript">
  function previewImage(file,index)
        {
          var MAXWIDTH  = 60; 
          var MAXHEIGHT = 60;
          var div = document.getElementById('preview'+index);
          if (file.files && file.files[0])
          {
              div.innerHTML ='<img id=imghead'+index+' onclick=$("#previewImg'+index+'").click()>';
              var img = document.getElementById('imghead'+index+'');
              img.onload = function(){
                var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
                img.width  =  rect.width;
                img.height =  rect.height;
//                 img.style.marginLeft = rect.left+'px';
                img.style.marginTop = rect.top+'px';
              }
              var reader = new FileReader();
              reader.onload = function(evt){img.src = evt.target.result;}
              reader.readAsDataURL(file.files[0]);
          }
          else //兼容IE
          {
            var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
            file.select();
            var src = document.selection.createRange().text;
            div.innerHTML = '<img id=imghead1>';
            var img = document.getElementById('imghead1');
            img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
            var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
            status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);
            div.innerHTML = "<div id=divhead style='width:"+rect.width+"px;height:"+rect.height+"px;margin-top:"+rect.top+"px;"+sFilter+src+"\"'></div>";
          }
        }
        function clacImgZoomParam( maxWidth, maxHeight, width, height ){
            var param = {top:0, left:0, width:width, height:height};
            if( width>maxWidth || height>maxHeight ){
                rateWidth = width / maxWidth;
                rateHeight = height / maxHeight;
                
                if( rateWidth > rateHeight ){
                    param.width =  maxWidth;
                    param.height = Math.round(height / rateWidth);
                }else{
                    param.width = Math.round(width / rateHeight);
                    param.height = maxHeight;
                }
            }
            param.left = Math.round((maxWidth - param.width) / 2);
            param.top = Math.round((maxHeight - param.height) / 2);
            return param;
        }
</script>