<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>:: Simplify Supper ::</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
                <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,600,700,800,300' rel='stylesheet' type='text/css'>
                    <link type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" rel="stylesheet" />
                    <link type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-theme.css" rel="stylesheet" />
                    <link type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" rel="stylesheet" />
                    <!------css custom-------->
                    <link type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui-1.10.4.custom.css" rel="stylesheet" />



                    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.10.2.min.js" /></script>
                    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js" /></script>
                    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.main.js" /></script>
                    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.flexisel.js"></script>
                    <!-----custom script----->
                    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui-1.10.4.custom.js"></script>
                    <!------------------>

                    <link href="<?php echo Yii::app()->request->baseUrl; ?>/select2/select2.css" rel="stylesheet"/>
                    <script src="<?php echo Yii::app()->request->baseUrl; ?>/select2/select2.js"></script>








                    <script type="text/javascript">
                        $(document).ready(function() {
                            $(".serch-opner").click(function() {
                                $(".search-drop").slideToggle();
                            });
                            $(".login-link").click(function() {
                                $(".login-dropDown").slideToggle();
                            });
                        });
                        $('.carousel').carousel('cycle');

                    </script>
                    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/easyResponsiveTabs.js" type="text/javascript"></script>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $('#horizontalTab').easyResponsiveTabs({
                                type: 'default', //Types: default, vertical, accordion           
                                width: 'auto', //auto or any width like 600px
                                fit: true, // 100% fit in a container
                                closed: 'accordion', // Start closed if in accordion view
                                activate: function(event) { // Callback function if tab is switched
                                    var $tab = $(this);
                                    var $info = $('#tabInfo');
                                    var $name = $('span', $info);

                                    $name.text($tab.text());

                                    $info.show();
                                }
                            });

                            $('#verticalTab').easyResponsiveTabs({
                                type: 'vertical',
                                width: 'auto',
                                fit: true
                            });
                        });
                    </script>
                    <script type="text/javascript">

                        $(window).load(function() {
                            $("#flexiselDemo2").flexisel({
                                enableResponsiveBreakpoints: true,
                                responsiveBreakpoints: {
                                    portrait: {
                                        changePoint: 480,
                                        visibleItems: 1
                                    },
                                    landscape: {
                                        changePoint: 640,
                                        visibleItems: 2
                                    },
                                    tablet: {
                                        changePoint: 768,
                                        visibleItems: 3
                                    }
                                }
                            });
                        });
                    </script>
                    <!--[if lt IE 9]>
                            <script src="js/mediaquerylib.js"></script>
                    <![endif]-->
                    <!--[if IE]><script type="text/javascript" src="js/ie-responsive.js"></script><![endif]-->
                    </head>
                    <body>
                        <div class="container-fluid">
                            <div class="row">
                                <!-- ======================= Left Side Panel Start Here ======================= -->
                                <div class="col-lg-2 col-md-3 col-sm-12">
                                    <div class="dashbord-panel">
                                        <!-- //////////// User Image //////////// -->
                                        <div class="dash-top text-center">
                                            <a class="readmore" href="<?php echo Yii::app()->request->baseUrl.'/dashboard';?>">My Dashboard</a>
                                            <?php
                                            if (!Yii::app()->user->isGuest)
                                            {
                                                $path = Yii::app()->request->baseUrl . '/../../backend/www/images/';
                                                $findUsername = User::model()->findByAttributes(array('memberid' => Yii::app()->user->id));
                                                if (!empty($findUsername->photo))
                                                {
                                                    $path = Yii::app()->request->baseUrl . '/../../backend/www/images/' . $findUsername->photo;
                                                }
                                                ?>
                                                <img height="100" width="140" src="<?php echo $path; ?>" alt="" />
                                                <h3 class="user-name">Welcome Back</h3>
                                                <h3 class="user-name">
                                                    <?php
                                                    echo $findUsername->firstname;
                                                }
                                                ?>

                                            </h3>
                                        </div>

                                        <!-- //////////// Navigation //////////// -->
                                        <div class="bs-example">
                                            <ul class="nav nav-pills nav-stacked">
                                                <li class="active"><a href="#">Dashboard</a></li>
                                                <li><a href="<?php echo Yii::app()->request->baseUrl . '/dashboard/useraccountDetail' ?>">Account</a></li>
                                                <li><a href="#">Friends</a></li>
                                                <li><a href="<?php echo Yii::app()->request->baseUrl . '/dashboard/listuserrecipes' ?>">Recipes</a></li>

                                            </ul>
                                        </div>
                                        <!-- //////////// SocialMedia //////////// -->
                                        <div class="social-media">
                                            <h3 class="user-name">Connected friends</h3>
                                            <span class="abt-para abt-para01">These friends are connected with you on Simplify Supper</span>

                                            <!-- //////////// SocialMedia //////////// -->
                                            <div class="row clearfix">
                                                <div class="col-lg-12">
