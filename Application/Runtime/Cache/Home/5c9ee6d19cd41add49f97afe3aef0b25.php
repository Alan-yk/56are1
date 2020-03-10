<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo (L("LOGIN")); ?></title>

        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="/Public/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="/Public/dist/css/font-awesome.min.css">
		<link rel="stylesheet" href="/Public/dist/css/form-elements.css">
        <link rel="stylesheet" href="/Public/dist/css/style1.css">
        <link rel="stylesheet" href="/Public/dist/css/bootstrapValidator.min.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style type="text/css">
            body{
                background-image: url(/Public/dist/img/login.jpg);
            }
        </style>
    </head>
    <body>
        <!-- Top content -->
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
                        <li><a href="<?php echo U('Home/User/login');?>"><span class="glyphicon glyphicon-log-in"></span><?php echo (L("LOGIN")); ?></a></li> <?php else: ?><li><a href="<?php echo U('Home/User/space',array('uid'=>$user_id));?>"><?php echo ($username); ?></a></li><?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="top-content">
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong></strong><?php echo (L("LOGIN")); ?></h1>
                            <div class="description">
                            	<p>
	                            	<?php echo (L("LOGIN_INTRO")); ?>
                            	</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3><?php echo (L("LOGIN_TO_OUR")); ?></h3>
                            		<p><?php echo (L("LOGIN_TYPE")); ?></p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-key"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="" class="login-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="username"><?php echo (L("USER_NAME")); ?>:</label>
			                        	<input type="text" name="username" placeholder="<?php echo (L("USER_NAME")); ?>/<?php echo (L("USER_EMAIL")); ?>" class="form-username form-control" id="username">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="password"><?php echo (L("USER_EMAIL")); ?></label>
			                        	<input type="password" name="password" placeholder="<?php echo (L("ENTER_PASS")); ?>" class="form-password form-control" id="password">
			                        </div>
                                    <div class="checkbox">
                                        <label for="remeber">
                                            <input type="checkbox" name="remeber" id="remeber"><?php echo (L("REMEBER_ME")); ?>
                                        </label>
                                    </div>
			                        <!-- <button type="submit" class="btn" id="btn-login">登录</button> -->
                                    <span id="btn-login" class="btn"><?php echo (L("LOGIN")); ?></span>
                                    <div id="login-result">
                                        
                                    </div>
			                    </form>
		                    </div>
                        </div>
                    </div>
<!--                     <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 social-login">
                        	<h3><?php echo (L("OTHER_TYPE")); ?></h3>
                        	<div class="social-login-buttons">
	                        	<a class="btn btn-link-1 btn-link-1-facebook" href="#">
	                        		<i class="fa fa-facebook"></i> Facebook
	                        	</a>
	                        	<a class="btn btn-link-1 btn-link-1-twitter" href="#">
	                        		<i class="fa fa-twitter"></i> Twitter
	                        	</a>
	                        	<a class="btn btn-link-1 btn-link-1-google-plus" href="#">
	                        		<i class="fa fa-google-plus"></i> Google Plus
	                        	</a>
                        	</div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <!-- Javascript -->
        <script src="/Public/dist/js/jquery.min.js"></script>
        <script src="/Public/dist/js/bootstrap.min.js"></script>
        <script src="/Public/dist/js/jquery.backstretch.min.js"></script>
        <script src="/Public/dist/js/scripts.js"></script>
        <script src="/Public/dist/js/bootstrapValidator.min.js"></script>
        <script>
            $(function () {
                $('form').bootstrapValidator({
　　　　　　　　message: 'This value is not valid',
            　　feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                　　invalid: 'glyphicon glyphicon-remove',
                　　validating: 'glyphicon glyphicon-refresh'
            　　},
                fields: {
                    username: {
                        message: '<?php echo (L("CHECK_FAIL")); ?>',
                            validators: {
                            notEmpty: {
                                message: '<?php echo (L("USER_NAME_CANT_BE_EMPTY")); ?>'
                            },
                            stringLength: {
                                min: 5,
                                max: 20,
                                message: '<?php echo (L("USER_NAME_LENGTH")); ?>'
                            }
                        }
                    },
                        password: {
                            validators: {
                                notEmpty: {
                                    message: '<?php echo (L("PASSWORD_CANT_BE_EMPTY")); ?>'
                                },
                                stringLength: {
                                    min: 5,
                                    max: 20,
                                    message: '<?php echo (L("PASSWORD_LENGTH")); ?>'
                                }
                            }
                        }
                    }
                });

            }
        );
                $("#btn-login").click(function() {
                    var postUrl = "<?php echo U('Home/User/login'),'','';?>";
                    var username = $('input[name=username]');
                    var password = $('input[name=password]');
                    var remeber = $('input[name=remeber]');
                    var result;
                    //alert(password.val());
                    $.post(postUrl,{ username : username.val(), password : password.val(), remeber : remeber.val() },function(data){
                            switch(data.status){
                                case 1:
                                    result = "<div class='alert alert-success'><?php echo (L("LOGIN_SUCCESS")); ?></div>";
                                    break;
                                case 2:
                                    result = "<div class='alert alert-warning'><?php echo (L("U_P_CANT_BE_EMPTY")); ?></div>";
                                    break;
                                case 3:
                                    result = "<div class='alert alert-warning'><?php echo (L("USER_NOT_EXITS")); ?></div>";
                                    break;
                                default :
                                    result = "<div class='alert alert-danger'><?php echo (L("LOGIN_FAIL")); ?></div>";
                            }
                            $("#login-result").html(result);
                            if(data.status==1){
                                setTimeout("location.href='../../../index.php';", 1000);
                            }
                    },'json');
                });
        </script>
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->
    </body>
</html>