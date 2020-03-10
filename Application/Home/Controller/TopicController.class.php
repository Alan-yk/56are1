<?php
namespace Home\Controller;
use Think\Controller;
class TopicController extends Controller {
    public function view(){
    	$user_id = check_login();
    	if($user_id){
    		$login = true;//已经登录
    	}else{
            $user_id = 0;
        }

 		$topic_id = intval(I('get.tid'));
        if($topic_id==""){
            $this->error(L("NO_TOPIC_ID"));
        }
        $page = I("get.pn",0,"intval");
        $Topic = M('topic');
        $topic_data = $Topic->where("topic_id='$topic_id'")->find();
        if($topic_data==NULL){
            $this->error(L("NO_TOPIC_FIND"));
        }
        $userdate = get_userdate(0,$topic_data['topic_poster']);
        $poster_name = $userdate["username"];
        //dump($topic_data);
        $topic_time = date("Y/n/j h:s",$topic_data['topic_time']);

        $Post_data = M('post');
        $post_num = $Post_data->where("topic_id='".$topic_id."'")->count();
        $post_num = intval($post_num);
        $post_num = intval($post_num/10)+1;
        for ($i=0; $i < $post_num; $i++) { 
            $arr[$i]["url"] = U("Home/Topic/view",array("tid"=>$topic_id,"pn"=>$i+1));
        }
        $page_start = ($page-1)*10+1;
        $list = $Post_data->limit('$page_start,10')->order("post_time")->where("topic_id='".$topic_id."'")->select();
        //dump($list);
        /*$User = M("user");
        $User_data = $User->where("user_id'".$topic_data['topic_poster']."'")->find();*/
        $User = M("user");
        if($userdate['user_gender']=="1"){
            $topic_gender = "man";
        }else if($userdate['user_gender']=="2"){
            $topic_gender = "woman";
        }
        else{
            $topic_gender = "unknown";
        }
        if($userdate["user_img"]!=""){
            $poster_img = "/Uploads/".$userdate["user_img"];
        }else{
            $poster_img = "/dist/img/".$topic_gender.".png";
        }
        $this->assign('topic_poster_id',$User_data["user_id"]);
        for($i=0;$i<count($list);$i++){
            $poster_id = $list[$i]["post_poster"];
            $list[$i]["poster_url"] = U("Home/User/space",array("uid"=>$poster_id));
            $data = $User->where("user_id='".$poster_id."'")->find();
            if($data["user_gender"]=="1"){
                $gender = "man";
            }elseif ($data["user_gender"]=="2") {
                $gender = "woman";
            }
            else{
                $gender = "unknown";
            }
            if($data["user_img"]!=""){
                $list[$i]["img"] = "/Uploads/".$data["user_img"];
            }else{
                $list[$i]['img'] = "/dist/img/".$gender.".png";
            }
            $list[$i]["post_poster"] = $data["username"];
        }
        $User = M("user");
        $user_admin = $User->where("user_id='".$user_id."'")->find();//当前浏览者权限判断
        $new_msg = $user_admin["new_msg"];
        $user_admin = $user_admin["user_admin"];
        //判断是否收藏过
        $Favorite = M("favorite");
        if($favorite = $Favorite->where("user_id = '".$user_id."' and topic_id = '".$topic_id."'")->find()){
            $this->favorited = $favorite['id'];
        }

        $this->assign("new_msg",$new_msg);
        $this->assign("username",session("username"));
        $this->assign("user_id",$user_id);//这里是当前网页访问者的ID
        $this->assign("topic_time",$topic_time);
        $this->assign("title",$topic_data['topic_title']);
        $this->assign("text",$topic_data['topic_text']);
        $this->assign("author",$poster_name);
        $this->assign("topic_poster",$topic_data["topic_poster"]);
        $this->assign("login",$login);
        $this->assign("user_admin",$user_admin);
        $this->assign("poster_img",$poster_img);
        $this->assign("topic_id",$topic_id);
        $this->assign("num",$arr);
        $this->assign("list",$list);
        $this->assign("page",$page);
        $this->assign("post_float",$page-1);
        $this->display();
    }
    public function del(){
    	$topic_id = intval(I('get.tid'));
        $user_id = check_login();//先把登录状态赋给一个变量 使用结束后销毁 可以减少sql查询次数
        if(!$user_id){
            $this->error(L("NO_LOGIN"),U('Home/User/login'),3);
        }
        if($topic_id == ""){
            $this->error(L("NO_TOPIC_FIND"));
        }
        $User = M('user');
        $userdata = $User->where("user_id='$user_id'")->find();
        $Topic = M('topic');
        if($Topic->where("topic_id='$topic_id'")->find()==NULL){
            $this->error(L("NO_TOPIC_FIND"));
        }else{	
            if(intval($userdata['user_admin'])!=0){
                if(!$Topic->delete($topic_id)){
                    $this->error("删除帖子失败");
                }else{
                    $this->success("删除帖子成功!");
                }
            }else{
                $topic_data = $Topic->where("topic_id='$topic_id'")->find();
                if(session('user_login')==$topic_data['topic_poster']||cookie('user_login')==$topic_data['topic_poster']){
                    if(!$Topic->delete($topic_id)){
                        $this->error("删除帖子失败");
                    }else{
                        $this->success("删除帖子成功");
                    }
                }else{
                    $this->error("您不是帖子的作者，无法删除!");
                }
            }
        }

    }
    public function reply(){
        $user_id = check_login();
    	if (!$user_id) {
            $this->error(L("NO_LOGIN"),U('Home/User/login'));
        }
        if(IS_POST){
            $Post = M('post');
            $post_data = array('post_id'=>'',
                                'topic_id'=>I('get.tid'),
                                'post_time'=>time(),
                                'post_poster'=>$user_id,
                                'post_text'=>I('post.editorValue'));
            //dump($post_data);
            if(!$Post->data($post_data)->add()){
                $this->error("插入post数据失败!");
            }else{
                $this->success("发布成功",U("Home/Topic/view",array('tid'=>I('get.tid'))));
            }
        }else{
            $topic_id = intval(I('get.tid'));
            if($topic_id == ""){
                $this->error("没有获取到帖子id！");
            }
            $Topic = M('topic');
            $topic_data = $Topic->where("topic_id='$topic_id'")->find();
            if(!$topic_data){
                $this->error("获取帖子信息出错！");
            }
            if($user_id){
                $User = M("user");
                $userdate = $User->where("user_id = '".$user_id."'")->find();
                $new_msg = $userdate["new_msg"];
                $this->assign("new_msg",$new_msg);
                $login = true;
                $this->assign("user_id",$user_id);
                $this->assign("username",cookie("?username")?cookie("username"):session("username"));
            }else{
                $login = false;
            }
            $this->assign("login",$login);
            $this->assign("title",$topic_data['topic_title']);
            $this->assign("topic_id",$topic_id);
            $this->display();
        }
    }
    public function edit(){
    	$user_id = check_login();
        if(!$user_id){
            $this->error(L("NO_LOGIN"),U("Home/User/login"));
        }
        $topic_id = intval(I('get.tid'));
        $Topic = M('topic');
        $topic_data = $Topic->where("topic_id='$topic_id'")->find();
        if($topic_data==NULL){
            $this->error("获取帖子信息出错!");
        }
        if($user_id){
            $User = M("user");
            $userdate = $User->where("user_id = '".$user_id."'")->find();
            $new_msg = $userdate["new_msg"];
            $this->assign("new_msg",$new_msg);
            $login = true;
            $this->assign("user_id",$user_id);
            $this->assign("username",cookie("?username")?cookie("username"):session("username"));
        }else{
            $login = false;
        }
        $this->assign("login",$login);
        $this->assign("title",$topic_data['topic_title']);
        $this->assign("text",$topic_data['topic_text']);
        $this->assign("URL",U('Home/Topic/post'));
        $this->assign("topic_id",$topic_id);
        $this->display();
    }
    public function post(){
    	$user_id = check_login();
    	if(!$user_id){
    		$this->error(L("NO_LOGIN"));
    	}
    	if(IS_AJAX){
    		$Topic = M('topic');
    		$data = array(	"topic_title"=>I("post.title"),
    						'topic_time'  =>   time(),
    						'topic_type'  =>   I("post.theme"),
    						'topic_poster'=>    get_user_id(),
    						'topic_last_poster' => get_user_id(),
    						'topic_text'=>I('post.text')
    						);
    		if(I('post.post-edit')){
    			$topic_id = intval(I('post.post-edit'));
    			$result = $Topic->where("topic_id='$topic_id'")->save($data);
    		}else{
    			$result = $Topic->data($data)->add();
    		}
    		if($result){
    			$url = U("Home/Topic/view",array('tid'=>$result));
    			$this->ajaxReturn(array('status'=>1,'url'=>$url),'json');//返回成功
    		}else{
    			$this->ajaxReturn(array('status'=>0),'json');//返回失败
    		}
    	}else{
            if($user_id){
                $User = M("user");
                $userdate = $User->where("user_id = '".$user_id."'")->find();
                $new_msg = $userdate["new_msg"];
                $this->assign("new_msg",$new_msg);
                $login = true;
                $login = true;
                $this->assign("login",$login);
                $this->assign("user_id",$user_id);
                $this->assign("username",cookie("?username")?cookie("username"):session("username"));
            }else{
                $login = false;
            }
    		$this->display();
    	}
    }
    public function forum(){
    	$page = intval(I("get.pn"));
        if(!isset($page)||$page==""||$page==0){
            $page = 1;
        }
        $Topic = M("topic");
        $page_start = ($page-1)*10;
        $list = $Topic->order("topic_time desc")->limit($page_start,10)->select();
        $User = M("user");
        $Theme = M("topic_theme");
        for ($i=0; $i <count($list) ; $i++) { 
            $poster_id = $list[$i]["topic_poster"];
            $poster_data = get_userdate(0,$poster_id);
            $list[$i]["topic_poster"] = $poster_data["username"];
            $topic_theme = $Theme->where("id=".$list[$i]["topic_type"])->find();
            $list[$i]["theme"] = $topic_theme["theme_name"];
            $data = $User->where("user_id='".$poster_id."'")->find();
            if($data["user_gender"]=="1"){
                $gender = "man";
            }else if($data["user_gender"]=="2"){
                $gender = "woman";
            }else{
                $gender = "unknown";
            }
            $time = time()-$list[$i]["topic_time"];
            if($time<=60){
                $list[$i]["time"] = $time."秒前";
            }elseif ($time<=3600) {
                $time/=60;
                $time=intval($time);
                $list[$i]["time"] = $time."分钟前";
            }elseif($time<=21600){
                $time/=3600;
                $time=intval($time);
                $list[$i]["time"] = $time."小时前";
            }else{
                $time/=21600;
                $time=intval($time);
                $list[$i]["time"] = $time."天前";
            }
            if($data["user_img"]==NULL){
                $list[$i]['img'] = "/dist/img/".$gender.".png";
            }else{
                $list[$i]["img"] = "/Uploads/".$data["user_img"];
            }
        }
        $topic_num = $Topic->count();
        $topic_num = intval($topic_num);
        $topic_num = intval($topic_num/10)+1;
        $user_id = check_login();
    
        for ($i=0; $i < $topic_num; $i++) { 
            $arr[$i]["url"] = U("Home/Topic/forum",array("pn"=>$i));
        }
        if($user_id){
            $userdate = $User->where("user_id = '".$user_id."'")->find();
            $new_msg = $userdate["new_msg"];
            $this->assign("new_msg",$new_msg);
            $login = true;
            $this->assign("login",$login);
            $this->assign("user_id",$user_id);
            $this->assign("username",cookie("?username")?cookie("username"):session("username"));
        }else{
            $login = false;
        }
        $this->assign("page",$page);
        $this->assign("num",$arr);
        $this->assign("list",$list);
        $this->display();
    }
    public function banlist(){
        $path = "../../../../../../../";
        $Ban = M("banlist");
        $ban_list = $Ban->select();
        //dump($ban_list);
        $this->assign("ban_list",$ban_list);
        $this->assign("path",$path);
        $this->assign("title","封禁列表");
        $this->display();
    }
}