<!--                                                    <div class="social-media-holder">
                                                        <a href="#"><img class="img-responsive" src="<?php //echo Yii::app()->request->baseUrl ?>/images/img-sm.jpg"></a>
                                                        <a href="#"><img class="img-responsive" src="<?php //echo Yii::app()->request->baseUrl ?>/images/img-sm1.jpg"></a>
                                                        <a href="#"><img class="img-responsive" src="<?php //echo Yii::app()->request->baseUrl ?>/images/img-sm2.jpg"></a>
                                                        <a href="#"><img class="img-responsive" src="<?php //echo Yii::app()->request->baseUrl ?>/images/img-sm4.jpg"></a>
                                                        <a href="#"><img class="img-responsive" src="<?php //echo Yii::app()->request->baseUrl ?>/images/img-sm5.jpg"></a>
                                                        <a href="#"><img class="img-responsive" src="<?php //echo Yii::app()->request->baseUrl ?>/images/img-sm6.jpg"></a>
                                                        <a href="#"><img class="img-responsive" src="<?php //echo Yii::app()->request->baseUrl ?>/images/img-sm7.jpg"></a>
                                                        <a href="#"><img class="img-responsive" src="<?php //echo Yii::app()->request->baseUrl ?>/images/img-sm8.jpg"></a>
                                                    </div>-->
                                                </div>
                                            </div>

                                        </div>
                                        <div class="invite-panel">
                                            <h3 class="user-name">Invite friends</h3>
                                            <a href="#" class="pull-right readmore">Continue</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- ======================= Right Side Panel Start Here ======================= -->
                                <div class="col-lg-10 col-md-9 col-sm-12 col-xs-12 pull-right">

                                    <!-- ======= Header ====== -->
                                    <div id="header" class="clearfix header-manual">
                                        <div class="row">
                                            <!-- Logo -->       
                                            <div class="col-lg-2 col-sm-2 col-xs-6">                                             
                                                <a href="index.html"><img id="logo-header" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" alt="Logo" /></a>
                                            </div>
                                            <div class="login">
                                                <?php
                                                if (!empty(Yii::app()->user->id))
                                                {
                                                    ?>
                                                    <a class="login-link pull-right btn-danger" href="<?php echo Yii::app()->request->baseUrl . '/site/logout' ?>">Sign Out</a>
                                                    <a class="signup-link pull-right" href="<?php echo Yii::app()->request->baseUrl; ?>/site">Home</a>
                                                    <?php
                                                }
                                                ?>

                                                <div class="login-dropDown">
                                                    <form action="#">
                                                        <div class="row-holder">
                                                            <input type="text" class="username" placeholder="Email" />
                                                        </div>
                                                        <div class="row-holder">
                                                            <input type="password" class="password" placeholder="Password" />
                                                        </div>
                                                        <div class="row-holder">
                                                            <input id="rem" type="checkbox" />
                                                            <label for="rem" class="rem-me">Remember Me</label>
                                                        </div>
                                                        <div class="row-holder">
                                                            <input type="submit" value="Login" class="btn-login" />
                                                        </div>
                                                        <div class="row-holder text-center">
                                                            <span class="singOR">OR</span>
                                                        </div>
                                                        <div class="row-holder">
                                                            <a class="singnin-fb" href="#">SignIn With Facebook</a>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- /logo -->   
                                            <div class="col-lg-10 col-sm-10 col-xs-12 pull-right">                                             
                                                <div class="menu clearfix">
                                                    <div class="row">
                                                        <div class="col-lg-11 col-sm-11 col-xs-12">
                                                            <div class="navbar-header">
                                                                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                                                                    <img src="<?php echo Yii::app()->request->baseUrl ?>/images/bg-menu.png" alt="" />
                                                                </button>
                                                                <nav class="navbar-collapse bs-navbar-collapse collapse" role="navigation" style="height: auto;">
                                                                    <ul class="nav navbar-nav nav-custom">
                                                                        <li class="active">
                                                                            <a href="<?php echo Yii::app()->request->baseUrl.'/site/index/'?>">HOME</a>
                                                                        </li>
                                                                        <li class="dropdown">
                                                                            <a data-toggle="dropdown" href="#">RECIPES</a>
                                                                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                                                                <li><a href="<?php echo Yii::app()->request->baseUrl . '/site/allcategories/' ; ?>">All Categories</a></li>
                                                                                <?php
                                                                                $categoryName = Category::model()->findAllByAttributes(array('parent' => 0));
                                                                                foreach ($categoryName as $catList)
                                                                                {
                                                                                    ?>
                                                                                    <li><a href="<?php echo Yii::app()->request->baseUrl . '/site/categorydetails/' . $catList->id; ?>"><?php echo $catList->cat_name; ?></a></li>
                                                                                <?php } ?>
                                                                                <!--                                                                                <li><a href="#">Item One</a></li>
                                                                                                                                                                <li><a href="#">Item Two</a></li>
                                                                                                                                                                <li><a href="#">Item Three</a></li>
                                                                                                                                                                <li><a href="#">Item Four</a></li>
                                                                                                                                                                <li><a href="#">Item Five</a></li>-->
                                                                            </ul>
                                                                        </li>
                                                                        <li>
                                                                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/site/blog">BLOG</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#">FEEDBACK</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#">ABOUT US</a>
                                                                        </li>
                                                                    </ul>
                                                                </nav>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-1 col-sm-1 col-xs-12 pull-right">
                                                            <span class="serch-opner">Search Opner</span>
                                                            <div class="search-drop">
                                                                <form action="#">
                                                                    <input type="submit" value="Go" class="btn-search" />
                                                                    <div class="text">
                                                                        <input type="text" placeholder="search" />
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>    
                                    </div>



                                    <?php echo $content; ?>
                                </div>    
                            </div>
                        </div>    

                        <style>
                            #calender-meal .nbs-flexisel-inner {
                                padding: 0 184px;
                            }
                            .nbs-flexisel-inner {
                                float: left;
                                overflow: hidden;
                                width: 95%;
                            }
                        </style>