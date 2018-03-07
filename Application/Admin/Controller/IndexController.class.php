<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Base2Controller {
    public function index(){
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }
	public function infolist(){
		$zhuyi=M('zhuyi');
		
		$maxId = $zhuyi->max('id');
		if($maxId >=6 ){
			for($i=0; $i<6; $i++){
				$zhuyiAll[] = $zhuyi->where(array('id'=>($maxId)-$i))->select()[0];
				$this->assign('zhuyiAll', $zhuyiAll);
			}
		}else{
			$zhuyiAll = $zhuyi->select();
			$this->assign('zhuyiAll', $zhuyiAll);
			//var_dump($zhuyiAll);exit();
		}
		$this->display();
	}
	
    public function sendinfo(){
		$zhuyi=M('zhuyi');
		
		$maxId = $zhuyi->max('id');
		if($maxId >=6 ){
			for($i=0; $i<6; $i++){
				$zhuyiAll[] = $zhuyi->where(array('id'=>($maxId)-$i))->select()[0];
				$this->assign('zhuyiAll', $zhuyiAll);
			}
		}else{
			$zhuyiAll = $zhuyi->select();
			$this->assign('zhuyiAll', $zhuyiAll);
			//var_dump($zhuyiAll);exit();
		}
		
			//var_dump($zhuyiAll2);exit();
			
		
		//var_dump($zhuyiAll);exit();
		//var_dump($zhuyiAll);exit();
		//数据格式 ： $zhuyiAll[0]['id'] = 4, $zhuyiAll[0]['title'] 。。。。
		
        
        if(IS_POST){
		
		$data['title']=I('post.title');
		$data['detail']=I('post.detail');
		$test=$zhuyi->add($data);
		$this->success('发布成功');
		//var_dump($test);exit();
		}else{
        $this->display();
		}
    }
    public function shenhe(){
		
		$keyword1 = I('post.year').I('post.month'); //日期
		$this->assign('year',I('post.year'));
		$this->assign('month',I('post.month'));
		//$keyword1 = I('post.keyword1');
		//$keyword2 = I('post.keyword2');$this->display(); var_dump($keyword1,$keyword2);exit();
		$keyword2 = I('post.real_account'); //$this->display(); var_dump($keyword2);exit(); //真实姓名
		$this->assign('real_account',I('post.real_account'));
		$where['date']  = array('like',"%{$keyword1}%");
		$where['real_account']  = array('like',"%{$keyword2}%");
		
		$User = M('user');
		$users = $User->where($where)->select();
		 
		 if($users['pass'] == 1){
				$users['pass'] = '是';
			}else{
				$users['pass'] = '否';
			}
			
			$this->assign('flag',$users['pass']);
		$this->assign('users',$users);
		//var_dump($users);
		
		
        $this->display();
		
	}
    public function resetpwd(){
    if(IS_POST){
	$admin = M("admin");
	
	$olddata=$admin->field(password)->where("id=1")->select()[0][password]; //查询旧密码
	$pwd=I('post.pwd');
	$pwd=md5($pwd);	//接收旧密码输入	
	//var_dump($olddata);var_dump($pwd);exit();
	$data['password'] = md5(I('post.password'));
	if($olddata==$pwd){
		
		$reset = $admin->where('id=1')->save($data);
		$this ->success("编辑成功",U('Load/load'));
		 
		}else{
			$error = M('admin')->getError();
			$this->error($error ? $error : "操作失败！");
}
}
$this->display();
    }
    public function adduser(){
    	$upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     8145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
            $upload->savePath  =     ''; // 设置附件上传（子）目录
		    $upload->subName   =    I('post.card');
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
			
			$datas['account'] = I('post.name');
			$member = M('user')->where($datas)->find();	
			//var_dump($member);exit();
			if($profession=="无职称"&&$major=="非相关专业"&&$education=="中专以下"){
				$this->error("您的职称、专业、学历均达不到要求！");
			}elseif($member){
				$this->error("此账号已被注册");
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
				//
				$this->success("添加成功",U('Index/shenhe'));
			}
		}
		else{
		     $this->display();	
		}
    	
    }
	public function checkuser(){
		//因为账号不重复，所以传入一个账号名就行
		$account = I('post.account');
		//var_dump($account);exit();
		$User = M('user');
		$maxId = $User->where(array('account'=> $account))->max('id');
		$UserInfo = $User->where(array('id'=> $maxId))->select()[0];
		//$UserInfo['real_name'],$userInfo['id_card']
		//新建照片
		//$image = new \Think\Image();
		   
			//$n1= $UserInfo['id_card']."/".$UserInfo['real_account']."照片.jpg";
			//var_dump(file_get_contents($n1));exit();
			//$n2= '../../../Uploads/' .$UserInfo['id_card']."/".$UserInfo['real_account']."身份证正面.jpg";
			//$n3= '../../../Uploads/' .$UserInfo['id_card']."/".$UserInfo['real_account']."身份证背面.jpg";
			//$n4= '../../../Uploads/' .$UserInfo['id_card']."/".$UserInfo['real_account']."毕业证.jpg";
			//$n5= '../../../Uploads/' .$UserInfo['id_card']."/".$UserInfo['real_account']."职称证.jpg";
			//$n6= '../../../Uploads/' .$UserInfo['id_card']."/".$UserInfo['real_account']."从业社保证明.jpg";
			//$info=$image->open("./Uploads/".$UserInfo['id_card']."/1.jpg")->save("./Uploads/".$UserInfo['id_card']."/2.jpg");var_dump($info);exit();
			//$image->open($n2);//->save('./2.jpg');
			//$image->open($n3);//->save('./3.jpg');
			//$image->open($n4);//->save('./4.jpg');
			//$image->open($n5);//->save('./5.jpg');
			//$image->open($n6);//->save('./6.jpg');

		//
		$src1="../../../Uploads/".$UserInfo['id_card']."/1.jpg";
		$src2="../../../Uploads/".$UserInfo['id_card']."/2.jpg";
		$src3="../../../Uploads/".$UserInfo['id_card']."/3.jpg";
		$src4="../../../Uploads/".$UserInfo['id_card']."/4.jpg";
		$src5="../../../Uploads/".$UserInfo['id_card']."/5.jpg";
		$src6="../../../Uploads/".$UserInfo['id_card']."/6.jpg";
		
		// 直接绑定用户所有信息
		$this->assign('src1', $src1);
		$this->assign('src2', $src2);
		$this->assign('src3', $src3);
		$this->assign('src4', $src4);
		$this->assign('src5', $src5);
		$this->assign('src6', $src6);
		$this->assign('userDetail', $UserInfo);
		// html位置
		$this->display();
	}
	//
	public function tijiao(){
		$account = I('post.account');
		$User = M('user');
		$maxId = $User->where(array('account'=> $account))->max('id');
		if(IS_POST)
		{
			$shenhe=I('post.result');
			
			if($shenhe=="审核通过")         //中文原因
			{
				$pass1['pass'] = "1";
				$pass = $User->where(array('id'=>$maxId,'account'=>$account))->save($pass1);
				//var_dump($pass);exit();
				
				$this->success("提交成功",U('Index/shenhe'));
			}
			else if($shenhe=='审核不通过')
			{
				$User->reason =I('post.reason');
				$no = $User->where(array('id'=>$maxId))->save();
				$this->success("提交成功",U('Index/shenhe'));
				
			}
		}
		//$this->success('Index:checkuser');
	}
	//审核页面 的删除用户
	public function delet(){
		//因为账号不重复，所以传入一个账号名就行
		$account = I('post.account');
		$User = M('user');
		$status = $User->where(array('account'=> $account))->delete();
		
		if( $status ){
			$this->success("删除成功");
		}else{
			$this->error("删除失败");
		}
	}
	public function checkhegezheng(){
		if(IS_POST){
		$date=I('post.year').I('post.month');
		$this->assign('year',I('post.year'));
		$this->assign('month',I('post.month'));
		//var_dump($date);exit();
		if(!$date){
			$where = array('score'=>'是');
		}else{
			$where = array('date'=>$date, 'score'=>'是');
		}
		//var_dump($where);exit();
		$Users = M('user');
		$userInfos = $Users->where($where)->select();
		$Exams = M('exam');
		$examInfos = $Exams->select();
		//var_dump($examInfos);exit();
		$count = 0 ;
		// 真实姓名、日期、科目、合格证颁发日期、到期日期、提醒日期
		foreach($userInfos as $user){
			//var_dump($user);exit();
			foreach($examInfos as $exam){
				// date、group 判断具体考试
				if(($user['date'] == substr($exam['time'], 0, 6))&&($user['group'] == $exam['group'])){
					
					$hegezheng[$count]['real_account'] = $user['real_account'];
					$hegezheng[$count]['date']         = substr($user['date'], 0, 4).'年'.substr($user['date'], 4, 2).'月';
					$hegezheng[$count]['subject']      = $exam['subject'];
					$hegezheng[$count]['time']         = substr($exam['time'], 0, 4).'年'.substr($exam['time'], 4, 2).'月'.substr($exam['time'], 6, 2).'日';
					$end_date                          = strval(intval(substr($exam['time'], 0, 8)) + 30000 - 1);
					$hegezheng[$count]['end_date']     = substr($end_date, 0, 4).'年'.substr($end_date, 4, 2).'月'.substr($end_date, 6, 2).'日';
					$alert_date                        = strval(intval($user['date']) + 300 - 3);
					$hegezheng[$count]['alert_date']   = substr($alert_date, 0, 4).'年'.substr($alert_date, 4, 2).'月';
					$count++;
					//var_dump($exam);exit();
				}
				
			}
			
		}
		//var_dump($hegezheng);exit();
		$this->assign('hegezheng', $hegezheng);
		// html 路径
		$this->display();
		}else{
			$this->display();
		}
	}

    
}