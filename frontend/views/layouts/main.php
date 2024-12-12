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
                    
                    <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>


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
                        //==
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
                        <!--=======Header======-->

                        <div>


                        </div>
                        <div id="header">             
                            <div class="container"> 
                                <div class="row">
                                    <!-- Logo -->       
                                    <div class="col-lg-2 col-sm-2 col-xs-6">                                             
                                        <a href="index.php"><img id="logo-header" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" alt="Logo" /></a>
                                    </div>
                                    <div class="login">


                                        <?php
                                        if (Yii::app()->user->isGuest)
                                        {
                                            ?>
                                            <a class="login-link pull-right" href="#">Login</a>
                                            <a class="signup-link pull-right" href="<?php echo Yii::app()->request->baseUrl; ?>/site/join/">SignUp</a>
                                            <?php
                                        } else
                                        {
                                            ?>
                                            <a class="signup-link pull-right" href="<?php echo Yii::app()->request->baseUrl; ?>/site/logout">Logout</a>

                                            <a class="signup-link pull-right" href="<?php echo Yii::app()->request->baseUrl; ?>/dashboard">Dashboard</a>

                                        <?php } ?>

                                        <div class="login-dropDown">

                                            <form action="" id="login-form">
                                                <p id="loginerror-title">Please fix following input errors!</p>
                                                <ul id="error-holder" class="login-errors">
                                                </ul>
                                                <div class="row-holder">
                                                    <input type="text" class="username" placeholder="Email" id="email" />
                                                </div>
                                                <div class="row-holder">
                                                    <input type="password" class="password" placeholder="Password" id="password"/>
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
                                                    <a class="singnin-fb" href="https://www.facebook.com/dialog/oauth?client_id=716978615033533&redirect_uri=http://localhost/simplifysupper/frontend/www/site/join/&scope=email">SignIn With Facebook</a>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                    <!-- /logo -->   
                                    <div class="col-lg-8 col-sm-10 col-xs-12 pull-right">                                             

                                        <div class="menu clearfix">
                                            <div class="row">
                                                <div class="col-lg-11 col-sm-11 col-xs-12">
                                                    <div class="navbar-header">
                                                        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                                                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/bg-menu.png" alt="" />
                                                        </button>
                                                        <ul class="nav navbar-nav nav-custom">
                                                            <li class="active">
                                                                <a href="<?php echo Yii::app()->homeUrl; ?>">HOME</a>
                                                            </li>
                                                            <li class="dropdown">
                                                                <a data-toggle="dropdown" href="#">RECIPES</a>
                                                                <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                                                    <li><a href="<?php echo Yii::app()->request->baseUrl . '/site/allcategories/'; ?>">All Categories</a></li>

                                                                    <?php
                                                                    $categoryName = Category::model()->findAllByAttributes(array('parent' => 0));
                                                                    foreach ($categoryName as $catList)
                                                                    {
                                                                        ?>
                                                                        <li><a href="<?php echo Yii::app()->request->baseUrl . '/site/categorydetails/' . $catList->id; ?>"><?php echo $catList->cat_name; ?></a></li>
                                                                    <?php } ?>
                                                                    <!--                                                               
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
                                                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/site/feedback">FEEDBACK</a>
                                                            </li>
                                                            <li>
                                                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/site/aboutus">ABOUT US</a>
                                                            </li>
                                                            <li>
                                                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/site/join"> JOIN FREE</a>
                                                            </li>
                                                        </ul>

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
                        </div>
                        <?php echo $content; ?>

                        <!--=======Footer======-->
                        <div id="footer">
                            <div class="footer-top">
                                <div class="row">
                                    <div class="container">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs 12">
                                            <strong class="f-title">About</strong>
                                            <ul class="site-links">
                                                <li><a href="#">About Us</a></li>
                                                <li><a href="#">Contact Us</a></li>
                                                <li><a href="#">FAQs</a></li>
                                                <li><a href="#">Testimonials</a></li>
                                                <li><a href="#">Be Our Sponsor</a></li>
                                                <li><a href="#">Terms of Service</a></li>
                                                <li><a href="#">Privacy Policy</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs 12">
                                            <strong class="f-title">Categories</strong>
                                            <ul class="site-links">
                                                <li><a href="#">Beef Recipes</a></li>
                                                <li><a href="#">Chicken Recipes</a></li>
                                                <li><a href="#">Dessert Recipes</a></li>
                                                <li><a href="#">Fish Recipes</a></li>
                                                <li><a href="#"> Healthy Recipes</a></li>
                                                <li><a href="#">Vegetarian Recipes</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs 12">
                                            <strong class="f-title">Testimonial</strong>
                                            <div class="testimonial">
                                                <div class="img-holder">
                                                    <img src="<?php //echo Yii::app()->request->baseUrl;           ?>/images/img02.jpg" alt="" />
                                                </div>
                                                <div class="txt-holder">
                                                    <span class="testi-name">Emily</span>
                                                    <p>Simplify Supper makes my life easier. It helps me cook great meals, saves me time and money. Keep the spirits
                                                        high Krista. </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs 12">
                                            <strong class="f-title">Stay Connected</strong>
                                            <ul class="site-links">
                                                <li><img src="<?php //echo Yii::app()->request->baseUrl;           ?>/images/img-connect.jpg" alt="" class="img-responsive" /></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="footer-bottom">
                                <div class="row">
                                    <div class="container">
                                        <div class="col-lg-4 col-sm-6 col-xs-12">
                                            <p class="copy-right">&copy;<?php //echo date('Y');           ?> Simplify Supper, LLC.</p>
                                        </div>
                                        <div class="col-lg-3 col-sm-3 col-xs-12 pull-right">
                                            <ul class="social-networks">
                                                <li class="fb"><a href="#">facebook</a></li>
                                                <li class="tw"><a href="#">Twitter</a></li>
                                                <li class="pint"><a href="#">pinterest</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </body>
                    </html>
                    <style>

                        #error-holder
                        {
                            list-style-type: none;
                            background-color: pink;
                            font-size: 12px;
                            margin-left:0px;
                        }
                        #error-holder li
                        {
                            margin-left:10px;
                        }
                        #loginerror-title
                        {
                            margin-bottom:5px;
                            font-size: 12px;
                            display: none;
                        }
                    </style>
