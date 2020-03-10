<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title><?php echo ($title); ?></title>
<link href="/Public/dist/css/bootstrap.min.css" type="text/css" rel="stylesheet" media="all">
<link href="/Public/dist/css/style-meng.css" type="text/css" rel="stylesheet" media="all">
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //Custom Theme files -->
<!-- js -->
<script src="/Public/dist/js/jquery-1.11.1.min.js"></script>
<script src="/Public/dist/js/modernizr.custom.js"></script>
<!-- //js -->	
<!-- start-smoth-scrolling-->
<script type="text/javascript" src="/Public/dist/js/move-top.js"></script>
<script type="text/javascript" src="/Public/dist/js/easing.js"></script>	
<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
</script>
<!--//end-smoth-scrolling-->
<!--animate-->
<link href="/Public/dist/css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="/Public/dist/js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<style>
	.banner1 {
	  	min-height: 700px;
	  	background: url(/Public/dist/img/meng/banner.jpg)no-repeat 0px 0px;
	  	background-size: cover;
	}
	.banner2 {
		min-height: 700px;
		background: url(/Public/dist/img/meng/banner1.jpg)no-repeat 0px -114px;
		background-size: cover;
	}
	.callbacks_nav {
		position: absolute;
		-webkit-tap-highlight-color: rgba(0,0,0,0);
		bottom: 6%;
		left: 10%;
		z-index: 3;
		text-indent: -9999px;
		overflow: hidden;
		text-decoration: none;
		height: 40px;
		width: 40px;
		background: transparent url("/Public/dist/img/meng/icons.png") no-repeat 0px 0px;
	}
	.callbacks_nav.next {
  		left: 14%;
  		background: url(/Public/dist/img/meng/icons.png)no-repeat -47px 0px;
	}
