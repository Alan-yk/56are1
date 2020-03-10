<?php 
namespace Home\Controller;
use Think\Controller;
/**
* 
*/
class MsgController extends Controller
{
	
	public function send(){
		$user_id = check_login();
		$msg_id = I("get.mid",0,"intval");
		if(!$user_id){
			$this->error(L("NO_LOGIN"));
		}else{
			$User = M("user");
        	$userdate = $User->where("user_id = '".$user_id."'")->find();
        	$new_msg = $userdate["new_msg"];
        	$this->assign("title",L("SEND_MSG"));
        	$this->assign("new_msg",$new_msg);
			$this->assign("login",true);
			$this->assign("user_id",$user_id);
			$this->assign("username",session("username"));
		}
		if(IS_AJAX){
			$date["title"] = I("post.title");
			$date["content"] = I("post.content");
			$date["from_user_id"] = I("from_user_id");
			$date["time"] = time();
			$date["to_user_id"] = $User->getFieldByusername(I("post.to_user_id"));
			$Msg = M("msg");
			if(!$Msg->add($date)){
				$this->ajaxReturn(array("status"=>0),"json");
			}else{
				$this->ajaxReturn(array("status"=>1),"json");
			}
		}else{
			if($msg_id){
				$Msg = M("msg");
				$Msg_data = $Msg->where("id = '".$msg_id."'")->find();
				$to_username = $User->getFieldById($Msg_data["from_user_id"],"username");
				$this->assign("to_user",$to_username);
			}
			$this->display();
		}
	}
	public function view(){
		$msg_id = I("get.mid",0,"intval");
		$user_id = check_login();
		if(!$user_id){
			$this->error(L("NO_LOGIN"));
		}else{
			$User = M("user");
            $userdate = $User->where("user_id = '".$user_id."'")->find();
            $new_msg = $userdate["new_msg"];
            $this->assign("new_msg",$new_msg);
			$this->assign("login",true);
			$this->assign("user_id",$user_id);
			$this->assign("username",session("username"));
		}
		if(!$msg_id){
			$this->error(L("NO_MSG"));
		}
		$Msg = M("msg");
		$Msg_data = $Msg->where("id='".$msg_id."'")->find();
		if(!$Msg_data){
			$this->error(L("NO_MSG"));
		}
		$userdate = $User->where("user_id = '".$Msg_data["from_user_id"]."'")->find();
		if($Msg_data["is_read"]){
			$date["is_read"] = "0";
			if(!$Msg->where("id = '".$msg_id."'")->save($date)){
				$this->error(L("FAILED"));
			}
			if($User->where("user_id = '".$user_id."'")->setDec("new_msg")){

			}
		}
		$this->assign("mid",$msg_id);
		$this->assign("msg",$Msg_data);
		$this->assign("poster_name",$userdate["username"]);
		$this->display();

	}
	public function del(){
		$user_id = check_login();
		if(!$user_id){
			$this->error(L("NO_LOGIN"));
		}
		$msg_id = I("get.mid",0,"intval");
		if($msg_id==0||$msg_id==""){
			$this->error(L("NO_MSG"));
		}
		$Msg = M("msg");
		$Msg_data = $Msg->where("id = '".$msg_id."'")->find();
		if($user_id == $Msg_data["to_user_id"]){
			if(!$Msg->where("id = '".$msg_id."'")->delete()){
				$this->error(L("FAILED"));
			}else{
				$this->success(L("SUCCESS"),U("Home/Msg/index"));
			}
		}else{
			$this->error(L("FAILED"));
		}
	}
	public function index(){
		if(!$user_id=check_login()){
			$this->error(L("NO_LOGIN"));
		}else{
			$User = M("user");
            $userdate = $User->where("user_id = '".$user_id."'")->find();
            $new_msg = $userdate["new_msg"];
            $this->assign("new_msg",$new_msg);
			$this->assign("login",true);
			$this->assign("user_id",$user_id);
			$this->assign("username",session("username"));
		}
		$page = I("get.pn",1,"intval");
		if($page<1||$page==""){
			$page = 1;
		}

		$Msg = M("msg");
		$Msg_num = $Msg->where("to_user_id = '".$user_id."'")->count();
		$Msg_num = intval($Msg_num / 10 + 1);
		if($page>$Msg_num){
			$page = $Msg_num;
		}
		$Msg_row = $Msg->where("to_user_id = '".$user_id."'")->limit(($page-1)*10,10)->select();
		//dump($Msg_row);
		for($i=0;$i<count($Msg_row);$i++){//循环给数组设置url以便在模板中使用
			$Msg_row[$i]["url"] = U("Home/Msg/view/",array("mid"=>$Msg_row[$i]["id"]));
			$Msg_row[$i]["del_url"] = U("Home/Msg/del",array("mid"=>$Msg_row[$i]["id"]));
			$Msg_row[$i]["poster_name"] = $User->getFieldById($Msg_row[$i]["from_user_id"],"username");
			$Msg_row[$i]["user_url"] = U("Home/User/space",array("uid"=>$Msg_row[$i]["from_user_id"]));
		}
		$this->assign("page",$page);
		$this->assign("Msg_num",$Msg_num);
		$this->assign("Msg_row",$Msg_row);
		$this->display();
	}
}
?>