<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
  <title>下载合格证</title>
  <script type="text/javascript" src="http://localhost/tpdemo/1/Application/Home/Public//js/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="http://localhost/tpdemo/1/Application/Home/Public//bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="http://localhost/tpdemo/1/Application/Home/Public//js/canvg2.js"></script>
    <script type="text/javascript" src="http://localhost/tpdemo/1/Application/Home/Public//js/html2canvas-0.4.1.js"></script>
    <script type="text/javascript" src="http://localhost/tpdemo/1/Application/Home/Public//js/jspdf.min.js"></script>
  <link rel="stylesheet" type="text/css" href="http://localhost/tpdemo/1/Application/Home/Public//bootstrap/css/bootstrap.min.css"/>
</head>
<style type="text/css">
  * { margin: 0; padding: 0 }
  .contan{
    text-align: center;
    margin: 20px;
    background-color: #ffffff;
}
#pdfContainer{
    border: 2px solid #000000;
	margin:
}
#bor{
	position: relative;
	margin-top:25px;
	margin-left:24px;
	width:1020px;
	height:800px;
	border: 2px solid red; 
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
          <a href="<?php echo U('Load/load');?>" style="color:#fff;">退出登录</a>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header>
<p><?php echo I('session.username') ?>，欢迎您</p>
<div class="row">
  <div class="container">
    <div class="col-sm-12">
      <div id="pdfContainer" style="height:850px;" class="contan">
      	<div id="bor">
        <p style="float: left;margin-left:50px;margin-top: 10px;"><image src="../../../Application/Common/barcode/buildcode.php?codebar=BCGcode39&text=<?=$zhengshu?>" width="350px" height="45px"/></p>
        <p class="h2" style="font-weight: bold; margin-top:100px;margin-left:-80px;color:#FF0000;">甘肃省雷电防护装置检测能力评价</p><br>
        <p style="font-family:隶书;font-weight: bold;font-size:70px;margin-left:-80px;color:#FF0000;">证&nbsp;&nbsp;&nbsp;&nbsp;书</p>
        <img src="<?=$s?>" style="width:180px;height:200px;margin-top:-250px;margin-left:670px;">
        <p style="margin-top:50px;margin-right: 80px;line-height: 30px;font-size:23px;" ><span style="font-weight: bold;margin-left:80px;margin-right: 30px;color:#ff5050;font-size:23px;"><?=$real_account?></span>参加甘肃省雷电防护装置检测能力评价考试，成绩合格，特发此证。</p>
		<p  style="margin-left:-270px;margin-top:0px;font-size:23px;">有效期限：<span style="color:#ff5050;">2018年1月1日至2020年12月31日<!--<?=$time_2?>年<?=$mouth?>月<?=$day?>日至<?=$later_year?>年<?=$mouth?>月<?=$later_day?>日</span>。--></p>
        <img src="../../../Uploads/zhang.png" width="240" height="240" style="margin-left:550px;position:relative;top:50px;margin-top:-40px;z-index:2;"/>
        <p class="h4 text-right" style="margin-top:-15px;margin-right: 180px;font-weight: bold;">签发单位：甘肃省气象学会</p>
        <p class="h4 text-right" style="margin-right: 190px;font-weight: bold;">签发日期：<span style="color:#000000;">2018年1月1日<!--<?=$time_2?>年<?=$mouth?>月<?=$day?>日</span>--></p>
        <p style="margin-left:-810px;margin-top:-100px;font-weight: bold;"><img src="../../../Uploads/2wm.jpg" style="width:150px;height: 150px;"/><br/>扫二维码查更多信息</p>
        <p style="font-weight: bold;">注意：持证人于有效期满前90日内申请审验及延续，在规定时间内未审验延续者，证书自动失效。</p>
        </div>
      </div>
    </div>
    <div class="col-sm-2 col-sm-offset-10">
      <button class="btn btn-primary" type="button" id="downloadPdf">下载PDF文件</button>
    </div>
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
<script type="text/javascript">
    $(function () {
        

      $("#downloadPdf").click(function () {
            var targetDom = $("#pdfContainer");
            //把需要导出的pdf内容clone一份，这样对它进行转换、微调等操作时才不会影响原来界面
            var copyDom = targetDom.clone();
            //新的div宽高跟原来一样，高度设置成自适应，这样才能完整显示节点中的所有内容（比如说表格滚动条中的内容）
            copyDom.width(targetDom.width() + "px");
            copyDom.height(targetDom.height() + "px");

            $('body').append(copyDom);//ps:这里一定要先把copyDom append到body下，然后再进行后续的glyphicons2canvas处理，不然会导致图标为空

            svg2canvas(copyDom);
            html2canvas(copyDom, {
                onrendered: function (canvas) {
                    var imgData = canvas.toDataURL('image/jpeg');
                    var img = new Image();
                    img.src = imgData;
                    //根据图片的尺寸设置pdf的规格，要在图片加载成功时执行，之所以要*0.225是因为比例问题
                    img.onload = function () {
                        //此处需要注意，pdf横置和竖置两个属性，需要根据宽高的比例来调整，不然会出现显示不完全的问题[this.width * 0.225, this.height * 0.225]
                        if (this.width > this.height) {
                            var doc = new jsPDF('l', 'mm', [this.width * 0.225, this.height * 0.225]);
                        } else {
                            var doc = new jsPDF('p', 'mm', [this.width * 0.225, this.height * 0.225]);
                        }
                        doc.addImage(imgData, 'jpeg', 0, 0, this.width * 0.225, this.height * 0.225);
                        //根据下载保存成不同的文件名
                        doc.save('pdf_' + new Date().getTime() + '.pdf');
                    };
                    //删除复制出来的div
                    copyDom.remove();
                },
                background: "#fff",
                //这里给生成的图片默认背景，不然的话，如果你的html根节点没设置背景的话，会用黑色填充。
                allowTaint: true //避免一些不识别的图片干扰，默认为false，遇到不识别的图片干扰则会停止处理html2canvas
            });
        });
    });

    function svg2canvas(targetElem) {
        var svgElem = targetElem.find('svg');
        svgElem.each(function (index, node) {
            var parentNode = node.parentNode;
            //由于现在的IE不支持直接对svg标签node取内容，所以需要在当前标签外面套一层div，通过外层div的innerHTML属性来获取
            var tempNode = document.createElement('div');
            tempNode.appendChild(node);
            var svg = tempNode.innerHTML;
            var canvas = document.createElement('canvas');
            //转换
            canvg(canvas, svg);
            parentNode.appendChild(canvas);
        });
    }

    function glyphicons2canvas(targetElem, fontClassName, fontFamilyName) {
        var iconElems = targetElem.find('.' + fontClassName);
        iconElems.each(function (index, inconNode) {
            var fontSize = $(inconNode).css("font-size");
            var iconColor = $(inconNode).css("color");
            var styleContent = $(inconNode).attr('style');
            //去掉"px"
            fontSize = fontSize.replace("px", "");
            var charCode = getCharCodeByGlyphiconsName(iconName);
            var myCanvas = document.createElement('canvas');
            //把canva宽高各增加2是为了显示图标完整
            myCanvas.width = parseInt(fontSize) + 2;
            myCanvas.height = parseInt(fontSize) + 2;
            myCanvas.style = styleContent;
            var ctx = myCanvas.getContext('2d');
            //设置绘图内容的颜色
            ctx.fillStyle = iconColor;
            //设置绘图的字体大小以及font-family的名字
            ctx.font = fontSize + 'px ' + fontFamilyName;
            ctx.fillText(String.fromCharCode(charCode), 1, parseInt(fontSize) + 1);
            $(inconNode).replaceWith(myCanvas);
        });
    }
    //根据glyphicons/glyphicon图标的类名获取到对应的char code
    function getCharCodeByGlyphiconsName(iconName) {
        switch (iconName) {
            case("glyphicons-resize-full"):
                return "0xE216";
            case ("glyphicons-chevron-left"):
                return "0xE225";
            default:
                return "";
        }
    }
</script>