<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-ch">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/Public/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Public/dist/css/toastr.min.css">
    <title><?php echo ($title); ?></title>
    <style type="text/css">
    body {
        background: #e5e5e5 url(/Public/dist/img/view_body.jpg);
        
        padding-top: 70px;
    }
    .margin {
        margin-top: 8px;
    }
    .panel_header {
        line-height: 1.6;
        padding: 4px 12px;
        box-shadow: 0 1px 1px;
        background-color: #F4F4F4;
        background-image: -webkit-linear-gradient(top, #F7F7F7, #EEEEEE);
        margin-left: 20%;
        margin-right: 20%;
        margin-bottom: 10px;
        opacity: 0.85;
    }
    .panel_body {
    background: #FFFFFF;
    padding: 12px 16px;
    border-radius: 4px;
    border: 1px solid #000000;
    margin-left: 20%;
    margin-right: 20%;
    opacity: 0.85;
}
    #firstpost {
        border-bottom: 2px solid #E7E7E7;
}
    .avatar {
        width: 32px;
        height: 32px;
        border-radius: 32px;
        opacity: 0.7;
}
    .avatar.big {
        width: 64px;
        height: 64px;
}
    .text img {
        width:expression(document.body.clientWidth > 540? "540px": "auto" );
        max-width: 95%;
        overflow:hidden;
    }
    .myModal{
        top:30%;
    }
</style>
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
            </div>
        </nav>
    <div class="panel_header">	
        <ul class="breadcrumb" style="height: 18px;font-size: 14px;">
        <!-- <li><a href="#">首页</a> <span class="divider"></span></li> -->
            <li><a href="<?php echo U('Home/Topic/forum');?>"><?php echo (L("URL_FORUM")); ?></a> <span class="divider"></span></li>
            <li class="active"><?php echo ($title); ?></li>
        </ul>
    </div>
    <div class="panel_body">
        <div class="row" style="margin-bottom: 8px;border-bottom: 2px solid #E7E7E7;">
        <div class="col-md-4"><img src="/Public<?php echo ($poster_img); ?>" class="img-rounded" height="78" width="70" style="margin-top: 4%;"></div>
  		<div class="col-md-8"><h3><?php echo ($title); ?></h3><br/>作者:<?php echo ($author); ?>&nbsp;&nbsp;&nbsp;&nbsp;发布于:<?php echo ($topic_time); ?></div>
        </div>
        <br/>
        <div class="text" style="border-bottom: 2px solid #E7E7E7;">
            <p><?php echo (htmlspecialchars_decode($text)); ?></p>
        </div><br/>
        <?php if($user_admin == 1): echo (L("MANAGE")); ?>:&nbsp;
        <a class="btn btn-danger" data-toggle="modal" data-target="#myModal1"><?php echo (L("DELE")); ?></a>&nbsp;
            <div class="modal fade myModal" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel"><?php echo (L("DELETE_TOPIC")); ?></h4>
                        </div>
                        <div class="modal-body"><?php echo (L("DELETE_TOPIC_CONFIRM")); ?></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo (L("CLOSE")); ?></button>
                            <a href="<?php echo U('Home/Topic/del',array('tid'=>$topic_id));?>"  class="btn btn-primary"><?php echo (L("CONFIRM")); ?></a>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal -->
            </div>
        <a class="btn btn-warning" data-toggle="modal" data-target="#myModal2"><?php echo (L("BAN")); ?></a>
            <div class="modal fade myModal" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel"><?php echo (L("BAN_USER")); ?></h4>
                        </div>
                        <div class="modal-body"><?php echo (L("BAN_USER_CONFIRM")); ?></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo (L("CLOSE")); ?></button>
                            <a href="<?php echo U('Home/User/ban',array('uid'=>$topic_poster));?>"  class="btn btn-primary"><?php echo (L("CONFIRM")); ?></a>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal -->
            </div><?php endif; ?>
        <br/><br/>
        <div style="text-align: center;">
            <?php if($favorited): ?><button class="btn btn-primary" id="del">取消收藏</button>
                <input type="hidden" value="<?php echo ($favorited); ?>" name="fav_id">
            <?php else: ?>
                <button class="btn btn-primary" id="fav">收藏</button><?php endif; ?>
        </div>
        <hr/>
        <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><div name="footer" style="border-bottom: 2px solid #E7E7E7;">
                <p><img src="/Public<?php echo ($vo["img"]); ?>" class="img-rounded" height="50" width="50">#<?php echo ($post_float*15+$k+1); ?>楼：<a href="<?php echo ($vo['poster_url']); ?>"><?php echo ($vo["post_poster"]); ?></a> &nbsp;&nbsp;<?php echo (L("TIME")); ?>:<?php echo (date("Y-m-d h:s",$vo["post_time"])); ?></p><r/>
                <h4><?php echo (htmlspecialchars_decode($vo["post_text"])); ?></h4>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
        <div><?php echo (L("REPLY")); ?>：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo U('Home/Topic/reply',array('tid'=>$topic_id));?>"><?php echo (L("EXP_REPLY")); ?></a>
            <br/>
            <form action="<?php echo U('Home/Topic/reply',array('tid'=>$topic_id));?>" method="post">
                <textarea name="editorValue" rows="5" style="width: 80%;"></textarea>
                <br/>
                <button class="btn btn-info" id="confirm"><?php echo (L("CONFIRM")); ?></button>
            </form>
        </div>
        <input type="hidden" value="<?php echo ($topic_id); ?>" name="tid">
        <input type="hidden" value="<?php echo ($user_id); ?>" name="uid">

        <nav>
          <ul class="pagination">
            <li>
              <a href="<?php echo U('Home/Topic/view',array('tid'=>$topic_id,'pn'=>$page-1));?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
                <?php if(is_array($num)): $i = 0; $__LIST__ = $num;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li <?php if($page == $i): ?>class="active"<?php endif; ?>><a href="<?php echo U('Home/Topic/view',array('tid'=>$topic_id,'pn'=>$i));?>"><?php echo ($i); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            <li>
              <a href="<?php echo U('Home/Topic/view',array('tid'=>$topic_id,'pn'=>$page+1));?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
    </div>
    <!-- <div class="row-fluid" name="title" style="background: #f5f5f5;width: 100%;height: 60px;margin-bottom: 10px;">
        <h2 class="text-center"><?php echo ($title); ?></p>
    </div>
    <hr/>
    <div class="row-fluid" name="text" style="background: #f5f5f5;height: 300px;margin-top: 10px;text-align: center;">
        <p><?php echo (htmlspecialchars_decode($text)); ?></p>
    </div>
    <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><div class="row" name="post" style="background: #f5f5f5;margin-top: 5px;
        margin-bottom: 5px;">
            <p>#<?php echo ($page*10+$k); ?>楼：<?php echo ($vo["post_poster"]); ?> 时间:<?php echo (date("Y-m-d h:s",$vo["post_time"])); ?></p><r/>
            <p><?php echo ($vo["post_text"]); ?></p>
        </div><?php endforeach; endif; else: echo "" ;endif; ?> -->
