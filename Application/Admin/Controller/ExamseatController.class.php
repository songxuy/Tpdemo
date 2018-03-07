<?php
namespace Admin\Controller;
use Think\Controller;
use PHPExcel_IOFactory;
use PHPExcel;
/**
 * 座位安排
 */
class ExamseatController extends Base2Controller
{
	public function anpaiks(){
        if(IS_POST){
		$User = M("notice"); 
		
		$data = array(
	        'date'=>I('post.year').I('post.month'),
	        'subject'=>I('post.subject'),
	                 );
		//var_dump($data);exit();
		if(! count($User->where($data)->select())){
			$User->data($data)->add();
			
			$this->success("添加成功");
		}else{
			$this->error("数据重复");
					}
		}
		$this->display();
		//echo 1;
	}
	// 必须一次性把所有考室安排完
	public function anpaizc()
	{
		// 默认显示安排座位页面
		//$this->display();
		$User = M('user');
		$Notice = M("notice");
		$Maxid=$Notice->max('id');
		$subTime=$Notice->where(array('id'=>$Maxid))->select()[0][date];
		//var_dump($subTime);exit();
		//$subTime      = substr(I('post.examTime')[0], 0, 6); // 201711
		$studentNum   = $User->where(array('date' => $subTime, 'pass'=>1, 'flag'=>1))->count();
		if($studentNum % 30){
			$examCount = floor($studentNum / 30) + 1; //考试总场数，只要有1人都行
		}else{
			$examCount = floor($studentNum / 30);
		}
		//echo $examCount;
		// 绑定总共需要多少个信息框
		$this->assign('examCount', $examCount);
		$this->assign('year', substr($subTime, 0, 4));
		$this->assign('month', substr($subTime, 4, 2));
		// html 路径
		$this->display();
	}
	
