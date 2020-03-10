<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Title -->
    <title><?php echo ($title); ?></title>

    <!-- Normalize And Bootstrap -->
    <link rel="stylesheet" href="/Public/dist/css/normalize.css">
    <link rel="stylesheet" href="/Public/dist/css/bootstrap.min.css">

    <!-- Google Font  -->
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:600,700,400,300' rel='stylesheet' type='text/css'>

    <!-- Font Icons -->
    <link rel="stylesheet" href="/Public/dist/css/font-awesome.min1.css" />

    <!-- Plugin Default Stylesheets -->
    <link rel="stylesheet" href="/Public/dist/css/magnific-popup.css">
    <link rel="stylesheet" href="/Public/dist/css/slider-pro.css">
    <link rel="stylesheet" href="/Public/dist/css/owl.carousel.css">
    <link rel="stylesheet" href="/Public/dist/css/owl.theme.css">
    <link rel="stylesheet" href="/Public/dist/css/owl.transitions.css">
    <link rel="stylesheet" href="/Public/dist/css/animate.css">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="/Public/dist/css/style2.css">
    <link rel="stylesheet" href="/Public/dist/css/responsive.css" />
    <link rel="stylesheet" href="/Public/dist/css/color.css" id="colors" />

    <!--[if lt IE 9]>
        <script src="js/html5shiv.min.js"></script>
        <script src="js/respond.min.js"></script>
        <script type="text/javascript" src="js/selectivizr.js"></script>
    <![endif]-->
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="status"></div>
    </div>

    <!-- =============================
                    Header
    ================================== -->
    <header>
        <!-- Navigation Menu start-->
        <nav class="navbar blete-main-menu" role="navigation">
            <div class="container">

                <!-- Navbar Toggle -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Logo -->
                    <a class="navbar-brand" href="index.html"><img class="logo" id="logo" src="/Public/dist/img/logo.png" alt="logo"></a>

                </div>
                <!-- Navbar Toggle End -->

                <!-- navbar-collapse start-->
                <div id="nav-menu" class="navbar-collapse collapse" role="navigation">
                    <ul class="nav navbar-nav blete-menu-wrapper">
                        <li class="active">
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a href="<?php echo U('Home/Index/hui');?>">回族</a>
                        </li>
                        <li>
                            <a href="<?php echo U('Home/Index/tu');?>">土家族</a>
                        </li>
                        <li>
                            <a href="<?php echo U('Home/Index/meng');?>">蒙古族</a>
                        </li>
                        <li>
                            <a href="<?php echo U('Home/Topic/forum');?>">论坛</a>
                        </li>
                        <?php if($login == false): ?><li>
                            <a href="<?php echo U('Home/User/login');?>">登陆</a>
                        </li>
                         <li>
                            <a href="<?php echo U('Home/User/register');?>">注册</a>
                        </li>
                        <?php else: ?>
                           <li><a href="<?php echo U('Home/User/space',array('uid'=>$user_id));?>"><?php echo ($username); ?></a></li><?php endif; ?>

                    </ul>
                </div>
                <!-- navbar-collapse end-->

            </div>
        </nav>
        <!-- Navigation Menu end-->
    </header>
    <!-- Header End -->


    <!-- =============================
                Main Slider
    ================================== -->
    <section class="slider-pro blete-slider" id="blete-slider">
        <div class="sp-slides">

            <!-- Slides -->
            <div class="sp-slide blete-main-slides">
                <div class="blete-img-overlay"></div>

                <img class="sp-image" src="/Public/dist/img/img-header/slider-img-1.jpg" alt="Slider 1"/>

                <h1 class="sp-layer blete-slider-text-big"
                data-position="center" data-show-transition="left" data-hide-transition="right" data-show-delay="1500" data-hide-delay="200">
                清真寺
                </h1>

                <p class="sp-layer"
                data-position="center" data-vertical="15%" data-show-delay="2000" data-hide-delay="200" data-show-transition="left" data-hide-transition="right">
                    <span class="blete-highlight-text">Qing</span> Zhen Si
                </p>
            </div>
            <!-- Slides End -->

            <!-- Slides -->
            <div class="sp-slide blete-main-slides">
            <div class="blete-img-overlay"></div>
                <img class="sp-image" src="/Public/dist/img/img-header/slider-img-2.jpg" alt="Slider 2"/>

                <h1 class="sp-layer blete-slider-text-big"
                 data-position="center" data-show-transition="left" data-hide-transition="right" data-show-delay="1500" data-hide-delay="200">
                   吊脚楼
                </h1>

                <p class="sp-layer"
                 data-position="center" data-vertical="15%" data-show-delay="2000" data-hide-delay="200" data-show-transition="left" data-hide-transition="right">
                    <span class="blete-highlight-text">Diao </span> Jiao Lou 
                </p>
            </div>
            <!-- Slides End -->

            <!-- Slides -->
            <div class="sp-slide blete-main-slides">
                <div class="blete-img-overlay"></div>

                <img class="sp-image" src="/Public/dist/img/img-header/slider-img-3.jpg" alt="Slider 3"/>

                <h1 class="sp-layer blete-slider-text-big"
                data-position="center" data-show-transition="left" data-hide-transition="right" data-show-delay="1000" data-hide-delay="200">
                    蒙古包 
                </h1>

                <p class="sp-layer"
                data-position="center" data-vertical="15%" data-show-delay="2000" data-hide-delay="200" data-show-transition="left" data-hide-transition="right">
                   <span class="blete-highlight-text">Meng</span> Gu Bao
                </p>

            </div>
            <!-- Slides End -->

        </div>
    </section>

    <section id="team" class="blete-section-wrapper blete-team-section">
        <div class="container">
            <div class="row">

                <!-- Section Header -->
                <div class="col-md-12 col-sm-12 col-xs-12 blete-section-header wow fadeInDown">
                    <h2><span class="blete-highlight-text">WarmStar</span> Team</h2>
                    <div class="blete-section-divider"></div>
                    <p class="col-md-8 col-sm-10 col-xs-12 col-md-offset-2 col-sm-offset-1">欢迎来到民族汇，在这里你将了解更多民族的文化交到各民族的朋友！</p>
                </div>
                <!-- Section Header End -->

                <!-- Team Slider -->
                <div id="team-slider" class="owl-carousel blete-team-carousal col-md-12 col-sm-12 col-xs-12 wow fadeIn" data-wow-duration="2s">

                    <!-- Slides -->
                    <div class="blete-team-slides col-md-12 col-sm-12 col-xs-12">

                        <div class="blete-member-img-wrapper">
                            <a href="<?php echo U('Home/Index/hui');?>"><img src="/Public/dist/img/img-team/hui.png" alt="Team Member 1"></a>
                        </div>

                        <div class="blete-member-details">
                            <h3>回族</h3>
                           <!--  <span class="blete-member-desg">Web Development</span> -->
                            <p>回族是中国分布最广的少数民族，在居住较集中的地方建有清真寺，又称礼拜寺。公元7世纪中叶，大批波斯和阿拉伯商人经海路和陆路来到中国的广州、泉州等沿海城市以及内地的长安、开封等地定居。公元13世纪，蒙古军队西征，西域人大批迁入中国，吸收汉、蒙古、维吾尔等民族成分，逐渐形成了一个统一的民族——回族。</p>
                           <!--  <ul class="blete-team-social-icon">
                                <li class="social-facebook">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li class="social-twitter">
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li class="social-gplus">
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                </li>
                            </ul> -->
                        </div>

                    </div>
                    <!-- Slides End -->

                    <!-- Slides -->
                    <div class="blete-team-slides col-md-12 col-sm-12 col-xs-12">

                        <div class="blete-member-img-wrapper">
                            <a href="<?php echo U('Home/Index/tu');?>"><img src="/Public/dist/img/img-team/tu.png" alt="Team Member 2"></a>
                        </div>

                        <div class="blete-member-details">
                            <h3>土家族</h3>
                           <!--  <span class="blete-member-desg">Web Designer</span> -->
                            <p>土家族是一个历史悠久的民族，世居毗连湘、鄂、渝、黔的武陵山地区。根据2015年第六次全国人口普查显示，土家族人口数量约为8,353,912人，在中国的55个少数民族中排名第七位，仅次于壮族、回族、满族、维族、苗族、彝族。</p>
                            <!-- <ul class="blete-team-social-icon">
                                <li class="social-facebook">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li class="social-twitter">
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li class="social-gplus">
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                </li>
                            </ul> -->
                        </div>

                    </div>
                    <!-- Slides End -->

                    <!-- Slides -->
                    <div class="blete-team-slides col-md-12 col-sm-12 col-xs-12">

                        <div class="blete-member-img-wrapper">
                            <a href="<?php echo U('Home/Index/meng');?>"><img src="/Public/dist/img/img-team/meng.png" alt="Team Member 3"></a>
                        </div>

                        <div class="blete-member-details">
                            <h3>蒙古族</h3>
                           <!--  <span class="blete-member-desg">Marketing</span> -->
                            <p>蒙古族（蒙古语：ᠮᠣᠩᠭᠣᠯᠦᠨᠳᠦᠰᠦᠲᠡᠨ，西里尔字母：Монгол үндэстэн），是主要分布于东亚地区的一个传统游牧民族，是中国的少数民族之一，同时也是蒙古国的主体民族。此外，蒙古族在俄罗斯等亚欧国家也有分布，鄂温克族和土族也有时被认为是蒙古族的分支。</p>
                           <!--  <ul class="blete-team-social-icon">
                                <li class="social-facebook">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li class="social-twitter">
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li class="social-gplus">
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                </li>
                            </ul> -->
                        </div>

                    </div>
                    <!-- Slides End -->

                    <!-- Slides -->
                   <!--  <div class="blete-team-slides col-md-12 col-sm-12 col-xs-12">

                        <div class="blete-member-img-wrapper">
                            <img src="images/img-team/team-img-4.png" alt="Team Member 4">
                        </div>

                        <div class="blete-member-details">
                            <h3>Jordi Doe</h3>
                            <span class="blete-member-desg">Web Development</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam quae, id cumque reprehenderit est. Facere quaerat reprehenderit maxime distinctio blanditiis laudantium nesciunt ratione cumque pariatur illum eius, non dignissimos eveniet!</p>
                            <ul class="blete-team-social-icon">
                                <li class="social-facebook">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li class="social-twitter">
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li class="social-gplus">
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                </li>
                            </ul>
                        </div>

                    </div> -->
                    <!-- Slides End -->

                </div>
                <!-- Team Slider End -->
            </div>
        </div>
    </section>
    <!-- Team Section End -->



    <!-- =============================
                    Skill Section
    ================================== -->
   
    <!-- Skill seciton End -->


    <!-- =============================
                Featured Work Section
    ================================== -->
  
    <!-- Featured Work End -->



    <!-- =============================
                Portfolio Section
    ================================== -->

    <!-- Portfolio Section End -->

    <!-- =============================
                Custom Section
    ================================== -->
    
    <!-- Pricing End -->


    <!-- =============================
                Contact Section
    ================================== -->
  

    <!-- Contact Section End -->


   <!-- =============================
                Footer Section
    ================================= -->
   <!--  <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h3>About</h3>
                    <ul>
                        <li><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum vitae nihil, culpa nemo dolore explicabo ipsa? Qui, et, porro. Nemo officiis possimus assumenda quia reiciendis asperiores aliquam quae minima, eos.</span></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h3>Related Post</h3>
                    <ul>
                        <li><a href="">lorem ipsum</a></li>
                        <li><a href="">lorem</a></li>
                        <li><a href="">lorem dolor</a></li>
                        <li><a href="">lorem</a></li>
                        <li><a href="">lorem</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h3>Page</h3>
                    <ul>
                        <li><a href="">lorem</a></li>
                        <li><a href="">lorem sit eta</a></li>
                        <li><a href="">lorem</a></li>
                        <li><a href="">lorem lorem ipsum</a></li>
                        <li><a href="">lorem ipsumlor</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h3>Featured Post</h3>
                    <ul>
                        <li><a href="">lorem meta tag</a></li>
                        <li><a href="">lorem intan sipsum</a></li>
                        <li><a href="">lorem ipsum</a></li>
                        <li><a href="">lorem</a></li>
                        <li><a href="">lorem mata</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </footer> -->
    <!-- Footer End -->
    <div class="thn">
         <div class="container thn">
            <div class="row">
                <div class="blete-footer-content">

                    <h6 class="blete-copyright-info">Copyright © 2017 WarmStar小组. All rights reserved. 苏ICP备16029243号</h6>

                </div>
            </div>
        </div>
    </div>


    <!-- =============================
                SCRIPTS
    ================================== -->
    <script src="/Public/dist/js/jquery-1.11.3.min.js"></script>
    <script src="/Public/dist/js/bootstrap.min.js"></script>
    <script src="/Public/dist/js/modernizr.min.js"></script>
    <script src="/Public/dist/js/jquery.easing.1.3.js"></script>
    <script src="/Public/dist/js/jquery.scrollUp.min.js"></script>
    <script src="/Public/dist/js/jquery.easypiechart.js"></script>
    <script src="/Public/dist/js/jquery.countTo.js"></script>
    <script src="/Public/dist/js/isotope.pkgd.min.js"></script>
    <script src="/Public/dist/js/jflickrfeed.min.js"></script>
    <script src="/Public/dist/js/jquery.fitvids.js"></script>
    <script src="/Public/dist/js/jquery.stellar.min.js"></script>
    <script src="/Public/dist/js/jquery.waypoints.min.js"></script>
    <script src="/Public/dist/js/wow.min1.js"></script>
    <script src="/Public/dist/js/jquery.nav.js"></script>
    <script src="/Public/dist/js/imagesloaded.pkgd.min.js"></script>
    <script src="/Public/dist/js/smooth-scroll.min.js"></script>
    <script src="/Public/dist/js/jquery.magnific-popup.min.js"></script>
    <script src="/Public/dist/js/jquery.sliderPro.min.js"></script>
    <script src="/Public/dist/js/owl.carousel.min.js"></script>
    <script src="/Public/dist/js/custom.js"></script>

</body>
</html>