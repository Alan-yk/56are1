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
	#page-wrapper {
	  padding: 0 15px;
	  width: 80%;
	  margin-left:10%;
	  margin-right: 10%;
	  margin-top: 30px;
	  min-height: 568px;
	  background-color: white;
    }
    .read{
    	width: 2%;
    	height: 5%;
    	margin-left:1%;
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
		    <div id="page-wrapper">
				<div class="row">
	                <div class="col-lg-12">
	                    <h1 class="page-header"><?php echo (L("MSG")); ?></h1>
	                </div>
	            </div>
	            <div class="row">
	                <div class="col-lg-12">
	                    <div class="panel panel-default">
	                        <div class="panel-heading">
	                            <?php echo (L("MSG_LIST")); ?>
	                        </div>
	                        
	                        <div class="panel-body">
	                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
	                                <thead>
	                                    <tr>
	                                        <th><?php echo (L("NUMBER")); ?>:</th>
	                                        <th><?php echo (L("TITLE")); ?>:</th>
	                                        <th><?php echo (L("TIME")); ?>:</th>
	                                        <th><?php echo (L("FROM")); ?>:</th>
	                                        <th><?php echo (L("VIEW")); ?>:</th>
	                                    </tr>
	                                </thead>
									<?php if(is_array($Msg_row)): $i = 0; $__LIST__ = $Msg_row;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tbody>
											<td><?php echo ($i+($page-1)*10); ?></td>
											<td><a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["title"]); if($vo['is_read']): ?><img src="/Public/dist/img/unread.png" class="read" alt="new_msg"><?php else: ?><img src="/Public/dist/img/read.png" class="read" alt="read"><?php endif; ?></a></td>
											<td><?php echo (date("Y-m-d H:s",$vo["time"])); ?></td>
											<td><a href="<?php echo ($vo["user_url"]); ?>"><?php echo ($vo["poster_name"]); ?></a></td>
											<td><a href="<?php echo ($vo["del_url"]); ?>"><?php echo (L("DELE")); ?></a></td>
										</tbody><?php endforeach; endif; else: echo "" ;endif; ?>
	                            </table>
	                        </div>
	                    </div> 
	                </div>
	            </div>
	            <div class="row">
			        <nav>
			          <ul class="pagination">
			            <li <?php if($page == 1): ?>class="disable"<?php endif; ?>>
			              <a href="<?php echo U('Home/Msg/index',array('pn'=>$page-1));?>" aria-label="Previous">
			                <span aria-hidden="true">&laquo;</span>
			              </a>
			            </li>
							<?php $__FOR_START_27927__=1;$__FOR_END_27927__=$Msg_num+1;for($i=$__FOR_START_27927__;$i < $__FOR_END_27927__;$i+=1){ ?><li <?php if($page == $i): ?>class="active"<?php endif; ?>><a href="<?php echo U('Home/Msg/index',array('pn'=>$i));?>"><?php echo ($i); ?></a></li><?php } ?>
			            <li>
			              <a href="<?php echo U('Home/Msg/index',array('pn'=>$page+1));?>" aria-label="Next">
			                <span aria-hidden="true">&raquo;</span>
			              </a>
			            </li>
			          </ul>
			        </nav>
	            </div>
			</div>
		</div>
	</div>
	<script src="/Public/dist/js/jquery.min.js"></script>
    <script src="/Public/dist/js/bootstrap.min.js"></script>
</body>
</html>