</style>
<!--//end-animate-->
</head>
<body>
	<!--banner-->
	<div class="banner">		
		<!--header-->
		<div class="banner-text">
			<div class="logo">	
				<img src="/Public/dist/img/logo.png" alt=""/>
			</div> 
			<div class="top-nav">	
				<ul class="nav1 cl-effect-1">
					<li><a href="<?php echo U('Home/Index/index');?>">Home</a></li>
					<li><a href="#about" class="scroll">简介</a></li>
					<li><a href="#fushi" class="scroll">服饰</a></li>
					<li><a href="#products" class="scroll">景观</a></li>
					<li><a href="#team" class="scroll">饮食</a></li>
					<li><a href="/model/mgb/index.html">蒙古包模型</a></li>
					<!-- <li><a href="#contact" class="scroll">Contact</a></li> -->
				</ul>
			</div>
		</div>
		<!-- banner Slider starts Here -->
		<script src="/Public/dist/js/responsiveslides.min.js"></script>
		<script>
			// You can also use "$(window).load(function() {"
				$(function () {
				// Slideshow 3
					$("#slider3").responsiveSlides({
					auto: true,
					pager:false,
					nav:true,
					speed: 500,
					namespace: "callbacks",
					before: function () {
					$('.events').append("<li>before event fired.</li>");
					},
					after: function () {
						$('.events').append("<li>after event fired.</li>");
					}
				});	
			});
		</script>
		<!--//End-slider-script -->
		<div  id="top" class="callbacks_container">
			<ul class="rslides" id="slider3">
				<li>					
					<div class="banner2">						
					</div>
				</li>
				<li>					
					<div class="banner1">						
					</div>
				</li>								
			</ul>
		</div>
	</div>

	
	<div class="about" id="about">
		<div class="container">
			<div class="title">
				<h3>蓝蓝的天空 清清的湖水</h3>
				<h3>绿绿的草原 这是我的家</h3>
				<p>“蒙古”意为“永恒之火”。</p>
				<p>在古代蒙古语中，“蒙古”这个词是“质朴”的意思。</p>
				<p>也有人认为“蒙古”的原意是“天族”。</p>
				<p>“蒙兀”是“蒙古”一词最早的汉文译名，始见唐代。</p>
				 
			</div>
			<div class="about-grids">				
				<div class="col-md-6 about-info  wow fadeInLeft animated" data-wow-delay="0.5s" style="visibility: visible; -webkit-animation-delay: 0.5s;">
					<h4>草原·四季</h4>
					<p>春天，冰雪融化了。小草飘动着细细的嫩芽，花儿在风中散发着无限的幽香，草原的野草野花开始盛开了，五颜六色的，就像一块漂亮的地毯，披在呼伦贝尔的大地上。</p>
					<p>夏天这里空气清新,气温凉爽，是避暑度假的胜地。 一场细雨过后,一览草原风光.美丽的大草原一眼望不到边,蓝天白云、碧草绿浪、湖水涟漪、牛羊成群、点点毡房、袅袅炊烟,整个草原清新宁静。</p>
					<p>秋天，这里是一片金黄的世界。成熟的野果挂满枝头，微风吹来，草原翻卷起层层波浪，草香扑鼻，秋风佛过，散发开一阵阵沁人心扉的清香，整个草原好似一幅美丽的金色油画。</p>
					<p>冬天，这里经常的大雪纷飞，整个大地都变成了琼雕的草、玉琢的树。漫天雪花飞舞，给草原穿上了洁白的盛装。</p>
					<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;————《草原风光秀美 夜色令人陶醉》</p>
					
				</div>
				<div class="col-md-6 about-info  wow fadeInRight animated" data-wow-delay="0.5s" style="visibility: visible; -webkit-animation-delay: 0.5s;">
					<img src="/Public/dist/img/meng/img1.jpg" alt=""/>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	
    
	
	
	
	<div class="slid">
		<div class="container">
			<div class="wow fadeInRight animated" data-wow-delay=".5s" style="visibility: visible; -webkit-animation-delay: .5s;">
				<h3>Mongolian ethnic group is one of the history-honored nationalities in the North of China.</h3>
			</div>
		</div>
	</div>	
	
	<div class="features" id="fushi">
		<div class="container">			
			<div class="title">
				<h3>蒙古族服饰介绍</h3>
				<p>蒙古族服饰的起源可以追溯到遥远的史前时期。</p>
				<p>在北方游牧民族的岩画上</p>
				<p>已经看出蒙古高原的古人类在腰间围着一条短短的兽皮裙，</p>
				<p>头上插着长长的羽毛，有的臀部还有尾饰。</p>
				<p>而且已经有了大量粗拙的石环、骨饰等物品，</p>
				<p>说明在很早以前，北方游牧民族就有审美意向和审美追求了。</p>
			</div>
			<div class="features-info">
				<div class="col-md-4 features-grids wow bounceIn animated" data-wow-delay=".5s" style="visibility: visible; -webkit-animation-delay: .5s;">
					<figure class="effect-bubba">
						<img src="/Public/dist/img/meng/fushi1.jpg" alt=""/>
						<figcaption>
							<h4>身着蒙古服饰愉快玩耍的小孩</h4>
							<p>蒙古族服饰也称为蒙古袍，主要包括长袍、腰带、靴子、 首饰等。</p>	
						</figcaption>			
					</figure>		
				</div>
				<div class="col-md-4 features-grids wow bounceIn animated" data-wow-delay=".5s" style="visibility: visible; -webkit-animation-delay: .5s;">
					<figure class="effect-bubba">
						<img src="/Public/dist/img/meng/fushi2.jpg" alt=""/>
						<figcaption>
							<h4>可爱的蒙古小男孩</h4>
							<p>蒙古族服饰也称为蒙古袍，主要包括长袍、腰带、靴子、 首饰等。</p>	
						</figcaption>		
					</figure>		
				</div>
				<div class="col-md-4 features-grids wow bounceIn animated" data-wow-delay=".5s" style="visibility: visible; -webkit-animation-delay: .5s;">
					<figure class="effect-bubba">
						<img src="/Public/dist/img/meng/fushi3.jpg" alt=""/>
						<figcaption>
							<h4>蒙古一家子</h4>
							<p>男子喜穿软筒牛皮靴，长到膝盖，多戴蓝、黑褐色帽，也有的人用绸子缠头。</p>	
						</figcaption>			
					</figure>		
				</div>
				<div class="col-md-4 features-grids wow bounceIn animated" data-wow-delay=".5s" style="visibility: visible; -webkit-animation-delay: .5s;">
					<figure class="effect-bubba">
						<img src="/Public/dist/img/meng/fushi4.jpg" alt=""/>
						<figcaption>
							<h4>父与子</h4>
							<p>冬季多毡靴乌拉，高筒靴少见，开衩长袍、棉衣等,保留扎腰习俗。</p>	
						</figcaption>			
					</figure>		
				</div>
				<div class="col-md-4 features-grids wow bounceIn animated" data-wow-delay=".5s" style="visibility: visible; -webkit-animation-delay: .5s;">
					<figure class="effect-bubba">
						<img src="/Public/dist/img/meng/fushi5.jpg" alt=""/>
						<figcaption>
							<h4>身着蒙古族服饰的女人们</h4>
							<p>女子多用红、蓝色头帕缠头，冬季和男子一样戴圆锥形帽。</p>	
						</figcaption>			
					</figure>		
				</div>
				<div class="col-md-4 features-grids wow bounceIn animated" data-wow-delay=".5s" style="visibility: visible; -webkit-animation-delay: .5s;">
					<figure class="effect-bubba">
						<img src="/Public/dist/img/meng/fushi6.jpg" alt=""/>
						<figcaption>
							<h4>蒙古族摔跤服</h4>
							<p>蒙古族摔跤服是蒙古族服饰工艺。摔跤服装包括坎肩、长裤、套裤、彩绸腰带。</p>	
						</figcaption>		
					</figure>		
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>


	<div class="features" id="products">
		<div class="container">			
			<div class="title">
				<h3>蒙古族景观介绍</h3>
				<p>“草原茫茫天地间  洁白的蒙古包撒落在河边</p>
				<p>我的心爱在高山   高山深处是巍巍的大兴安</p>
				<p>林海茫茫云雾间   矫健的雄鹰俯瞰着草原</p>
				<p>呼伦贝尔大草原   白云朵朵飘在飘在我心间</p>
				<p>呼伦贝尔大草原   我的心爱我的思恋”</p>
				<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;——《呼伦贝尔大草原》</p>
			</div>
			<div class="features-info">
				<div class="col-md-4 features-grids wow bounceIn animated" data-wow-delay=".5s" style="visibility: visible; -webkit-animation-delay: .5s;">
					<figure class="effect-bubba">
						<img src="/Public/dist/img/meng/jingguan1.jpg" alt=""/>
						<figcaption>
							<h4>呼伦贝尔草原</h4>
							<p>呼伦贝尔草原是著名的天然牧场，总面积10万平方千米，世界著名的三大草原之一</p>	
						</figcaption>			
					</figure>		
				</div>
				<div class="col-md-4 features-grids wow bounceIn animated" data-wow-delay=".5s" style="visibility: visible; -webkit-animation-delay: .5s;">
					<figure class="effect-bubba">
						<img src="/Public/dist/img/meng/jingguan2.jpg" alt=""/>
						<figcaption>
							<h4>蒙古包</h4>
							<p>蒙古包是蒙古族房屋的一大特色、一大亮点</p>	
						</figcaption>		
					</figure>		
				</div>
				<div class="col-md-4 features-grids wow bounceIn animated" data-wow-delay=".5s" style="visibility: visible; -webkit-animation-delay: .5s;">
					<figure class="effect-bubba">
						<img src="/Public/dist/img/meng/jingguan3.jpg" alt=""/>
						<figcaption>
							<h4>蒙古夜景</h4>
							<p>微风拂人，草香袭人，月光诱人，水波撩人，鸟声动人。</p>	
						</figcaption>			
					</figure>		
				</div>
				<div class="col-md-4 features-grids wow bounceIn animated" data-wow-delay=".5s" style="visibility: visible; -webkit-animation-delay: .5s;">
					<figure class="effect-bubba">
						<img src="/Public/dist/img/meng/jingguan4.jpg" alt=""/>
						<figcaption>
							<h4>乌梁素海</h4>
							<p>总面积300平方公里，海域宽阔，水产丰富，风光旖旎，是自治区级自然保护区。</p>	
						</figcaption>			
					</figure>		
				</div>
				<div class="col-md-4 features-grids wow bounceIn animated" data-wow-delay=".5s" style="visibility: visible; -webkit-animation-delay: .5s;">
					<figure class="effect-bubba">
						<img src="/Public/dist/img/meng/jingguan5.jpg" alt=""/>
						<figcaption>
							<h4>牛羊成群</h4>
							<p>阳光明媚，牛羊成群， 蓝天白云之下，一幅天然的草原风情画呈现在眼前</p>	
						</figcaption>			
					</figure>		
				</div>
				<div class="col-md-4 features-grids wow bounceIn animated" data-wow-delay=".5s" style="visibility: visible; -webkit-animation-delay: .5s;">
					<figure class="effect-bubba">
						<img src="/Public/dist/img/meng/jingguan6.jpg" alt=""/>
						<figcaption>
							<h4>乌梁素海</h4>
							<p>乌梁素海旅游景区位于乌拉特前旗中部，距旗政府所在地乌拉山镇12公里。</p>	
						</figcaption>		
					</figure>		
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--//products-->
	<!--team-->
	<div class="team" id="team">
		<div class="container">
			<div class="title">
				<h3>蒙古族饮食文化</h3>
				<p>蒙古族牧民视绵羊为生活的保证、财富的源泉。 </p>
				<p>日食三餐，每餐都离不开奶与肉。</p>
				<p>蒙古族的传统饮食大致有四类，即面食、肉食、奶食、茶食。</p>
				<p>通常，蒙古族称肉食为“红食”，蒙语叫“乌兰伊德”；</p>
				<p>称奶食为“白食”，蒙语叫“查干伊德”（纯洁、吉祥、崇高之意）。</p>
				
			</div>
			<!-- flex-slider -->
			<div class="work-bottom">
				<div class="nbs-flexisel-container"><div class="nbs-flexisel-inner"><ul id="flexiselDemo1" class="nbs-flexisel-ul" style="left: -285px; display: block;">																																		
					<li class="nbs-flexisel-item" style="width: 285px;">
						<div class="team-left">
							<img src="/Public/dist/img/meng/meishi8.jpg" alt="">
							<div class="team-bottom">
								<h4>马奶酒</h4>
								<p>牧民们祖祖辈辈生活在草原，年年月月都离不开马奶酒。</p>
							</div>
						</div>
					</li>
					<li class="nbs-flexisel-item" style="width: 285px;">
						<div class="team-left">
							<img src="/Public/dist/img/meng/meishi1.jpg" alt="">
							<div class="team-bottom">
								<h4>奶类食品</h4>
								<p>蒙古语称"查干伊得"，意为圣洁、纯净的食品</p>
							</div>
						</div>
					</li>
					<li class="nbs-flexisel-item" style="width: 285px;">
						<div class="team-left">
							<img src="/Public/dist/img/meng/meishi2.jpg" alt="">
							<div class="team-bottom">
								<h4>奶类食品</h4>
								<p>奶皮子、奶酪、奶酥、奶油、奶酪丹（奶豆腐）等</p>
							</div>
						</div>
					</li>
					<li class="nbs-flexisel-item" style="width: 285px;">
						<div class="team-left">
							<img src="/Public/dist/img/meng/meishi3.jpg" alt="">
							<div class="team-bottom">
								<h4>白食</h4>
								<p>羊奶、马奶、鹿奶和骆驼奶，其中少部分做为鲜奶饮料，大部分加工成奶制品。</p>
							</div>
						</div>
					</li>
					<li class="nbs-flexisel-item" style="width: 285px;">
						<div class="team-left">
							<img src="/Public/dist/img/meng/meishi4.jpg" alt="">
							<div class="team-bottom">
								<h4>红食（乌兰伊德）</h4>
								<p>炉烤带皮整羊或称阿拉善烤全羊，最常见的是手扒羊肉。</p>
							</div>
						</div>
					</li>
					<li class="nbs-flexisel-item" style="width: 285px;">
						<div class="team-left">
							<img src="/Public/dist/img/meng/meishi5.jpg" alt="">
							<div class="team-bottom">
								<h4>红食（乌兰伊德）</h4>
								<p>以肉类为原料制成的食品</p>
							</div>
						</div>
					</li>
					<li class="nbs-flexisel-item" style="width: 285px;">
						<div class="team-left">
							<img src="/Public/dist/img/meng/meishi6.png" alt="">
							<div class="team-bottom">
								<h4>羊肉串</h4>
								<p>众所周知的蒙古烤串儿</p>
							</div>
						</div>
					</li>
					<li class="nbs-flexisel-item" style="width: 285px;">
						<div class="team-left">
							<img src="/Public/dist/img/meng/meishi7.jpg" alt="">
							<div class="team-bottom">
								<h4>马奶酒</h4>
								<p>马奶酒是牧民亲自酿制的传统名贵饮料。</p>
							</div>
						</div>
					</li>
				</ul>
				<div class="nbs-flexisel-nav-left" style="top: 138px;"></div><div class="nbs-flexisel-nav-right" style="top: 138px;"></div></div></div>
					<script type="text/javascript">
							$(window).load(function() {
								$("#flexiselDemo1").flexisel({
									visibleItems: 4,
									animationSpeed: 1000,
									autoPlay: true,
									autoPlaySpeed: 3000,    		
									pauseOnHover: true,
									enableResponsiveBreakpoints: true,
									responsiveBreakpoints: { 
										portrait: { 
											changePoint:480,
											visibleItems: 2
										}, 
										landscape: { 
											changePoint:640,
											visibleItems: 3
										},
										tablet: { 
											changePoint:768,
											visibleItems: 3
										}
									}
								});
								
							});
					</script>
					<script type="text/javascript" src="/Public/dist/js/jquery.flexisel.js"></script>				
					<!-- //flex-slider -->	
			</div>
		</div>
	</div>	
	

	<script type="text/javascript">
			$(document).ready(function() {
				/*
				var defaults = {
					containerID: 'toTop', // fading element id
					containerHoverID: 'toTopHover', // fading element hover id
					scrollSpeed: 1200,
					easingType: 'linear' 
				};
				*/
				
				$().UItoTop({ easingType: 'easeOutQuart' });
				
			});
		</script>
		<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!--//smooth-scrolling-of-move-up-->
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/Public/dist/js/bootstrap.min.js"> </script>
</body>
</html>