<?php
namespace Home\Controller;
use Think\Controller;
class FriendController extends Controller
{
	public function add(){
		$user_id = check_login();
		if(!$user_id){
			$tis->error(L("NO_LOGIN"));
		}
		$uid = I("get.uid",0,"intval");
		if($uid==0||$uid==""){
			$this->error(L("NO_USER"));
		}
		if($user_id==$uid){
			$this->error(L("IS_YOU"));
		}
		$Friend = M("friend");
		$date["user_id"] = $user_id;
		$date["friend_id"] = $uid;
		$date["time"] =	time();
		if($Friend->add($date)){
			$this->success(L("ADD_FRIEND_SUCCESS"));
		}else{
			$this->error(L("ADD_FRIEND_FAIL"));
		}
	}
	public function del(){
		$user_id = check_login();
		if(!$user_id){
			$tis->error(L("NO_LOGIN"));
		}
		$uid = I("get.uid",0,"intval");
		if($uid==0||$uid==""){
			$this->error(L("NO_USER"));
		}
		if($user_id==$uid){
			$this->error(L("IS_YOU"));
		}
		$Friend = M("friend");
		if($Friend->where("user_id = '".$user_id."' and friend_id = '".$uid."'")->delete()){
			$this->success(L("DEL_FRIEND_SUCCESS"));
		}else{
			$this->error(L("DEL_FRIEND_FAIL"));
		}
	}
	public function view(){
		
	}
}

?>