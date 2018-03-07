<?php
namespace Home\Controller;
use Think\Controller;
class LoadController extends Controller {
	public function load()
	{
		if(!IS_POST){
              $this->display();  
            }
        else{
			$model=M();
            $data['account'] = I('post.name');
            $data['password'] = md5(I('post.password'));
            $member = M('user')->where($data)->find();
            if($member){
                session('userid',$member['id']);
                session('username',$member['real_account']);
				session('account',$member['account']);
				session('id_card',$member['id_card']);
				//echo $member['real_account'];
                $this->success("登陆成功",U('User/tongzhi'));
            }else
			    {
                $this->error("账号或密码错误");
                }
            }
	}
	public function rigist()
	{
		    $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     8145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
            $upload->savePath  =     ''; // 设置附件上传（子）目录
		    $upload->subName   =    I('post.card');
		    $upload->replace   =     'true';
		   // $upload->saveName =     '' ;
		   if($_FILES['upload1']){
			   $upload->saveName =     '1';
			    $info   =   $upload->uploadOne($_FILES['upload1']);
		   }
		   if($_FILES['upload2']){
			   $upload->saveName =     '2';
			   $info   =   $upload->uploadOne($_FILES['upload2']);
		   }
		   if($_FILES['upload3']){
			   $upload->saveName =     '3';
			   $info   =   $upload->uploadOne($_FILES['upload3']);
		   }
		   if($_FILES['upload4']){
			   $upload->saveName =     '4';
			   $info   =   $upload->uploadOne($_FILES['upload4']);
		   }
		   if($_FILES['upload5']){
			   $upload->saveName =     '5';
			   $info   =   $upload->uploadOne($_FILES['upload5']);
		   }
		   if($_FILES['upload6']){
			   $upload->saveName =     '6';
			   $info   =   $upload->uploadOne($_FILES['upload6']);
		   }
            
			foreach($info as $file){
                $bigimg =$file['savepath'];
			}
				$model = M('user');
			
			
            //同名用户名验证
			$datas['account'] = I('post.name');
			$member = M('user')->where($datas)->find();	
			$datac['id_card'] = I('post.card');
			$member2 = M('user')->where($datac)->find();
		if(IS_POST){
			$model=M();
			$account=I('post.name');//用户名
			$password=md5(I('post.password'));
			$real_account=I('post.username');//真实姓名
			$sex=I('post.sex');
			$birth=I('post.birthday');
			$id_card=I('post.card');
			$profession=I('post.profession');
			$school=I('post.from');
			$major=I('post.major');
			$education=I('post.education');
			$graduate=I('post.graduate');
			$work_address=I('post.workplace');
			$phone=I('post.telephone');
			//$experience=I('post.experience');防雷经验3年
			$addr=I('post.address');//通信地址
			$post_address=I('post.ecode');//邮编
			$tel_num=I('post.tel_num');//固定电话
			$mail=I('post.email');
			//照片重命名
			//$image = new \Think\Image();
			//$n1=$id_card.'/'.$real_account."照片";
			//$n2=$id_card.'/'.$real_account."身份证正面";
			//$n3=$id_card.'/'.$real_account."身份证背面";
			//$n4=$id_card.'/'.$real_account."毕业证";
			//$n5=$id_card.'/'.$real_account."职称证";
			//$n6=$id_card.'/'.$real_account."从业社保证明";
			//$image->open('./1.jpg');$image->save('./2.jpg');
			//$image->open('./'.$n1.'.jpg');$image->save('./1.jpg');
			//$image->open('./'.$n2.'.jpg');$image->save('./2.jpg');
			//$image->open('./'.$n3.'.jpg');$image->save('./3.jpg');
			//$image->open('./'.$n4.'.jpg');$image->save('./4.jpg');
			//$image->open('./'.$n5.'.jpg');$image->save('./5.jpg');
			//$image->open('./'.$n6.'.jpg');$image->save('./6.jpg');
			//
			if($profession=="无职称"&&$major=="非相关专业"&&$education=="中专以下"){
				$this->error("您的职称、专业、学历均达不到要求！");
			}if($member){
				$this->error("此账号已被注册");
			}if($member2){
				$this->error("此身份证已被注册");
			}
			else{
				$data=array(
				'account'=>$account,
				'password'=>$password,
				'real_account'=>$real_account,
				'sex'=>$sex,
				'birth'=>$birth,
				'id_card'=>$id_card,
				'profession'=>$profession,
				'school'=>$school,
				'major'=>$major,
				'education'=>$education,
				'graduate'=>$graduate,
				'work_address'=>$work_address,
				'phone'=>$phone,
				'addr'=>$addr,
				'post_address'=>$post_address,
				'tel_num'=>$tel_num,
				'mail'=>$mail,
				'path'=>$bigimg,
				);
				M('user')->add($data);
				$this->success("注册成功",U('Load/load'));
			}
		}
		else{
		     $this->display();	
		}
	}
}
?>