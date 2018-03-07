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
      <br>
	  <form action="<?php echo U('Index/upload');?>" method="post" enctype="multipart/form-data">
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
                        <input type="file"  name="upload[]" onchange="previewImage(this,1)" style="display: none;" id="previewImg1">
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
                        <input type="file"  name="upload[]" onchange="previewImage(this,3)" style="display: none;" id="previewImg3">
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
                        <input type="file" name="upload[]" onchange="previewImage(this,4)" style="display: none;" id="previewImg4">
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
                        <input type="file" name="upload[]" onchange="previewImage(this,5)" style="display: none;" id="previewImg5">
                    </div>
                </div>
                </div>
            </td>
          </tr>
          <tr>
            <td class="info text-center" style="line-height: 60px;">从业证明、社保证明扫描件</td>
            <td class="text-center" style="line-height: 60px;">文件名格式：姓名+从业社保证明</td>
			<img alt="" src="<?=$aa?>">
            <td>
              <div id="addCommodityIndex6">
                <div class="input-group row">
                    <div class="col-sm-12 big-photo">
                      <div id="preview6">
                            <img id="imghead6" border="0" src="http://localhost/Application/Home/Public/images/photo_icon.png" width="60" height="60"  onclick="$('#previewImg6').click();">
                         </div>         
                        <input type="file" name="upload[]" onchange="previewImage(this,6)" style="display: none;" id="previewImg6">
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