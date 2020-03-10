<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/Public/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Public/dist/css/toastr.min.css">
	<title><?php echo ($title); ?></title>
	<style>
		.msgbox {
			margin-top: 5%;
			margin-left:20%;
			margin-right:20%;
			background: #999999;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<nav class="navbar navbar-default navbar-fixed-top opacity50" role="navigation">
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
                        <li><a href="<?php echo U('Home/Index/index');?>"><?php echo (L("URL_INDEX")); ?></a></li>
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
	        </nav>
	        <div class="msgbox">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <?php echo (L("TITLE")); ?> <?php echo ($msg["title"]); ?>
                        </div>
                        	
                        <div class="panel-body" style="height: 500px;">
							<?php echo (htmlspecialchars_decode($msg["content"])); ?>
                        </div>
                        <div class="panel-footer">
							<?php echo (L("FROM")); ?>:<?php echo ($poster_name); ?>&nbsp;&nbsp;<?php echo (L("TIME")); ?>:<?php echo (date("Y-m-d H:s",$msg["time"])); ?>
                        </div>
                    </div>
                    <div class="row">
						<a class="btn btn-info" href="<?php echo U('Home/Msg/send',array('mid'=>$mid));?>"><?php echo (L("REPLY")); ?></a>&nbsp;<a class="btn btn-info" href="<?php echo U('Home/Msg/del',array('mid'=>$mid));?>"><?php echo (L("DELE")); ?></a>
                    </div>
                </div>
	        </div>
		</div>
	</div>
	<script src="/Public/dist/js/jquery.min.js"></script>
    <script src="/Public/dist/js/bootstrap.min.js"></script>
</body>
</html>