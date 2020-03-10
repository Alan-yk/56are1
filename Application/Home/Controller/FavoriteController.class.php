<?php
namespace Home\Controller;
use Think\Controller;
class FavoriteController extends Controller
{
	public function add(){
		$user_id = check_login();
		if(!$user_id){
			$this->error(L("NO_LOGIN"));
		}
		if(IS_AJAX){
			$data["user_id"] = I("post.user_id",0,'intval');
			$data["topic_id"] = I("post.topic_id",0,'intval');
			$data["time"] = time();

			if(M("favorite")->add($data)){
				$this->ajaxReturn(array('status'=>1),'json');
			}else{
				$this->ajaxReturn(array('status'=>0),'json');
			}
		}
	}
	public function del(){
		if(M("favorite")->delete(I("post.id"))){
			$this->ajaxReturn(array('status'=>1),'json');
		}else{
			$this->ajaxReturn(array('status'=>0),'json');
		}
	}
	public function view(){
		$user_id = check_login();
		if(!$user_id){
			$this->error(L("NO_LOGIN"));
		}else{
			$this->assign("login",true);
			$this->assign("user_id",$user_id);
			$this->assign("username",session("username"));
		}
		$page = I("get.pn",1,"intval");
		if($page == 0 || $page == ""){
			$page = 1;
		}
		$this->assign("page",$page);
		$Favorite = M("favorite");
		$fav_num = $Favorite->where("user_id = '".$user_id."'")->count();
		$page_num = intval($fav_num / 10 + 1);
		dump($page_num);
		if($page>=$page_num){
			$page = $page_num;
		}
		$this->assign("page_num",$page_num);
		$fav_row = $Favorite->where("user_id = '".$user_id."'")->field("topic_id,time")->limit(($page-1)*10,10)->select();
		$Topic = M("topic");
		$Topic_data = array();
		for($i=0;$i<=count($fav_row);$i++){
			$Topic_data[] = $Topic->where("topic_id = '".$fav_row[$i]["topic_id"]."'")->field("topic_id,topic_title,topic_poster,topic_last_time")->select();
		}
		$result = array();
		foreach ($Topic_data as $key => $value) {
			foreach ($value as $k => $v) {
				$result[] = $v;
			}
		}
		$User = M("user");
		$k = 0 + ($page-1) * 10;
		for($i=0;$i<count($result);$i++){
			$result[$i]["id"] = ++$k;
			$result[$i]["topic_post_id"] = $result[$i]["topic_poster"];
			$User_Date = $User->where("user_id = '".$result[$i]["topic_poster"]."'")->find();
			$result[$i]["topic_poster"] = $User_Date["username"];
			$result[$i]['time'] = $fav_row[$i]["time"];
			$result[$i]["url"] = U("Home/Topic/view",array("tid"=>$result[$i]["topic_id"]));
			$result[$i]["user_url"] = U("Home/User/space",array("uid"=>$result[$i]["topic_post_id"]));
		}
		//dump($result);
		$this->assign("fav_row",$result);
		$this->display();
	}
}

?>