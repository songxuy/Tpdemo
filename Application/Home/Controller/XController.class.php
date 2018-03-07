<?php
namespace Home\Controller;
use Think\Controller;
class XController extends Controller {
	public function x(){
	$upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     8145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
            $upload->savePath  =     ''; // 设置附件上传（子）目录
		    $upload->subName   =    '';
		    $upload->saveName =     '';
            $info=$upload->upload();
			$image = new \Think\Image();
			$info=$image->open('./Uploads/510107199511031278/周奕照片.jpg');
			var_dump($info);
			$this->display();
	}
			
}