<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-ch">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/Public/dist/css/bootstrap.min.css">
    <script type="text/javascript" charset="utf-8" src="/Public/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Public/ueditor/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="/Public/ueditor/lang/zh-cn/zh-cn.js"></script>
	<title><?php echo ($title); ?></title>
	<style type="text/css">
  		body {
  		background: #e5e5e5 url(/Public/dist/img/post.jpg);
    	font-size: 20px;
  	}
  	.panel_header {
	    line-height: 1.6;
	    padding: 4px 12px;
	    box-shadow: 0 1px 1px;
	    background-color: #F4F4F4;
	    background-image: -webkit-linear-gradient(top, #F7F7F7, #EEEEEE);
	    margin-bottom: 50px;
	    margin-top: 5%;
  	}
	</style>
</head>
<body>
	<div class="container">
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
                        <li><a href="<?php echo U('Home/User/login');?>"><span class="glyphicon glyphicon-log-in"></span><?php echo (L("LOGIN")); ?></a></li> <?php else: ?><li><a href="<?php echo U('Home/User/space',array('uid'=>$user_id));?>"><?php echo ($username); if($new_msg != 0): ?><span class="badge"><?php echo ($new_msg); ?></span><?php endif; ?></a></li><?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
		<div class="panel_header">
			<form action="" method="post">
		      	<span class="form-group">
		        	<select class="form-control" name="theme" id="theme" style="width: 120px;">
		          	<option value="1"><?php echo (L("topic_type1")); ?></option>
		          	<option value="2"><?php echo (L("topic_type2")); ?></option>
		          	<option value="3"><?php echo (L("topic_type3")); ?></option>
		          	<option value="4"><?php echo (L("topic_type4")); ?></option>
		          	<option value="5"><?php echo (L("topic_type5")); ?></option>
		          	<option value="6"><?php echo (L("topic_type6")); ?></option>
		          	<option value="7"><?php echo (L("topic_type7")); ?></option>
		        	</select>
		      	</span>
				<span class="form-group"><input type="text" class="form-control input-lg" name="post-title" value="<?php echo ($title); ?>""></span>
		    	<script id="editor" type="text/plain" style="width:100%;height:500px;position:relative;"></script>
		    	<span id="btn-post" class="btn btn-info"><?php echo (L("button_ensure")); ?></span>
		    	<div id="post-result"></div>
	    	</form>
		</div>
	</div>
	<script src="/Public/dist/js/jquery.min.js"></script>
    <script src="/Public/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript">
	    var ue = UE.getEditor('editor');
	    $("#btn-post").click(function (){
	    	var postUrl = "<?php echo U('Home/Topic/post'),'','';?>";
	    	var content = ue.getContent();
	    	var title = $('input[name=post-title]');
	    	var type = $('#theme option:selected').val();
	    	var result;
	    	$.post(postUrl,{ title : title.val() , theme : type , text : content },
	    		function(data){
	    			// if(data.status){
	    			// 	result = "<div class='alert alert-success'><?php echo (L("POST_SUCCESS")); ?></div>";
	    			// }else{
	    			// 	result = "<div class='alert alert-danger'><?php echo (L("POST_FAIL")); ?></div>";
	    			// }
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
	    			$("#post-result").html(result);
	    			if(data.status==1){
	    				var url = data.url;
	    				url = "location.href='" + url + "'";
	    				//alert(url);
                        setTimeout(""+url+"", 1500);
                    }
	    		},'json');

	    });
	</script>
</body>
</html>