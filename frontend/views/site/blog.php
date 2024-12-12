<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <!--	<title>:: Simplify Supper ::</title>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
            <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,600,700,800,300' rel='stylesheet' type='text/css'>
            <link type="text/css" href="css/bootstrap.css" rel="stylesheet" />
            <link type="text/css" href="css/bootstrap-theme.css" rel="stylesheet" />
            <link type="text/css" href="css/style.css" rel="stylesheet" />
            <script type="text/javascript" src="js/jquery-1.10.2.min.js" /></script>
            <script type="text/javascript" src="js/bootstrap.min.js" /></script>
            <script type="text/javascript" src="js/jquery.main.js" /></script>
            <script type="text/javascript" src="js/jquery.flexisel.js"></script>-->
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
        <script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
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

        <!--=======About Panel======-->
        <div id="about-panel">
            <div class="about-top blog-top">
                <div class="container">
                    <h2>Blog</h2>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <?php foreach ($getBlog as $blogValue) { ?>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <ul class="blog-list">
                                <li>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <img src="<?php echo Yii::app()->request->baseUrl ?>/img-blog1.jpg" alt="" class="img-responsive" />
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                            <strong class="title"><?php echo $blogValue->title; ?></strong>
                                            <div class="meta">
                                                <?php $findUserName = Member::model()->findByPk($blogValue->created_by);?>
                                                <span class="name-info"><?php echo $findUserName->firstname; ?></span>
                                                <em class="date"><?php echo $blogValue->created_at; ?></em>
                                            </div>
                                            <p><?php echo substr($blogValue->description, 0, 300); ?></p>
                                            <a class="readmore" href="<?php echo Yii::app()->request->baseUrl.'/site/blogdetail/'.$blogValue->id; ?>">Read More</a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                </li>
                            </ul>
                        </div>
                    <?php } ?>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-right">
                        <strong class="home-title">Sponserd Add</strong>
                        <ul class="sponserd-list">
                            <li>
                                <div class="top-info">
                                    <span class="bigger">It's 60% Bigger</span>
                                    <a href="#">abc.com</a>
                                </div>
                                <div class="row">
                                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                        <img src="<?php echo Yii::app()->request->baseUrl ?>/img-burger.jpg" alt="" class="img-responsive" />
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 row">
                                        <p class="spnsr-para">Lorem ipsum doller imet isdue ipsum doller imet imet isdu</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="top-info">
                                    <span class="bigger">It's 60% Bigger</span>
                                    <a href="#">abc.com</a>
                                </div>
                                <div class="row">
                                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                        <img src="<?php echo Yii::app()->request->baseUrl ?>/img-burger.jpg" alt="" class="img-responsive" />
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 row">
                                        <p class="spnsr-para">Lorem ipsum doller imet isdue ipsum doller imet imet isdu</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <h2 class="home-title">Favourite Recipes</h2>
                        <ul class="featured-list featured-list01">
                            <li>
                                <a href="#">
                                    <img src="<?php echo Yii::app()->request->baseUrl ?>/img-s1.jpg" alt="" />
                                    <div>Sweet and Savory <br />Sloppy Joes</div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="<?php echo Yii::app()->request->baseUrl ?>/img-s3.jpg" alt="" />
                                    <div>Apricot Chicken</div>
                                </a>
                            </li>
                            <span class="view-more pull-right"><a href="#">View More</a></span>
                        </ul>
                        <h2 class="home-title">Recipes Cetagory</h2>
                        <div class="category-widget">
                            <span class="title-cate">All Categories</span>
                            <ul class="cate-list">
                                <li>
                                    <a href="#">
                                        Vegitarion
                                        <span class="number pull-right">14</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Chiken
                                        <span class="number pull-right">34</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Fish
                                        <span class="number pull-right">54</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Pasta
                                        <span class="number pull-right">22</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Salad
                                        <span class="number pull-right">34</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Beef
                                        <span class="number pull-right">54</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
