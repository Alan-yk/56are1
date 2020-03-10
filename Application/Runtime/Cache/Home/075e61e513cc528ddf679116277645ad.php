<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/Public/dist/css/bootstrap.min.css">
	<title><?php echo ($title); ?></title>
</head>
<body>
	<style type="text/css">
        #page-wrapper {
          padding: 0 15px;
          width: 80%;
          margin-left:10%;
          margin-right: 10%;
          min-height: 568px;
          background-color: white;
        }
    </style>
<div class="container-fluid">
    <div class="row">
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
                        <li><a href="<?php echo U('Home/User/login');?>"><span class="glyphicon glyphicon-log-in"></span><?php echo (L("LOGIN")); ?></a></li> <?php else: ?><li><a href="<?php echo U('Home/User/space',array('uid'=>$user_id));?>"><?php echo ($username); ?></a></li><li><a href="<?php echo U('Home/Msg/index');?>"><?php echo (L("MSG")); if($new_msg != 0): ?><span class="badge"><?php echo ($new_msg); ?></span><?php endif; ?></a></li><?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav><br/><br/><br/>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo (L("SPACE")); ?></h1>
                </div>
            </div>
            <div class="row">
                <div class="panel panel-default" style="margin-left: 5%;margin-right: 5%;margin-top: 5%;">
                    <div class="panel-heading">
                       <img src="/Public/<?php echo ($user_img); ?>" alt="img" class="img-rounded" height="40" width="40"><h3><?php echo ($user_data["username"]); echo (L("OF")); echo (L("SPACE")); ?></h3>
                    </div>
                    <div class="panel-body">
                        <h5><?php echo (L("SCHOOL")); ?>:<?php echo ($user_data["school"]); ?></h5>
                        <h5><?php echo (L("NATION")); ?>:<?php echo ($user_data["user_nation"]); ?></h5>
                        <h5><?php echo (L("SEX")); ?>:<?php echo ($user_data["gender"]); ?></h5>
                        <h5><?php echo (L("REG_TIME")); ?>:<?php echo (date("Y-m-d H:s",$user_data["reg_time"])); ?></h5>
                        <h5><?php echo (L("TOPIC_NUM")); ?>:<?php echo ($user_data["user_topics"]); ?></h5>
                        <h5><?php echo (L("POST_NUM")); ?>:<?php echo ($user_data["user_post"]); ?></h5>
                    </div>
                    <div class="panel-footer">
                        <?php if($is_friend != true): ?><a class="btn btn-info" href="<?php echo U('Home/Friend/add',array('uid'=>$uid));?>"><?php echo (L("ADD_FRIEND")); ?></a><?php else: ?>
                        <a href="<?php echo U('Home/Friend/del',array('uid'=>$uid));?>" class="btn btn-info"><?php echo (L("DEL_FRIEND")); ?></a><?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="/Public/dist/js/jquery.min.js"></script>
    <script src="/Public/dist/js/bootstrap.min.js"></script>
</body>
</html>