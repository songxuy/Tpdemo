<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
  <title>下载准考证</title>
  <script type="text/javascript" src="http://localhost/Application/Home/Public/js/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="http://localhost/Application/Home/Public/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="http://localhost/Application/Home/Public/js/canvg2.js"></script>
    <script type="text/javascript" src="http://localhost/Application/Home/Public/js/html2canvas-0.4.1.js"></script>
    <script type="text/javascript" src="http://localhost/Application/Home/Public/js/jspdf.min.js"></script>
  <link rel="stylesheet" type="text/css" href="http://localhost/Application/Home/Public/bootstrap/css/bootstrap.min.css"/>
</head>
<style type="text/css">
  * { margin: 0; padding: 0 }
  .contan{
    text-align: center;
    margin: 20px;
    background-color: #ffffff;
}
#pdfContainer{
    border: 1px solid #000000;
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
    <div class="col-sm-6 col-sm-offset-3">
      <div id="pdfContainer" style="width:600px;height:600px;" class="contan">
        <table style="text-align: center;height:553px;width:566px;margin-left:15px;margin-top:20px;" border="2" bordercolor="black">
          <tr style="width:566px;height:60px;">
            <td colspan="5" class="h3 text-center">准考证</td>
          </tr>
          <tr style="width:566px;height: 45px;">
            <td style="width:60px;">姓名</td>
            <td><?php echo I('session.username') ?></td>
            <td style="width:60px;">性别</td>
            <td><?=$sex?></td>
            <td rowspan="3"><img src="<?=$aa?>" style="width:116px;height:165px;"></td>
          </tr>
          <tr style="width:566px;height: 45px;">
            <td>身份证号</td>
            <td colspan="3"><?=$id_card?></td>
          </tr>
          <tr style="width:566px;height: 45px;">
            <td>准考证号</td>
            <td colspan="3"><?=$exam_card?></td>
          </tr>
          <tr style="width:566px;height: 45px;">
            <td>单位</td>
            <td colspan="4"><?=$work_address?></td>
          </tr>
          <tr style="width:566px;height: 45px;">
            <td>考试地点</td>
            <td colspan="4"><?=$real_address?></td>
          </tr>
          <tr style="width:566px;height: 45px;">
            <td>考场</td>
            <td colspan="2"><?=$group?></td>
            <td>座位号</td>
            <td><?=$seat_num?></td>
          </tr>
          <tr style="width:566px;height: 45px;">
            <td>考试时间</td>
            <td colspan="2"><?=$time?></td>
            <td>考试内容</td>
            <td><?=$subject?></td>
          </tr>
          <tr>
            <td colspan="5" style="text-align: left;" valign="top"><span class="h4" style="font-weight: bold;">考生须知</span><br>
            1.考生凭准考证和本人身份证（或相关有效证件参加考试）,缺一不可。<br>
            2.考生在考前十五分钟内进入考场，按准考证对号入座；<br>
            3.考生开考后三十分钟后方可离开考场;迟到三十分钟以上者不得进入考场。<br>
            4.考生不得将与考试有关书籍、资料带入考场；不得将手机等通讯工具带入考场。<br>
            5.开考信号发出后方可开始答题；考试终了信号发出后应立即停止答题并退场。<br>
            6.凡在考场内发现作弊行为，本次考试作零分处理。<br>
            </td>
          </tr>
        </table>
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
                        //此处需要注意，pdf横置和竖置两个属性，需要根据宽高的比例来调整，不然会出现显示不完全的问题
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