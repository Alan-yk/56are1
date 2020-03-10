<?php
function get_userdate($type,$user){//type为类型，0代表id 1代表用户名
    $User = M("user");
    if($type==0){
        $userdata = $User->where("user_id='".$user."'")->find();
    }elseif ($type==1) {
        $userdata = $User->where("username='".$user."'")->find();
    }else{
        $this->error("未知类型！");
    }
    return $userdata;
}
function get_user_id(){
    $User = M("user");
    $userdata = $User->where("username='".session('username')."'")->find();
    return $userdata["user_id"];
}