</div>
    <script src="/Public/dist/js/jquery.min.js"></script>
    <script src="/Public/dist/js/bootstrap.min.js"></script>
    <script src="/Public/dist/js/toastr.min.js"></script>
    <script type="text/javascript">
        // $("#confirm").click(function (){
        //         var messageOpts = {
        //             "closeButton" : true,//是否显示关闭按钮
        //             "debug" : false,//是否使用debug模式
        //             "positionClass" : "toast-top-center",//弹出窗的位置
        //             "showDuration" : "1500",//显示的动画时间
        //             "hideDuration" : "1000",//消失的动画时间
        //             "timeOut" : "5000",//展现时间
        //             "extendedTimeOut" : "1000",//加长展示时间
        //             "showEasing" : "swing",//显示时的动画缓冲方式
        //             "hideEasing" : "linear",//消失时的动画缓冲方式
        //             "showMethod" : "fadeIn",//显示时的动画方式
        //             "hideMethod" : "fadeOut" //消失时的动画方式
        //         };
        //         toastr.options = messageOpts;
        //     toastr.info('内容1');
        // });
        $("#fav").click(function (){
            var url = '<?php echo U("Home/Favorite/add");?>';
            var user_id = $("input[name=uid]");
            var topic_id = $("input[name=tid]");
            if(user_id.val()==0){
                alert("请登录后再操作");
            }
            $.post(url,{user_id : user_id.val(),topic_id : topic_id.val()},function(date){
                if(date.status==1){
                    alert("收藏成功!");
                }else{
                    alert("收藏失败!");
                }
            },'json');
        });
        $("#del").click(function (){
            var url = '<?php echo U("Home/Favorite/del");?>';
            var user_id = $("input[name=uid]");
            var fav_id = $("input[name=fav_id]");
            if(user_id.val()==0){
                alert("请登录后再操作");
            }
            
            $.post(url,{id : fav_id.val()},function(date){
                if(date.status==1){
                    alert("取消收藏成功!");
                }else{
                    alert("取消收藏失败!");
                }
            },'json');
        });
    </script>
</body>
</html>