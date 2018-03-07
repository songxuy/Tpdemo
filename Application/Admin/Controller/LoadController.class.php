<?php
namespace Admin\Controller;
use Think\Controller;
class LoadController extends Controller {
public function load(){
		if(!IS_POST){
              $this->display();  
            }
        else{
			$model=M();
            $data['username'] = I('post.name');
            $data['password'] = md5(I('post.password'));
            $member = M('admin')->where($data)->find();
            if($member){
                session('userid',$member['id']);
                $this->success("登陆成功",U('Index/shenhe'));
            }else
			    {
                $this->error("账号或密码错误");
                }
            }
	}
}
	?>