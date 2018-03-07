<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends BaseController {
	public function user()
	{   
	//个人资料页面
	    $where['account'] = session('account');
	    $where['real_account'] = session('username');
	    $this->userinfo=$userinfo=M('user')->where($where)->select();
		//dump($userinfo);
		$this->display();
	}
	
	//报名通知栏
	public function tongzhi(){
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
		
        $this->display();
		
	}
	public function baoming(){
		//$this->examtell=$examtell=M('notice')->select();
		//$this->assign("baoming",0);
		$index=M('notice');
		$datemax=$index->field("max(id)")->select()[0]['max(id)'];    //通知公告的显示
		$newdate=$index->where(array('id'=>$datemax))->select();   //notice最新日期
		$indexx=M('user');
		$datemaxx=$indexx->where(array('account'=>I('session.account')))->max('id');    //通知公告的显示
		$newdatee=$indexx->where(array('id'=>$datemaxx,'account'=>I('session.account')))->select();//user最新日期
		if(!$newdatee[0][date])
		{
			$data = array(
	        'date'=>$newdate[0][date],
	        'subject'=>$newdate[0][subject],
			'flag' =>$newdatee[0][flag]
			);
		}
		else{
			if($newdatee[0][date]==$newdate[0][date])
			{
				$data = array(
	        'date'=>$newdate[0][date],
	        'subject'=>$newdate[0][subject],
			'flag' =>"1"
	                 );
			}
			else{
				$data = array(
	        'date'=>$newdate[0][date],
	        'subject'=>$newdate[0][subject],
			'flag' =>"0"
	                 );
			}

		
			
			
		}
		
		
			

		
		$this->assign('subject', $data[subject]);
       // echo "$date";		
	    $this->assign('baoming',$data[flag]);
		//var_dump($data[flag]);
		$this->assign('date', $data[date]);
		$this->assign('date', $data[date]);
		//报名按钮
		if(IS_POST){
			if(!$newdatee[0][pass]){
				$this->error("您还未通过审核");
			}else{
			$date1 = array(
	        'date'=>I('post.date'),
			'flag'=>I('post.flag')
			);
			$User = M("user");
		$u_data=array(
			'date'=>I('date'),
			'account'=>I("account"),
			'password'=>I("password"),
			'real_account'=>I("real_account"),
			
			'sex'=>I("sex"),
			'birth'=>I("birth"),
			'id_card'=>I("id_card"),
			'profession'=>I("profession"),
			'school'=>I("school"),
			'major'=>I("major"),
			'education'=>I("education"),
			'graduate'=>I("graduate"),
			'work_address'=>I("work_address"),
			'phone'=>I("phone"),
			'addr'=>I("addr"),
			'post_address'=>I("post_address"),
			'tel_num'=>I("tel_num"),
			'mail'=>I("mail"),
			'path'=>I("path"),
			'pass'=>I("pass"),
			
		);
		$max=$User->field("max(id)")->where(array('account'=>I('session.account')))->select()[0]['max(id)'];
		$u_at=$User->where(array('account'=>I('session.account'),'id'=>$max))->field(array(
			
			'account',
			'password',
			'real_account',
			'sex',
			'birth',
			'id_card',
			'profession',
			'school',
			'major',
			'education',
			'graduate',
			'work_address',
			'phone',
			'addr',
			'post_address',
			'tel_num',
			'mail',
			'path',
			'pass',
			
		))->select();//var_dump($u_at);
		/*$date1 = array(
	        'date'=>I('post.date'),
			'flag'=>I('post.flag')
			);*/
		
		foreach ($u_at as $r){
			$aa['date']=$date1['date'];
			$aa['flag']=$date1['flag'];
			$aa['account']=$r['account'];
			$aa['password']=$r['password'];
			$aa['real_account']=$r['real_account'];
			$aa['sex']=$r['sex'];
			$aa['birth']=$r['birth'];
			$aa['id_card']=$r['id_card'];
			$aa['profession']=$r['profession'];
			$aa['school']=$r['school'];
			$aa['major']=$r['major'];
			$aa['education']=$r['education'];
			$aa['graduate']=$r['graduate'];
			$aa['work_address']=$r['work_address'];
			$aa['phone']=$r['phone'];
			$aa['addr']=$r['addr'];
			$aa['post_address']=$r['post_address'];
			$aa['tel_num']=$r['tel_num'];
			$aa['mail']=$r['mail'];
			$aa['path']=$r['path'];
			$aa['pass']=$r['pass'];
			
			$test=$User->data($u_data)->add($aa);
			
			$this->success("报名成功");
			
			
}//baoming
       
        
		
		}}
		else{
			$this->display();
		}
		
	}
	public function shenhe(){
		
		//$account = I('post.account');
		$User = M('user');
		$notice=M('notice');
		$maxId = $User->where(array('account'=>I('session.account')))->max('id');
		$maxId2 = $notice->max('id');
		$date=$notice->where(array('id'=>$maxId2))->field('date')->select()[0][date];
		$subject=$notice->where(array('id'=>$maxId2))->field('subject')->select()[0][subject];
		$pass=$User->where(array('id'=>$maxId))->field('pass')->select()[0][pass];
		$reason=$User->where(array('id'=>$maxId))->field('reason')->select()[0][reason];
		$this->assign('date', $date);
		$this->assign('subject', $subject);
		$this->assign('pass', $pass);
		$this->assign('reason', $reason);

			//照片上传
		    $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     8145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
            $upload->savePath  =     ''; // 设置附件上传（子）目录
		    $upload->subName   =    I('session.id_card');
		    $upload->replace   =    'true';
			//$upload->saveName =     '';
           // $info=$upload->upload();
			//var_dump($info);
			//if(!$exts){
				//$this->success("上传文件不合法，请上传图片");
			 //}
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
			$where['id']=I('session.userid');
			$update['path']=$bigimg;
			M('user')->where($where)->save($update);
            $this->display();
	}
	public function ziliao(){
	$messeage = M("user");
	$max=$messeage->field("max(id)")->where(array('account'=>I('session.account')))->select()[0]['max(id)'];    ///显示之前信息
	$account=$messeage->where(array('id'=>$max))->select()[0][account];
	$real_account=$messeage->where(array('id'=>$max))->select()[0][real_account];
	$sex=$messeage->where(array('id'=>$max))->select()[0][sex];
	$birth=$messeage->where(array('id'=>$max))->select()[0][birth];
	$id_card=$messeage->where(array('id'=>$max))->select()[0][id_card];
	$profession=$messeage->where(array('id'=>$max))->select()[0][profession];
	$school=$messeage->where(array('id'=>$max))->select()[0][school];
	$major=$messeage->where(array('id'=>$max))->select()[0][major];
	$education=$messeage->where(array('id'=>$max))->select()[0][education];
	$graduate=$messeage->where(array('id'=>$max))->select()[0][graduate];
	$work_address=$messeage->where(array('id'=>$max))->select()[0][work_address];
	$phone=$messeage->where(array('id'=>$max))->select()[0][phone];
	$post_address=$messeage->where(array('id'=>$max))->select()[0][post_address];
	$mail=$messeage->where(array('id'=>$max))->select()[0][mail];
	$addr=$messeage->where(array('id'=>$max))->select()[0][addr];
	$this->assign('account', $account);
	$this->assign('real_account', $real_account);
	$this->assign('sex', $sex);
	$this->assign('birth', $birth);
	$this->assign('id_card', $id_card);
	$this->assign('profession', $profession);
	$this->assign('school', $school);
	$this->assign('major', $major);
	$this->assign('education', $education);
	$this->assign('graduate', $graduate);
	$this->assign('work_address', $work_address);
	$this->assign('phone', $phone);
	$this->assign('post_address', $post_address);
	$this->assign('mail', $mail);
	$this->assign('addr', $addr);
	//$this->display();
	if(IS_POST)///接收放到Post框通过post框再传回数据库
	{
		$date=array(
			//'real_account'=>I('post.real_account'),
			//'sex'=>I('post.sex'),
			//'birth'=>I('post.birthday'),
			//'id_card'=>I('post.card'),
			'profession'=>I('post.position'),
			'school'=>I('post.from'),
			'major'=>I('post.major'),
			'education'=>I('post.education'),
			//'graduate'=>I('post.graduate'),
			'work_address'=>I('post.workplace'),
			'phone'=>I('post.telephone'),
			//'post_address'=>I('post.post_address'),
			'mail'=>I('post.email'),
			'addr'=>I('post.address')			
			);
		
		
		$test=$messeage->where(array('id'=>$max))->save($date);
		$this->success("提交成功");
		
	}
	
		$this->display();
	}
	public function hegezheng(){
		$this->display();
	}
	public function gaimi(){
		if(IS_POST){
	$User = M("user");
	//where 为用户session
	$max=$User->field("max(id)")->where(array('account'=>I('session.account')))->select()[0]['max(id)'];
	$olddata=$User->field(password)->where(array('id'=>$max))->select()[0][password]; //查询旧密码
	//$this->assign('olddata',$olddata);
	$pwd=I('post.pwd');
	$pwd=md5($pwd);	//接收旧密码输入
	$data['password'] = md5(I('post.password'));
	if($olddata==$pwd){
		$reset = $User->where(array('id'=>$max))->save($data);
		$this ->success("编辑成功");
		
		}else{
			$error = M('user')->getError();
			$this->error($error ? $error : "操作失败！");
    }
            }else{
	            $this->display();
    }
		
	}
	public function printcard(){
		$card = M("user");
	$exam = M("exam");
	$max=$card->field("max(id)")->where(array('account'=>I('session.account')))->select()[0]['max(id)'];
	
		$date=$card->where(array('id'=>$max))->select()[0][date];
		$group=$card->where(array('id'=>$max))->select()[0][group];
		$seat_num=$card->where(array('id'=>$max))->select()[0][seat_num];
		$real_address=$exam->where(array('time'=>array('like',"{$date}%")))->select()[0]['real_address']; //地点
		$subject=$exam->where(array('time'=>array('like',"{$date}%")))->select()[0]['subject'];
		$time=$exam->where(array('time'=>array('like',"{$date}%")))->select()[0]['time'];
		$time=substr($time,0,4).'年'.substr($time,4,2).'月'.substr($time,6,2).'日'.substr($time,8,2).'时'.substr($time,10,2).'分至'.substr($time,12,2).'时'.substr($time,14,2).'分';
		$this->assign('account',I('session.account'));
		$this->assign('date', $date);
		$this->assign('sex', $sex);
		$this->assign('id_card', $id_card);
		$this->assign('group', $group);
		$this->assign('seat_num', $seat_num);
		$this->assign('work_address', $work_address);
		$this->assign('exam_card', $exam_card);
		$this->assign('real_address', $real_address);
		$this->assign('subject', $subject);
		$this->assign('time', $time);
		$this->display();
	}
    public function printcard2(){
	$image = new \Think\Image();
	$i=I('session.id_card');
	$u=I('session.username');
	$s="../../../Uploads/".$i."/1.jpg";
	$this->assign('aa',$s);
	$card = M("user");
	$exam = M("exam");
	$max=$card->field("max(id)")->where(array('account'=>I('session.account')))->select()[0]['max(id)'];
	$flag=$card->where(array('id'=>$max))->select()[0][flag];
	$pass=$card->where(array('id'=>$max))->select()[0][pass];
	if($flag==1&&$pass==1)
	{
		$date=$card->where(array('id'=>$max))->select()[0][date];
		$sex=$card->where(array('id'=>$max))->select()[0][sex];
		$id_card=$card->where(array('id'=>$max))->select()[0][id_card];
		$group=$card->where(array('id'=>$max))->select()[0][group];
		$seat_num=$card->where(array('id'=>$max))->select()[0][seat_num];
		$work_address=$card->where(array('id'=>$max))->select()[0][work_address];//单位
		$exam_card=$group.$date.$seat_num;//准考证号
		$real_address=$exam->where(array('time'=>array('like',"{$date}%")))->select()[0]['real_address']; //地点
		$subject=$exam->where(array('time'=>array('like',"{$date}%")))->select()[0]['subject'];
		$time=$exam->where(array('time'=>array('like',"{$date}%")))->select()[0]['time'];
		$time=substr($time,0,4).'年'.substr($time,4,2).'月'.substr($time,6,2).'日'.substr($time,8,2).':'.substr($time,10,2).'-'.substr($time,12,2).':'.substr($time,14,2);
		//var_dump(I('session.username'));exit();
		$this->assign('real_account',I('session.username'));
		$this->assign('date', $date);
		$this->assign('sex', $sex);
		$this->assign('id_card', $id_card);
		$this->assign('group', $group);
		$this->assign('seat_num', $seat_num);
		$this->assign('work_address', $work_address);
		$this->assign('exam_card', $exam_card);
		$this->assign('real_address', $real_address);
		$this->assign('subject', $subject);
		$this->assign('time', $time);
		$this->display();
	}
	else{
		//exit('<script>alert(\'未报名 !\')</script>');
		$this->error("未报名",U('User/baoming'));
	}
		
	}
	
	public function result(){
		$UserT = M('user');
		$ExamT = M('exam');
		// 记得改成session
		$userInfos = $UserT->where(array('account'=>I('session.account'), 'pass'=>1, 'flag'=>1))->select();
		$examInfos = $ExamT->select();
		$count = 0;
		
		foreach($userInfos as $user){
			foreach($examInfos as $exam){//	var_dump($exam);exit();
				if((substr($exam['time'], 0, 6) == $user['date'])&&($exam['group']==$user['group'])){
					$examHistory[$count]['subject'] = $exam['subject'];
					$examHistory[$count]['time']    = substr($exam['time'], 0, 4).'年'.
												substr($exam['time'], 4, 2).'月'.
												substr($exam['time'], 6, 2).'日';
					break;
				}
			}
			$examHistory[$count]['examNumber'] = $user['group'].$user['date'].$user['seat_num'];
			if($user['score'] == '是'){
				$examHistory[$count]['result'] = '合格';
			}else if($user['score'] == '否'){
				$examHistory[$count]['result'] = '不合格';
			}else{
				$examHistory[$count]['result'] = '成绩未录入';
			}
			$count++;
		}
		// 数据格式：$examHistory[0]['subject']、$examHistory[0]['result']、
		// $examHistory[0]['time']、$examHistory[0]['examNumber']
		$this->assign('examHistory', $examHistory);
		//dump($examHistory);
		//exit();
		$this->display();
	}
	public function printzs(){
		/*require("circleSeal.class.php");
		$seal = new \circleSeal('甘肃省气象局',75,9,24,0,0,20,0);
        $s=$seal->doImg();*/
		
		//
		$card = M("user");
		$exam = M("exam");
		$notice=M('notice');
		$max=$card->field("max(id)")->where(array('account'=>I('session.account')))->select()[0]['max(id)']; //用户最大id
		$score=$card->where(array('id'=>$max))->select()[0][score];
		$date=$card->where(array('id'=>$max))->select()[0][date]; //用户当年考试时间
		$max_date=$exam->field("max(id)")->select()[0]['max(id)'];//exam表当前最大id
		$max_notice=$notice->field("max(id)")->select()[0]['max(id)'];//notice表最大id
		$real_account=$card->where(array('id'=>$max))->select()[0]['real_account']; //用户真实姓名
		$time_1=$card->where(array('id'=>$max))->select()[0][date];
		$time_2=substr($time_1,0,4);   //显示的年
		$subject=$notice->where(array('id'=>$max_notice))->field('subject')->select();  //科目
		$real_time=$exam->where(array('id'=>$max_date))->select()[0][time];
		$mouth=substr($real_time,4,2);
		$day=substr($real_time,6,2);
		
		
		$time=$exam->field('time')->where(array('id'=>$max_date))->select()[0][time];
		$time2=substr($time,6,2);
		$time=substr($time,0,6);
		//var_dump($time2);exit;
		if($date==$time&&$score=="是"){   //考生考试 日期与exam中当年考生是同一批考试
				// 传递一个 account 即可
		$userA       = I('session.account');
		$Users       = M('user');
		$idMax       = $Users->where(array('account'=> $userA))->max('id');
		$currentUser = $Users->where(array('id'=> $idMax))->select()[0];
		$year        = substr($currentUser['date'], 0, 4);
		// 根据年份获取这一年所有的考试信息
		$Exams   = M('exam');
		$exams   = $Exams->select();
		
		foreach($exams as $e){
			if($year == substr($e['time'], 0, 4)){
				$collectExams[] = $e;
				//$examNum++;
			}
		}
		// 根据 user 自己的 date 和 group 去获取到底考的那一场
		// 计算其中一个月的考试次数
		$examCount = 0;
		foreach($collectExams as $e){
			if( $currentUser['date'] == substr($e['time'], 0, 6)){
				if($currentUser['group'] == $e['group']){
					$user_exam = $e;
				}
			}else{
				$other_exam = $e;
				$examCount ++;
				
			}
		}
		// 比较两个月的考试时间，如果 user 在月数较大的一方，那么
		// 加上 $examNum, 否则总场次就是 group 的值
		if(substr($other_exam['time'], 0, 6) < substr($user_exam['time'], 0, 6)){
			$examNumber = $user_exam['group'] + $examCount;
		}else{
			$examNumber = $user_exam['group'];
		}
		if($examNumber<10){
			$examNumber="00".$examNumber;
		}else{
			$examNumber="0".$examNumber;
		}
		
			$later_year=$time_2+'3';
			$later_day=$day-'1';
			
			$image = new \Think\Image();
	        $i=I('session.id_card');
	        $u=I('session.username');
	        $s="../../../Uploads/".$i."/1.jpg";
			$this->assign('s', $s);
			$zhengshu="NO.GSJ".$time.$time2.$examNumber."K";//证书编码
			$this->assign('zhengshu', $zhengshu);                  
			$this->assign('real_account', $real_account);  //真实姓名
			$this->assign('time_2', $time_2);			//年
			$this->assign('mouth', $mouth);				//月
			$this->assign('day', $day);			//日
			$this->assign('later_year', $later_year);  //截止年
			$this->assign('later_day', $later_day);   //截止日
			$this->display();
			
			
		}
		//$this->display();
	}

	
}
?>