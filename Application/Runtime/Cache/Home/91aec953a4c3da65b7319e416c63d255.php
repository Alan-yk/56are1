<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/Public/dist/css/bootstrap.min.css">
	<title><?php echo ($title); ?></title>
</head>
<body>
	<style type="text/css">
  body {
    background: #e5e5e5 url(/Public/img/bg_body.gif);
    font-size: 16px;
  }
  .panel_header {
    line-height: 1.6;
    padding: 4px 12px;
    box-shadow: 0 1px 1px;
    background-color: #F4F4F4;
    background-image: -webkit-linear-gradient(top, #F7F7F7, #EEEEEE);
    margin-bottom: 10px;
    margin-left: 20%;
    margin-right: 20%;
    height: 1024px;
  }
  #s1 {
  	border: 1px solid;
  	margin-top: 11px;
    margin-left: 3px;
  	position: relative;
  	float: left;
  	width: 25%;
  	height: 90%;
  }
  #s2 {
  	position: relative;
  	left:20%;
    margin-top: 300px;
  }
</style>
<div class="container-fluid">
    <div class="row-fluid">
        <nav class="navbar navbar-default navbar-fixed-top opacity50" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">56are1</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">56are1</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<?php echo U('Home/Index/index');?>"><?php echo (L("URL_INDEX")); ?></a></li>
                        <li><a href="<?php echo U('Home/Topic/forum');?>"><?php echo (L("URL_FORUM")); ?></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo (L("URL_NATION")); ?><span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?php echo U('Home/Index/meng');?>"><?php echo (L("NATION_MENG")); ?></a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo U('Home/Index/hui');?>"><?php echo (L("NATION_HUI")); ?></a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo U('Home/Index/tu');?>"><?php echo (L("NATION_TU")); ?></a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <?php if($login == false): ?><li><a href="<?php echo U('Home/User/register');?>"><span class="glyphicon glyphicon-user"></span><?php echo (L("REGISTER")); ?></a></li> 
                        <li><a href="<?php echo U('Home/User/login');?>"><span class="glyphicon glyphicon-log-in"></span><?php echo (L("LOGIN")); ?></a></li> <?php else: ?><li><a href="<?php echo U('Home/User/space',array('uid'=>$user_id));?>"><?php echo ($username); ?></a></li><li><a href="<?php echo U('Home/Msg/index');?>">消息<?php if($new_msg != 0): ?><span class="badge"><?php echo ($new_msg); ?></span><?php endif; ?></a></li><?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav><br/><br/><br/>
    </div>
    <div class="panel_header">
            <span id="s1">
                <div style="margin-top: 10%;margin-left: 10%;">
                    <div>
                        <img src="/Public/<?php echo ($user_img); ?>" alt="avatar_img" class="img-rounded" style="height: 60%;width: 50%;">
                    </div>
                    <div style="margin-top: 30%;">
                        <p>用户名:<?php echo ($user_data["username"]); ?></p>
                        <p><?php echo (L("NICKNAME")); ?>:<?php echo ($user_data["nickname"]); ?></p>
                        <p><?php echo (L("TOPIC_NUM")); ?>:<?php echo ($user_data["posts"]); ?></p>
                        <p><?php echo (L("REG_TIME")); ?>:<?php echo (date("Y-m-d",$user_data["register_time"])); ?></p>
                        <p><?php echo (L("NATION")); ?>:<?php echo ($user_data["user_nation"]); ?></p>
                        <p><?php echo (L("USER_NOTES")); ?>:<?php echo ((isset($user_data["words"]) && ($user_data["words"] !== ""))?($user_data["words"]):"这家伙很懒，什么都没有留下！"); ?></p>
                        <p><?php echo (L("Favorite")); ?>:<a href="<?php echo U('Home/Favorite/view');?>"><?php echo ($fav_num); ?></a></p>
                        <p><?php echo (L("MSG")); ?>:<a href="<?php echo U('Home/Msg/index');?>"><?php echo ($new_msg); ?></a></p>
                    </div>
                </div>
            </span>
            <span id="s2">
                <form action="<?php echo U('Home/User/space',array('uid'=>$user_data['user_id']));?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="username"><?php echo (L("USER_NAME")); ?>:</label>
                        <input type="text" name="nickname" id="nickname" placeholder="<?php echo ($user_data["nickname"]); ?>">
                    </div>
                    <div class="form-group">
                        <label for="email"><?php echo (L("USER_EMAIL")); ?>:</label>
                        <input type="email" name="email" id="email" placeholder="<?php echo ($user_data["email"]); ?>">
                    </div>
                    <div class="form-group">
                        <label for="school"><?php echo (L("SCHOOL")); ?>:</label>
                        <input type="text" name="school" id="school" placeholder="<?php echo ($user_data["user_school"]); ?>">
                    </div>
                    <div class="form-group">
                        <label for="major"><?php echo (L("MAJOR")); ?>:</label>
                        <input type="text" name="major" id="major" placeholder="<?php echo ($user_data["user_major"]); ?>">
                    </div>
                    <div class="form-group">
                        <label for="password"><?php echo (L("PASSWORD")); ?>:</label>
                        <input type="password" name="password" id="password" placeholder="请输入密码进行验证">
                    </div>
                    <div class="form-group">
                        <label for="img"><?php echo (L("NEW_IMG")); ?>:</label>
                        <input type="file" name="avatar_img" id="img">
                    </div>
                    <button class="btn btn-info"><?php echo (L("CONFIRM")); ?></button>
                </form>
            </span>
    </div>
</div>
    <script src="/Public/dist/js/jquery.min.js"></script>
    <script src="/Public/dist/js/bootstrap.min.js"></script>
</body>
</html>