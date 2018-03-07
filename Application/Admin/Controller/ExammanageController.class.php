<?php
namespace Admin\Controller;
use Think\Controller;
/*
 * 考试管理
*/
class ExammanageController extends Base2Controller{
	// 默认显示 考试列表
	public function kaoshilist(){
		
		// 从 exam 表中获取所有信息
		$Exam = M('exam');
		$Exams = $Exam->select();
		$count = 0;
		foreach($Exams as $k=>$e){
			$examInfo[$count]['date']    = substr($e['time'], 0, 4).'年'.substr($e['time'], 4, 2).'月';
			$examInfo[$count]['time']    = substr($e['time'], 8, 2).':'.substr($e['time'],10,2).'-'.substr($e['time'],12,2).':'.substr($e['time'],14,2);
			$examInfo[$count]['address'] = $e['real_address'];
			$examInfo[$count]['subject'] = $e['subject'];
			$examInfo[$count]['status']  = $e['status'];
			$count++;
		}
		// 数据格式：$examInfo[0]['date']、$examInfo[0]['time']....
		$this->assign('examInfo', $examInfo);
		// html 地址
		$this->display();
	}
	
	
	/*
	 * 成绩查询
	 */
	public function chaxunchengji(){
		// 只需要接受一个日期就行，xxxx 年 xx 月 ，必须填写年月
		// 接受数据格式：201705
		if(IS_POST){
		$postTime = I('post.year').I('post.month');
		$this->assign('year',I('post.year'));
		$this->assign('month',I('post.month'));
		//var_dump($postTime);exit();
		
		// 查询 user 表中 date 为 201705 的所有用户成绩
		// 输出：考试date、用户姓名、身份证号、考试科目、考试成绩（前台判断分数是否为通过）
		// 科目从exam中对比 date、group 查，group 从 user 中获取
		$Users = M('user');
		$Exams = M('exam');
		
		// 先查询 exam 的状态，如果已录入成绩，那么再下一步，否则弹窗警告
		$examCheck = $Exams->select();
		foreach($examCheck as $e){
			// 既要符合时间，也要已经记录完考试成绩
			if( ($postTime == substr($e['time'], 0, 6)) && $e['status'] ){
				$examInfos[] = $e;
			}
		}
		/*if(is_null($examInfos)){
			$this->error("没有数据");
		}*/

		$userInfos = $Users->where(array('date'=>$postTime, 'pass'=>1, 'flag'=>1))->select();
		$count = 0;
		foreach($userInfos as $user){
			$userInfo[$count]['account']    = $user['account'];
			$userInfo[$count]['real_account']    = $user['real_account'];
			$userInfo[$count]['idcard']  = $user['id_card'];
			
			foreach($examInfos as $examInfo){
				if($examInfo['group'] == $user['group']){
					$userInfo[$count]['subject'] = $examInfo['subject'];
				}
			}
			$userInfo[$count]['score']   = $user['score'];
			$count++;
		}
		//var_dump($userInfo);exit();
		// 考试date
		$this->assign('time', substr($examInfos[0]['time'], 0, 6));
		// 用户姓名、身份证号、考试科目、考试成绩（前台判断分数是否为通过）
		// 数据格式：
		$this->assign('userInfo', $userInfo);
		$this->display();
		}else{
		// html 路径
		$this->display();
		}
	}
	
	
	
