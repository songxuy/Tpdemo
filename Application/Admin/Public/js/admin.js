$(function(){
    $(".pbtn").click(function(){
    location.href="print.html"/*tpa=http://***index.html*/;
    });
    
    $('.navMenu>li a').eq(0).addClass("active");
    $('.ss_nav .div2>div').hide()
    $('.ss_nav .div1>div').eq(0).show().siblings().hide();
    $('.navMenu>li').click(function(){
      var oo=$(this).index();
      if(oo==0||oo==1){
        $('.ss_nav .div1>div').eq(oo).show().siblings().hide();
        $('.ss_nav .div1>div').eq(oo).find('div').show()
        $('.ss_nav .div2>div').hide()
      }else if(oo>2){
        $('.ss_nav .div1>div').eq(oo-1).show().siblings().hide();
        $('.ss_nav .div2>div').hide()
      }
    })
    $('.navMenu .sub-menu>li').click(function(){
      var oo2=$(this).index();
      $('.ss_nav .div1>div').hide();
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
  function previewImage(file,index)
        {
          var MAXWIDTH  = 50; 
          var MAXHEIGHT = 50;
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