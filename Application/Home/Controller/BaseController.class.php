<?php
namespace Home\Controller;
use Think\Controller;

class BaseController extends Controller {
    public function _initialize(){
        $sid = session('userid');
        //判断用户是否登陆
        if(!isset($sid ) ) {
            $this->error("您没有登录，请登录！",U('Load/load'));
        }

    }

}