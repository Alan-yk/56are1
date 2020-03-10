<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function login(){
    	$user_id = check_login();
    	if($user_id){
    		$this->error(L("LOGINED"));
    	}
    	if(IS_AJAX){
    		if(I("post.username")==""||I("post.password")==""){
    			$this->ajaxReturn(array('status'=>2),'json');
    		}
    		$User = M("user");
    		if(filter_var(I("post.username"),FILTER_VALIDATE_EMAIL)==false){
    			$result = $User->where("username='".I("post.username")."'")->find();
    		}else{
    			$result = $User->where("user_email='".I("post.username")."'")->find();
    		}
    		if($result==NULL){
    			$this->ajaxReturn(array('status'=>3),'json');
    		}
    		if($result["password"]!=md5(md5(I("post.password")))){
    			$this->ajaxReturn(array('status'=>0),'json');
    		}else{
    			if(I("post.remeber")=="on"){
    				cookie("username",I("post.username"));
                    cookie("user_id",$result['user_id']);
    				session("username",I("post.username"));
                    session("user_id",$result['user_id']);
    			}else{
    				session("username",I("post.username"));
                    session("user_id",$result['user_id']);
    			}
    			$this->ajaxReturn(array('status'=>1),'json');
    		}
    	}else{
    		$this->display();
    	}
    	
    }
    public function find_pass(){//找回密码模块

    }
    public function register(){//注册模块
        $user_id = check_login();
	   	if($user_id){
			$this->error(L("LOGINED"));
		}
    	if(IS_AJAX){
    		if(I("post.username")==""||I("post.password")==""){
    			$this->ajaxReturn(array('status'=>2),'json');//用户名或者密码不能为空
    		}
    		$User = M("user");
    		$result = $User->where("username='".I("post.username")."'")->find();
    		if($result!=NULL){//如果查询到用户已经注册返回3
    			$this->ajaxReturn(array('status'=>3),'json');//用户名已经被占用
    		}
    		$result = $User->where("user_email='".I("post.email")."'")->find();
    		if($result!=NULL){//如果邮箱被占用
    			$this->ajaxReturn(array('status'=>4),'json');//邮箱已经被占用
    		}
    		if(I("post.password")!=I("post.repassword")){//如果两次输入的密码不一样
    			$this->ajaxReturn(array('status'=>5),'json');//两次输入密码不一致
    		}
    		$data["username"] = I("post.username");
    		$data["password"] = md5(md5(I("post.password")));
    		$data["user_email"] = I("post.email");
    		$data["reg_time"] = time();
    		if($User->add($data)){
    			$this->ajaxReturn(array('status'=>1),'json');//注册成功
    		}else{
    			$this->ajaxReturn(array('status'=>0),'json');//注册失败
    		}
    	}else{
    		$this->display();
    	}
    }
    public function loginout(){//退出登录模块
        if(!check_login()){
            $this->error(L("NO_LOGIN"));
        }
        if(!session("?user_id")){
            $this->success(L("LOGINOUT_SUCCESS"),U("Home/Index/index"));
        }
        session("user_id",null);
        session("username",null);
        $this->success(L("LOGINOUT_SUCCESS"),U("Home/Index/index"));
    }
    public function space($uid){
        if(IS_POST){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');
        $upload->rootPath  =     './Public/Uploads/';
        $upload->savePath  =     '';
        $info   =   $upload->upload();
        /*if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功
            //$this->success('上传成功！');
            dump($info);
        }*/
        if(I("post.password")==""){
            $this->error("请输入密码!");
        }
        $User = M("user");
        $userdate = $User->where("user_id='$uid'")->find();
        if(  $userdate['password']==md5(md5(I('post.password')).$userdate['user_salt'])  ){
            if(I("post.nickname")!=""){
                $date["user_id"] = $uid;
                $date["nickname"] = I("post.nickname");
                $User->save($date);
            }
            if(I("post.email")!=""){
                $date["user_id"] = $uid;
                $date["email"] = I("post.email");
                $User->save($date);
            }
            if(I("post.school")!=""){
                $date["user_id"] = $uid;
                $date["user_school"] = I("post.school");
                $User->save($date);
            }
            if(I("post.major")!=""){
                $date["user_id"] = $uid;
                $date["user_major"] = I("post.major");
                $User->save($date);
            }
        }else{
            $this->error("密码错误");
        }
        if(!$info){
            $this->error($upload->getError());
        }else{
            $date["user_id"] = $uid;
            $date["user_img"] = $info["avatar_img"]["savepath"].$info["avatar_img"]["savename"];
            $User->save($date);
            $this->success("修改成功");
        }
    }else{
        if(!isset($uid)){
            $this->error("获取uid失败");
        }
        $user_id = check_login();
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
        $User = M("user");
        $user_data = $User->where("user_id='$uid'")->find();
        if($user_data["user_gender"]=="1"){
            $user_avatar = "man";
            $user_data["gender"] = "男";
        }else if($user_data["user_gender"]=="2"){
            $user_avatar = "woman";
            $user_data["gender"] = "女";
        }else{
            $user_avatar = "woman";
            $user_data["gender"] = "保密";
        }
        if($user_data["user_img"]!=NULL){
            $user_img = $user_data["user_img"];
            $user_img = "Uploads/$user_img";
        }else{
            $user_img = "/dist/img/".$user_avatar.".png";
        }
        //收藏
        $Favorite = M("favorite");
        $fav_num = $Favorite->where("user_id = '".$user_id."'")->count();
        $this->assign("uid",$uid);
        $this->assign("fav_num",$fav_num);
        $this->assign("user_img",$user_img);
        $this->assign("user_data",$user_data);
        if($uid==$user_id){
            $this->display();
        }else{
            $Friend = M("friend");
            $friend_row = $Friend->where("user_id = '".$user_id."'")->select();
            for($i=0;$i<count($friend_row);$i++){
                if($friend_row[$i]["friend_id"]==$uid){
                    $this->assign("is_friend",true);
                }
            }
            $this->display("space2");

        }
        
    }
    }
}
