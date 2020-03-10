<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	$user_id = check_login();
        if($user_id){
            $login = true;
			$this->assign("user_id",$user_id);
            $this->assign("username",cookie("?username")?cookie("username"):session("username"));
        }else{
            $login = false;
        }
        $this->assign("login",$login);
        $this->assign("title","民族汇");
    	$this->display();
    }
    public function hui(){
        $this->assign("title","回族");
    	$this->display();
    }
    public function tu(){
        $this->assign("title","土家族");
    	$this->display();
    }
    public function meng(){
        $this->assign("title","蒙古族");
    	$this->display();
    }
}