	/*
	 * 考试成绩录入
	 * 导入 excel 文件，然后根据其文件中的用户信息
	 * 和分数，自动修改user 表中的 score 列，并且 
	 * update 完成后，自动去将 exam 表中的相关列的
	 * status 置为 1
	 * excel: 姓名 ：身份证号 ：分数
	 * 身份证号就能找到 group 和 date（maxid），更新
	 * score 后，直接去 exam 根据 group 和 date 更新 status
	 */
	public function chengji(){
		//首先先接受文件
		$this->display();
		if(IS_POST){
			$file = $this->uploadExcel();
		
			$fileName = $file[0];
			$fileType = $file[1];
			//var_dump( $file);echo $_SERVER["SCRIPT_FILENAME"];exit();
			if(! $fileType ){
				$this->error('must upload file!');
			}
			vendor("PHPExcel.PHPExcel");
			$objPHPExcel = new \PHPExcel();
			if($fileType == 'xls'){
				$objPHPReader = new \PHPExcel_Reader_Excel5();
			}else if($fileType == 'xlsx'){
				$objPHPReader = new \PHPExcel_Reader_Excel2007();
			}
			//echo '../../../.'.$fileName;
			//var_dump(file_get_contents($fileName));exit();
			$objPHPExcel = $objPHPReader->load($fileName);
			// 获取表中的第一个工作表，如果要获取第二个，把0改为1，依次类推
			$currentSheet = $objPHPExcel->getSheet(0);
			// 获取总列数
			$allColumn = $currentSheet->getHighestColumn();
			// 获取总行数
			$allRow = $currentSheet->getHighestRow();
			// 学生计数
			$studentCount = 0;
			// 循环获取表中的数据，$currentRow表示当前行，从哪行开始读取数据，索引值从0开始
			for ($currentRow = 1; $currentRow <= $allRow; $currentRow ++) {
				// 从哪列开始，A表示第一列
				for ($currentColumn = 'A'; $currentColumn <= $allColumn; $currentColumn ++) {
					// 数据坐标
					$address = $currentColumn . $currentRow;
					// 获取 a1 中的时间 例：201705
					if($address == 'A1'){
						$currentTime = strval($currentSheet->getCell($address)->getValue());
						break;
					}
					// userInfo 中存用户数据
					if( $currentColumn == 'A' ){
						$userInfo[$studentCount]['name']   = $currentSheet->getCell($address)->getValue();
					}else if($currentColumn == 'B'){
						$userInfo[$studentCount]['idcard'] = strval($currentSheet->getCell($address)->getValue());
					}else if($currentColumn == 'C'){
						$userInfo[$studentCount]['score']  = strval($currentSheet->getCell($address)->getValue());
					}
				}
				$studentCount++;
			}
			//$User = M('user');
			//var_dump($User->where(array('date'=> $currentTime, 'account'=>'qwert'))->select());exit();
			// 开始插入分数
			$User = M('user');
			foreach($userInfo as $u){
				$User->score = $u['score'];
				$User->where(array('date'=> $currentTime, 'id_card'=>$u['idcard'], 'pass'=>1, 'flag'=>1))->save();
				$currentUser = $User->where(array('date'=> $currentTime, 'id_card'=>$u['idcard'], 'pass'=>1, 'flag'=>1))->select()[0];
				$groupCheck[] = $currentUser['group'];
			}
			// 去重去空
			$groupCheck = array_unique($groupCheck);
			$groupCheck = array_filter($groupCheck);
			
			$Exam = M('exam');
			foreach($groupCheck as $g){
				$Exam->status = 1;
				$Exam->where(array('date'=>$currentTime, 'group'=> $g))->save();
			}
			// 清除上传的文件夹及其文件
			$this->delDirAndFile(dirname($fileName), true);
			echo "<script>alert('success !')</script>";
			//$this->success('成绩录入成功 !');
			}
		//echo "<script>alert('成绩录入成功 !')</script>";
	}
	
	// 接受上传文件
	private function uploadExcel(){
		 $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('xls','xlsx');// 设置附件上传类型
            $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
            $upload->savePath  =     ''; // 设置附件上传（子）目录
			$upload->subName   =    array('date','Ymd');
		   // $upload->subName   =    I('session.id_card');
		    $upload->saveName =     '';
            $info=$upload->upload();
		
		//var_dump($info);exit();
		if( !info ){
			$this->error($upload->getError());
		}
		foreach($info as $f){
                $savepath =$f['savepath'];
				$savename =$f['savename'];
				$exts =$f['ext'];
			}
			
		$filename =  './Uploads/' . $savepath . $savename;
		//var_dump($exts,$filename);exit();//var_dump($filename);exit();
		return array($filename , $exts);
		
	}
   
   /*
	* @param str $path   待删除目录路径
	* @param int $delDir 是否删除目录，1或true删除目录，0或false则只删除文件保留目录（包含子目录）
    * @return bool 返回删除状态
    */
	private function delDirAndFile($path, $delDir = FALSE) {
		if (is_array($path)) {
			foreach ($path as $subPath)
				delDirAndFile($subPath, $delDir);
		}
		if (is_dir($path)) {
			$handle = opendir($path);
			if ($handle) {
				while (false !== ( $item = readdir($handle) )) {
					if ($item != "." && $item != "..")
						is_dir("$path/$item") ? delDirAndFile("$path/$item", $delDir) : unlink("$path/$item");
				}
				closedir($handle);
				if ($delDir)
					return rmdir($path);
			}
		} else {
			if (file_exists($path)) {
				return unlink($path);
			} else {
				return FALSE;
			}
		}
		clearstatcache();
	}
	
	
	
	
	
	
	/*
	 * 	对考试场次进行排序，并确定当前用户所在哪一场
	 */
	 public function test(){
		// 传递一个 account 即可
		$userA       = I('post.account');
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
		
		echo $examNumber;
	 }
}