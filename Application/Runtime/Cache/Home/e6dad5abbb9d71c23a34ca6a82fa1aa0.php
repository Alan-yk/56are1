<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/Public/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Public/dist/css/toastr.min.css">
    <script type="text/javascript" charset="utf-8" src="/Public/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Public/ueditor/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="/Public/ueditor/lang/zh-cn/zh-cn.js"></script>
	<title><?php echo ($title); ?></title>
	<style>
		.box {
			margin-top:5%;
			margin-left: 20%;
			margin-right: 20%;
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
		</div>
		<div class="row box">
			<div class="panel panel-default">
				<div class="panel-heading">
					<?php echo (L("REPLY")); echo ($to_user); ?>
				</div>
				<div class="panel-body">
					<div class="form-group">
				    	<label for="username"><?php echo (L("SEND_TO")); ?></label>
				    	<input type="text" class="form-control" name="to_user" id="username" placeholder="<?php echo (L("USER_NAME")); ?>" value="<?php echo ($to_user); ?>" <?php if($to_user): ?>readonly="readonly"<?php endif; ?>>
				    	<label for="title"><?php echo (L("TITLE")); ?></label>
				    	<input type="text" class="form-control" name="title" id="title" placeholder="<?php echo (L("TITLE")); ?>">
				    	<input type="hidden" name="fid" value="<?php echo ($user_id); ?>">
				    	<script id="editor" type="text/plain" style="width:100%;height:500px;position:relative;margin-top: 1%;"></script>
				    	
				  	</div>
					<div class="panel-footer">
						<button class="btn btn-info" id="send"><?php echo (L("button_ensure")); ?></button>
						<div id="send-result"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="/Public/dist/js/jquery.min.js"></script>
    <script src="/Public/dist/js/bootstrap.min.js"></script>
    <script>
    	var ue = UE.getEditor('editor');
    	$("#send").click(function (){
	    	var postUrl = "<?php echo U('Home/Msg/send'),'','';?>";
	    	var content = ue.getContent();
	    	var to_user = $('input[name=to_user]');
	    	var fid = $('input[name=fid]');
	    	var title= $('input[name=title]')
	    	var toUrl = "<?php echo U('Home/Msg/index'),'','';?>";
	    	var result;
	    	
	    	$.post(postUrl,{ title : title.val() , content : content , from_user_id : fid.val() , to_user_id : to_user.val()},
	    		function(data){
	    			switch(data.status){
	    				case 1:
	    					result = "<div class='alert alert-success'><?php echo (L("POST_SUCCESS")); ?></div>";
	    					break;
	    				case 0:
	    					result = "<div class='alert alert-danger'><?php echo (L("POST_FAIL")); ?></div>";
	    					break;
	    				default:
	    					result = "<div class='alert alert-danger'><?php echo (L("UNKNOWN_ERROR")); ?></div>";
	    			}
	    			$("#send-result").html(result);
	    			if(data.status==1){
	    				toUrl = "location.href='" + toUrl + "'";
                        setTimeout(""+toUrl+"", 1500);
                    }
	    		},'json');

	    });
    </script>
</body>
</html>