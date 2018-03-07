<?php
/*
 * 中文圆形印章类
 * @author lkk/lianq.net
 * @create on 10:03 2012-5-29
 * @example:
 * 	$seal = new circleSeal('你我他坐站走东西南北中',75,6,24,0,0,16,40);
 *	$seal->doImg();
 */
 
class circleSeal {
	private $sealString;	//印章字符
	private $strMaxLeng;	//最大字符长度
	private $sealRadius;	//印章半径
	private $rimWidth;		//边框厚度
	private $innerRadius;	//内圆半径
	private $startRadius;	//五角星半径
	private $startAngle;	//五角星倾斜角度
	private $backGround;	//印章颜色
	private $centerDot;		//圆心坐标
  	private $img;        	//图形资源句柄
  	private $font;        	//指定的字体
  	private $fontSize;    	//指定字体大小
	private $width;			//图片宽度
	private $height;		//图片高度
	private $points;		//五角星各点坐标
	private $charRadius;	//字符串半径
	private $charAngle;		//字符串倾斜角度
	private $spacing;		//字符间隔角度
	
	//构造方法
	public function __construct($str ='', $rad = 75, $rmwidth = 6, $strad = 24, $stang = 0, $crang = 0, $fsize = 16, $inrad =0){
		$this->sealString	= empty($str) ? "百家筝鸣教育集团" : $str;
		$this->strMaxLeng	= 12;
		$this->sealRadius	= $rad;
		$this->rimWidth		= $rmwidth;
		$this->startRadius	= $strad;
		$this->startAngle	= $stang;
		$this->charAngle	= $crang;
		$this->centerDot	= array('x'=>$rad, 'y'=>$rad);
		$this->font			= dirname(__FILE__) .'/simkai.ttf';
		$this->fontSize		= $fsize;
		$this->innerRadius	= $inrad;	//默认0,没有
		$this->spacing		= 1;
	}
	
	//创建图片资源
	private function createImg(){
		$this->width		= 2 * $this->sealRadius;
		$this->height		= 2 * $this->sealRadius;
		$this->img			= imagecreate($this->width, $this->height);
		imagecolorresolvealpha($this->img,255,255,255,127);
		$this->backGround	= imagecolorallocate($this->img,255,0,0);
	}
	
	//画印章边框
	private function drawRim(){
		for($i=0;$i<$this->rimWidth;$i++){
			imagearc($this->img,$this->centerDot['x'],$this->centerDot['y'],$this->width - $i,$this->height - $i,0,360,$this->backGround);
		}
	}
	
	//画内圆
	private function drawInnerCircle(){
		imagearc($this->img,$this->centerDot['x'],$this->centerDot['y'],2*$this->innerRadius,2*$this->innerRadius,0,360,$this->backGround);
	}
	
	//画字符串
	private function drawString(){
		//编码处理
		$charset = mb_detect_encoding($this->sealString);
		if($charset != 'UTF-8'){
			$this->sealString = mb_convert_encoding($this->sealString, 'UTF-8', 'GBK');
		}
		
		//相关计量
		$this->charRadius = $this->sealRadius - $this->rimWidth - $this->fontSize;	//字符串半径
		$leng	= mb_strlen($this->sealString,'utf8');	//字符串长度
		if($leng > $this->strMaxLeng) $leng = $this->strMaxLeng;
		$avgAngle	= 360 / ($this->strMaxLeng);	//平均字符倾斜度
		
		//拆分并写入字符串
		$words	= array();	//字符数组
		for($i=0;$i<$leng;$i++){
			$words[] = mb_substr($this->sealString,$i,1,'utf8');
			$r = 630 + $this->charAngle + $avgAngle*($i - $leng/2) + $this->spacing*($i-1);		//坐标角度
			$R = 720 - $this->charAngle + $avgAngle*($leng-2*$i-1)/2 + $this->spacing*(1-$i);	//字符角度
			$x = $this->centerDot['x'] + $this->charRadius * cos(deg2rad($r));	//字符的x坐标
			$y = $this->centerDot['y'] + $this->charRadius * sin(deg2rad($r));	//字符的y坐标
			imagettftext($this->img, $this->fontSize, $R, $x, $y, $this->backGround, $this->font, $words[$i]);		
		}
	}	
	
	//画五角星
	private function drawStart(){
		$ang_out = 18 + $this->startAngle;
		$ang_in  = 56 + $this->startAngle;
		$rad_out = $this->startRadius;
		$rad_in	 = $rad_out * 0.382;
		for($i=0;$i<5;$i++){
			//五个顶点坐标
			$this->points[] = $rad_out * cos(2*M_PI/5*$i - deg2rad($ang_out)) + $this->centerDot['x'];
			$this->points[] = $rad_out * sin(2*M_PI/5*$i - deg2rad($ang_out)) + $this->centerDot['y'];
			
			//内凹的点坐标
			$this->points[] = $rad_in * cos(2*M_PI/5*($i+1) - deg2rad($ang_in)) + $this->centerDot['x'];
			$this->points[] = $rad_in * sin(2*M_PI/5*($i+1) - deg2rad($ang_in)) + $this->centerDot['y'];
		}
		imagefilledpolygon($this->img, $this->points, 10, $this->backGround);
	}
	
	//输出
	private function outPut(){
		header('Content-type:image/png');
   		imagepng($this->img);
   		imagedestroy($this->img);
  	}
	
	//对外生成
	public function doImg(){
		$this->createImg();
		$this->drawRim();
		$this->drawInnerCircle();
		$this->drawString();
		$this->drawStart();
		$this->outPut();
	}
}