	public function post()
	{
		//先插入考试座位安排的信息，然后再处理
		//数据库中提取已经报名成功的学员信息
		
		//从数据库中提取已通过的总人数，然后计算场次
		//根据有多少场次。创造多少场次信息
		//examTime[]=2017111810001200&examTime[]=
		$User = M('user');
		//var_dump(I('post.examTime'));exit();
		// post.examTime : 2017111810001200
		//var_dump(I('post.year')[0].I('post.month')[0]);
		
        $examTime[]=I('post.year')[0].I('post.month')[0].I('post.day')[0].I('post.starth')[0].I('post.startm')[0].I('post.endh')[0].I('post.endm')[0];
		
		//$examTime=$_POST['year'].$_POST['month'].$_POST['day'].$_POST['starth'].$_POST['startm'].$_POST['endh'].$_POST['endm'];
		//$subTime      = substr(I('post.examTime')[0], 0, 6); // 201711
		
		$subTime      = substr($examTime[0], 0, 6);
		//var_dump($subTime);exit;
		$studentNum   = $User->where(array('date' => $subTime, 'pass'=>1, 'flag'=>1))->count();
		//var_dump($User->where(array('date' => $subTime, 'pass'=>1, 'flag'=>1))->select());exit();
		if($studentNum % 30){
			$examCount = floor($studentNum / 30) + 1; //考试总场数，只要有1人都行
		}else{
			$examCount = floor($studentNum / 30);
		}
		$UserInfo = $User->where(array('date' => strval($subTime), 'pass'=>1, 'flag'=>1))->select();
		//var_dump($examTime1);exit;
		//var_dump($UserInfo);exit();
		//$User->seat_num = 26;
		//$User->where(array('real_account' => '娃娃', 'pass'=>1, 'flag'=>1))->save();
		//var_dump($UserInfo[0]);exit();
		$studentCount = 0; //学生人数计数器
		if( !$examCount ) {
			exit('empty exam');
		}
		$i = 0;
		$j = 0;
		for( $i ; $i<$examCount; $i++){
			// 编码有问题
			//$examInfo[$i]['real_address'] = base64_decode($examAddr[$i]);
			$examInfo[$i]['real_address'] = $_POST['examAddr'][$i];
			//$examInfo[$i]['time']         = I('post.examTime')[$i];
			$examInfo[$i]['time']         = I('post.year')[$i].I('post.month')[$i].I('post.day')[$i].I('post.starth')[$i].I('post.startm')[$i].I('post.endh')[$i].I('post.endm')[$i];;// 2017年11月18日上午10点至中午12点 -> 2017111810001200*****************
			//$examInfo[$i]['subject']      = base64_decode($examSubj[$i]);
			$examInfo[$i]['subject']      = $_POST['examSubj'][$i];
			$examInfo[$i]['group']        = $i + 1;
			$examInfo[$i]['room_num']     = $_POST['roomNum'][$i];
			//var_dump($_POST['roomNum']);exit();
			//var_dump(base64_decode(I('post.examAddr')[$i]));exit();
			//echo base64_encode('现代');exit();
			// 这里没有考虑 $User 是多数组的情况，需要修改
			// 同时设置需要 update 的 user 信息
			if( $studentCount < (floor($studentNum / 30))*30 ){	
				$oneClass = 30;
			}else{
				$oneClass = $studentNum % 30;
			}
			
			for( $j=0 ; $j < $oneClass; $j++ ){
				$User->group    = $examInfo[$i]['group'];
				if( $j < 9 ){
					$seat_num = '0'.strval($j+1);
				}else{
					$seat_num = strval($j+1);
				}
				$User->seat_num = $seat_num;
				$User->where(array( 'date' => $subTime ,'id_card' => $UserInfo[$studentCount]['id_card'] ))->save();
				
				// 考号->第i场考试->第j位考生
				$seatInfo['exam_num'][$i][$j]     = $examInfo[$i]['group'].$subTime.$seat_num;
				$seatInfo['exam_name'][$i][$j]    = $UserInfo[$studentCount]['real_account'];
				$seatInfo['exam_id_card'][$i][$j] = $UserInfo[$studentCount]['id_card'];
				
				$studentCount++;
			}

			$seatInfo['title'][$i] = substr($examInfo[$i]['time'], 0, 4).'年防雷装置检测技术人员能力评价考试（'.substr($examInfo[$i]['time'], 4, 2).'月'.substr($examInfo[$i]['time'], 6, 2).'日）';
			// 第1场、group表示
			$seatInfo['group'][$i]        = '第'.$examInfo[$i]['group'].'场';
			$seatInfo['room_num'][$i]     = '考场号: '.$examInfo[$i]['room_num'];
			$seatInfo['subject'][$i]      = '考试科目: '.$examInfo[$i]['subject'];
			$seatInfo['real_address'][$i] = '考试地点: '.$examInfo[$i]['real_address'];
			$seatInfo['time'][$i]             = '时间:  '.substr($examInfo[$i]['time'], 0, 4).'年'.
													 substr($examInfo[$i]['time'], 4, 2).'月'.
													 substr($examInfo[$i]['time'], 6, 2).'日  '.
													 substr($examInfo[$i]['time'], 8, 2).':'.
													 substr($examInfo[$i]['time'],10,2).'-'.
													 substr($examInfo[$i]['time'],12,2).':'.
													 substr($examInfo[$i]['time'],14,2) ;
		}
		//var_dump($examInfo);exit();
		
		if( is_null( $examInfo[0] ) ){
			exit('empty info');
		}
		
		$examTable = M('exam');
		//判断一下，是否库中已经有当前 date 的数据了
		$idMax   = $examTable->max('id');
		$timeMax = $examTable->field('time')->where(array('id'=>$idMax))->select();
		//var_dump(substr($timeMax[0]['time'], 0, 6));exit();
		if(substr($timeMax[0]['time'], 0, 6) < $subTime){
			$insertInfo = $examTable->addAll($examInfo);
		}
		//var_dump($insertInfo);exit();
		
		
		// 交给 setSeat 处理 $setInfo，生成excel
		$this->setSeat($seatInfo, $studentNum, $subTime);
	}

