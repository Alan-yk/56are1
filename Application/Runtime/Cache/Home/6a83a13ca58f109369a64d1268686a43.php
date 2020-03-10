<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/Public/dist/css/bootstrap.min.css">
    <style type="text/css">
	  .panel_header {
	    	line-height: 1.6;
	    	padding: 4px 12px;
	    	box-shadow: 0 1px 1px;
	    	background-color: #F4F4F4;
	        background-image: -webkit-linear-gradient(top, #F7F7F7, #EEEEEE);
	    	margin-bottom: 10px;
	  }
</style>
	<title><?php echo ($title); ?></title>
</head>
<body>
	<div class="container-fluid">
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
        </nav><br/><br/><br/><br/><br/><br/>
        <div class="panel_header">
    		<form action="" method="post" style="height: 800px;">
           		<span> 回复:&nbsp;&nbsp;<?php echo ($title); ?></span>
      			<script id="editor" type="text/plain" style="width: 100%;height: 80%;"></script>
      			<button class="btn btn-info">确认</button>
    		</form>
  		</div>
    </div>
    <script type="text/javascript" charset="utf-8" src="/Public/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Public/ueditor/ueditor.all.min.js"></script>
    <script type="text/javascript">
  		var ue = UE.getEditor('editor');
	</script>
	<script src="/Public/dist/js/jquery.min.js"></script>
    <script src="/Public/dist/js/bootstrap.min.js"></script>
</body>
</html>