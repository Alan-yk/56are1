<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-ch">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/Public/dist/css/bootstrap.min.css">
	<title><?php echo ($title); ?></title>
</head>
<body>
	<style type="text/css">
	    body {
	        background: #e5e5e5 url(/Public/dist/img/forum.jpg);
	    }
	    .thread {
		    position: relative;
		    border-bottom: 1px solid #F0F0F0;
		    padding: 6px 10px;
		    cursor: pointer;
		}
	</style>
<!-- 卡通头像来源http://tieba.baidu.com/p/1335664156 -->
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
                        <li><a href="<?php echo U('Home/Index/index');?>"><?php echo (L("URL_INDEX")); ?></a></li>
                        <li class="active"><a href="<?php echo U('Home/Topic/forum');?>"><?php echo (L("URL_FORUM")); ?></a></li>
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
        </nav><br><br>
	    <div style="background: #f5f5f5;font-size: 15px;">
	        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="thread" style="background: #F0F0F0;margin-top: 10px;margin-bottom: 10px;">
	                <span style="height: 100%;width: 60px;">
	                    <img src="/Public<?php echo ($vo["img"]); ?>" height="45" width="35">
	                </span>
	                <span>
	                    <a href="<?php echo U('Home/Topic/view',array('tid'=>$vo['topic_id']));?>">#<?php echo ($vo["theme"]); ?>#&nbsp;&nbsp;&nbsp;<?php echo ($vo["topic_title"]); ?></a>
	                </span>
	                <div style="font-size: 16px;">
	                    <?php echo (L("AUTHOR")); ?>：<?php echo ($vo["topic_poster"]); ?> <?php echo (L("POST_TIME")); ?>:<?php echo ($vo["time"]); ?>
	                </div>
	            </div><?php endforeach; endif; else: echo "" ;endif; ?>
	    </div>
	<nav>
	  <ul class="pagination">
	    <li>
	      <a href="<?php echo U('Home/Topic/forum',array('pn'=>$page-1));?>" aria-label="Previous">
	        <span aria-hidden="true">&laquo;</span>
	      </a>
	    </li>
	    <?php if(is_array($num)): $i = 0; $__LIST__ = $num;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li <?php if($page == $i): ?>class="active"<?php endif; ?>><a href="<?php echo U('Home/Topic/forum',array('pn'=>$i));?>"><?php echo ($i); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
	    <li>
	      <a href="<?php echo U('Home/Topic/forum',array('pn'=>$page+1));?>" aria-label="Next">
	        <span aria-hidden="true">&raquo;</span>
	      </a>
	    </li>
	  </ul>
	</nav>
	<div>
	    <a href="<?php echo U('Home/Topic/post');?>" class="btn btn-info"><?php echo (L("POST_TOPIC")); ?></a>
	</div>
	</div>
	<script src="/Public/dist/js/jquery.min.js"></script>
    <script src="/Public/dist/js/bootstrap.min.js"></script>
</body>
</html>