	/*
	 * $seatInfo : 座位信息
	 * $studentNum : 总人数
	 * $subTime: 年月
	*/
	private function setSeat($seatInfo, $studentNum, $subTime)
	{
		vendor("PHPExcel.PHPExcel");
		//var_dump(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);exit();
		$objPHPExcel = new \PHPExcel();
		//设置 excel 的属性
		$objPHPExcel->getProperties();//->setCreator("")->setTitle("座次签到表");
		
		if($studentNum % 30){
			$examCount = floor($studentNum / 30) + 1; //考试总场数，只要有1人都行
		}else{
			$examCount = floor($studentNum / 30);
		}
		//$objPHPExcel->createSheet();
		//$objPHPExcel->setActiveSheetIndex(0);

		$styleThinBlackBorderOutline = array(
											'borders' => array (
																'outline' => array (
																					'style' => \PHPExcel_Style_Border::BORDER_THIN,  //设置border样式
          //'style' => PHPExcel_Style_Border::BORDER_THICK, 另一种样式
																					'color' => array ('argb' => 'FF000000'),     //设置border颜色
																					),
																),
		);
		// 38 行，为一个考室
		//title、场次、考场号、科目、地点、时间
		for($i=0; $i < $examCount; $i++){
			$objPHPExcel->createSheet();
			$objPHPExcel->setActiveSheetIndex($i);
			$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(12);
			$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(18);
			$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
			$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(12);
			$sheet_title = $seatInfo['group'][$i];
			$objPHPExcel->getActiveSheet()->setTitle('座次 '.$sheet_title);
			$objPHPExcel->getActiveSheet()->setCellValue('A'.strval(1), $seatInfo['title'][$i]);
			//合并，居中,加粗
			$objPHPExcel->getActiveSheet()->mergeCells('A'.strval(1).':D'.strval(1)); 
			$objPHPExcel->getActiveSheet()->getStyle('A'.strval(1))->applyFromArray(array('front'=>array('bold'=>true),
																								 'alignment'=>array('horizontal'=>\PHPExcel_Style_Alignment::HORIZONTAL_CENTER)));
			$objPHPExcel->getActiveSheet()->getStyle('A'.strval(1))->getFont()->setBold(true);
			
			$objPHPExcel->getActiveSheet()->setCellValue('A'.strval(2), $seatInfo['group'][$i]);
			$objPHPExcel->getActiveSheet()->getStyle('A'.strval(2))->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->setCellValue('B'.strval(2), $seatInfo['room_num'][$i]);
			$objPHPExcel->getActiveSheet()->getStyle('B'.strval(2))->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->setCellValue('C'.strval(2), $seatInfo['subject'][$i]);
			$objPHPExcel->getActiveSheet()->getStyle('C'.strval(2))->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->setCellValue('A'.strval(3), $seatInfo['real_address'][$i]);
			$objPHPExcel->getActiveSheet()->getStyle('A'.strval(3))->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->mergeCells('A'.strval(3).':D'.strval(3)); 
			$objPHPExcel->getActiveSheet()->setCellValue('A'.strval(4), $seatInfo['time'][$i]);
			$objPHPExcel->getActiveSheet()->getStyle('A'.strval(4))->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->mergeCells('A'.strval(4).':D'.strval(4)); 
			$objPHPExcel->getActiveSheet()->setCellValue('A'.strval(5), '考号');
			// 加粗、水平居中、边框线
			$objPHPExcel->getActiveSheet()->getStyle('A'.strval(5))->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->getStyle('A'.strval(5))->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('A'.strval(5))->applyFromArray($styleThinBlackBorderOutline);
			$objPHPExcel->getActiveSheet()->setCellValue('B'.strval(5), '姓名');
			$objPHPExcel->getActiveSheet()->getStyle('B'.strval(5))->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->getStyle('B'.strval(5))->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('B'.strval(5))->applyFromArray($styleThinBlackBorderOutline);
			$objPHPExcel->getActiveSheet()->setCellValue('C'.strval(5), '身份证号');
			$objPHPExcel->getActiveSheet()->getStyle('C'.strval(5))->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->getStyle('C'.strval(5))->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('C'.strval(5))->applyFromArray($styleThinBlackBorderOutline);
			$objPHPExcel->getActiveSheet()->setCellValue('D'.strval(5), '签到');
			$objPHPExcel->getActiveSheet()->getStyle('D'.strval(5))->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->getStyle('D'.strval(5))->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('D'.strval(5))->applyFromArray($styleThinBlackBorderOutline);
			
			for($j=0 ; $j < 30 ; $j++){
				$objPHPExcel->getActiveSheet()->setCellValue('A'.strval($j+5+1), $seatInfo['exam_num'][$i][$j]);
				$objPHPExcel->getActiveSheet()->getStyle('A'.strval($j+5+1))->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
				$objPHPExcel->getActiveSheet()->getStyle('A'.strval($j+5+1))->applyFromArray($styleThinBlackBorderOutline);
				$objPHPExcel->getActiveSheet()->setCellValue('B'.strval($j+5+1), $seatInfo['exam_name'][$i][$j]);
				$objPHPExcel->getActiveSheet()->getStyle('B'.strval($j+5+1))->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
				$objPHPExcel->getActiveSheet()->getStyle('B'.strval($j+5+1))->applyFromArray($styleThinBlackBorderOutline);
				$objPHPExcel->getActiveSheet()->setCellValue('C'.strval($j+5+1), $seatInfo['exam_id_card'][$i][$j]);
				$objPHPExcel->getActiveSheet()->getStyle('C'.strval($j+5+1))->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
				$objPHPExcel->getActiveSheet()->getStyle('C'.strval($j+5+1))->applyFromArray($styleThinBlackBorderOutline);
				//签到下面也划线
				$objPHPExcel->getActiveSheet()->getStyle('D'.strval($j+5+1))->applyFromArray($styleThinBlackBorderOutline);
			}
			
			$objPHPExcel->getActiveSheet()->setCellValue('A'.strval($j+5+1 +1), '总监考: ');
			$objPHPExcel->getActiveSheet()->getStyle('A'.strval($j+5+1 +1))->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->setCellValue('A'.strval($j+5+1 +2), '监考: ');
			$objPHPExcel->getActiveSheet()->getStyle('A'.strval($j+5+1 +2))->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->setCellValue('B'.strval($j+5+1 +2), '监审: ');
			$objPHPExcel->getActiveSheet()->getStyle('B'.strval($j+5+1 +2))->getFont()->setBold(true);
		}
		
		$StyleH = array('front'=>array('bold'=>true),
					   'alignment'=>array('horizontal'=>\PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
		$StyleV = array('front'=>array('bold'=>true),
                       'alignment'=>array('horizontal'=>\PHPExcel_Style_Alignment::VERTICAL_CENTER));
		$objPHPExcel->createSheet();
		$objPHPExcel->setActiveSheetIndex($i);
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(8);
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(12);
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(16);
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(16);
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
		$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(16);
		$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(25);
		$objPHPExcel->getActiveSheet()->setTitle('审核人员');
		$objPHPExcel->getActiveSheet()->setCellValue('A'.strval(1), substr($subTime, 0, 4).'年'.substr($subTime, 4, 2).'月全省防雷装置检测资格审核表');
		//合并，水平居中，加粗
		$objPHPExcel->getActiveSheet()->getStyle('A'.strval(1))->applyFromArray($StyleH);
		$objPHPExcel->getActiveSheet()->getStyle('A'.strval(1))->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->mergeCells('A'.strval(1).':H'.strval(1));
		$objPHPExcel->getActiveSheet()->setCellValue('A'.strval(2), '序号');
		$objPHPExcel->getActiveSheet()->getStyle('A'.strval(2))->applyFromArray($StyleV);
		$objPHPExcel->getActiveSheet()->getStyle('A'.strval(2))->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle('A'.strval(2))->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->setCellValue('B'.strval(2), '姓名');
		$objPHPExcel->getActiveSheet()->getStyle('B'.strval(2))->applyFromArray($StyleV);
		$objPHPExcel->getActiveSheet()->getStyle('B'.strval(2))->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle('B'.strval(2))->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->setCellValue('C'.strval(2), '性别');
		$objPHPExcel->getActiveSheet()->getStyle('C'.strval(2))->applyFromArray($StyleV);
		$objPHPExcel->getActiveSheet()->getStyle('C'.strval(2))->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle('C'.strval(2))->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->setCellValue('D'.strval(2), '工作单位');
		$objPHPExcel->getActiveSheet()->getStyle('D'.strval(2))->applyFromArray($StyleV);
		$objPHPExcel->getActiveSheet()->getStyle('D'.strval(2))->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle('D'.strval(2))->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->setCellValue('E'.strval(2), '职务/职称');
		$objPHPExcel->getActiveSheet()->getStyle('E'.strval(2))->applyFromArray($StyleV);
		$objPHPExcel->getActiveSheet()->getStyle('E'.strval(2))->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle('E'.strval(2))->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->setCellValue('F'.strval(2), '身份证号');
		$objPHPExcel->getActiveSheet()->getStyle('F'.strval(2))->applyFromArray($StyleV);
		$objPHPExcel->getActiveSheet()->getStyle('F'.strval(2))->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle('F'.strval(2))->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->setCellValue('G'.strval(2), '申请类别');
		$objPHPExcel->getActiveSheet()->getStyle('G'.strval(2))->applyFromArray($StyleV);
		$objPHPExcel->getActiveSheet()->getStyle('G'.strval(2))->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle('G'.strval(2))->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->setCellValue('H'.strval(2), '联系电话');
		$objPHPExcel->getActiveSheet()->getStyle('H'.strval(2))->applyFromArray($StyleV);
		$objPHPExcel->getActiveSheet()->getStyle('H'.strval(2))->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle('H'.strval(2))->applyFromArray($styleThinBlackBorderOutline);
		
		$Users = M('user')->select();
		$count = 0;
		foreach($Users as $user){
			if($user['date'] == $subTime){
				//序号
				$objPHPExcel->getActiveSheet()->setCellValue('A'.strval(3 + $count), strval($count + 1));
				$objPHPExcel->getActiveSheet()->getStyle('A'.strval(3 + $count))->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
				$objPHPExcel->getActiveSheet()->getStyle('A'.strval(3 + $count))->getFont()->setBold(true);
				$objPHPExcel->getActiveSheet()->getStyle('A'.strval(3 + $count))->applyFromArray($styleThinBlackBorderOutline);
				//姓名
				$objPHPExcel->getActiveSheet()->setCellValue('B'.strval(3 + $count), $user['real_account']);
				$objPHPExcel->getActiveSheet()->getStyle('B'.strval(3 + $count))->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
				$objPHPExcel->getActiveSheet()->getStyle('B'.strval(3 + $count))->applyFromArray($styleThinBlackBorderOutline);
				//性别
				$objPHPExcel->getActiveSheet()->setCellValue('C'.strval(3 + $count), $user['sex']);
				$objPHPExcel->getActiveSheet()->getStyle('C'.strval(3 + $count))->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
				$objPHPExcel->getActiveSheet()->getStyle('C'.strval(3 + $count))->applyFromArray($styleThinBlackBorderOutline);
				//工作单位
				$objPHPExcel->getActiveSheet()->setCellValue('D'.strval(3 + $count), $user['work_address']);
				//$objPHPExcel->getActiveSheet()->getStyle('D'.strval(3 + $count))->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
				$objPHPExcel->getActiveSheet()->getStyle('D'.strval(3 + $count))->applyFromArray($styleThinBlackBorderOutline);
				//职务/职称
				$objPHPExcel->getActiveSheet()->setCellValue('E'.strval(3 + $count), $user['profession']);
				$objPHPExcel->getActiveSheet()->getStyle('E'.strval(3 + $count))->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
				$objPHPExcel->getActiveSheet()->getStyle('E'.strval(3 + $count))->applyFromArray($styleThinBlackBorderOutline);
				//身份证号
				$objPHPExcel->getActiveSheet()->setCellValue('F'.strval(3 + $count), $user['id_card']);
				$objPHPExcel->getActiveSheet()->getStyle('F'.strval(3 + $count))->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
				$objPHPExcel->getActiveSheet()->getStyle('F'.strval(3 + $count))->applyFromArray($styleThinBlackBorderOutline);
				//申请类别
				$objPHPExcel->getActiveSheet()->setCellValue('G'.strval(3 + $count), '设计');
				$objPHPExcel->getActiveSheet()->getStyle('G'.strval(3 + $count))->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
				$objPHPExcel->getActiveSheet()->getStyle('G'.strval(3 + $count))->applyFromArray($styleThinBlackBorderOutline);
				//联系电话
				$objPHPExcel->getActiveSheet()->setCellValue('H'.strval(3 + $count), $user['phone']);
				$objPHPExcel->getActiveSheet()->getStyle('H'.strval(3 + $count))->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
				$objPHPExcel->getActiveSheet()->getStyle('H'.strval(3 + $count))->applyFromArray($styleThinBlackBorderOutline);
				$count++;
			}
		}
		
		$fileName = date("Y年m月").'防雷装置检测技术人员能力评价考试.xls';
		$objPHPExcel->setActiveSheetIndex(0);
		ob_end_clean();
		header("Content-Type: applicationnd.ms-excel; charset=utf-8");
        header('Content-Disposition: attachment;filename='.$fileName);
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		//var_dump($objWriter);exit();
        $objWriter->save('php://output');
		
	}
}
?>