<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="language" content="en"/>

        <link rel="icon" href="<?php echo Yii::app()->request->baseUrl; ?>/favicon.ico" type="image/x-icon"/>
        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css"
              media="screen, projection"/>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css"
              media="print"/>

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui-1.10.4.custom.css"/>


        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css"
              media="screen, projection"/>
        <![endif]-->

        <?php
        // Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/jquery-ui-1.10.4.custom.js', CClientScript::POS_HEAD);
        ?>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>

        <div class="container" id="page">
            <?php
            $this->widget('bootstrap.widgets.TbNavbar', array(
                'type' => 'inverse', // null or 'inverse'
                'brand' => 'Simplify Supper (Admin)',
                'brandUrl' => '#',
                'collapse' => true, // requires bootstrap-responsive.css
                'items' => array(
                    array(
                        'class' => 'bootstrap.widgets.TbMenu',
                        'items' => array(
                            //array('label' => 'Home', 'url' => array('/site/index')),
                            array('label' => 'User', 'url' => array('/user/index')),
                            //add recips  
                            array('label' => 'Recipe', 'url' => array('product/index'), 'items' => array(
                                    array('label' => 'Manage Recipes', 'url' => array('Recipe/admin')),
                                    array('label' => 'Manage Categories', 'url' => array('category/index')),
                                    array('label' => 'Manage Ingredient', 'url' => array('ingredient/admin')),
                                    array('label' => 'Manage Measurement', 'url' => array('measurement/admin')),
                                    array('label' => 'Manage Recipe of Day', 'url' => array('RecipesOfDay/admin/')),
                                    array('label' => 'Manage Calendar', 'url' => array('recipe/calendar')),
                                )),
                            //==========================================================
                            array('label' => 'Advertisement', 'url' => array('product/index'), 'items' => array(
                                    array('label' => 'Manage StoreAds', 'url' => array('storead/admin')),
                                    array('label' => 'Manage Coupons', 'url' => array('coupon/admin')),
                                array('label' => 'Manage Banner', 'url' => array('banner/admin')),
                                )),
                            //=======================================================================
                            array('label' => 'Testimonial', 'url' => array('testimonial/admin')),
                            array('label' => 'Blog', 'url' => array('blog/admin/')),
                            array('label' => 'Comments', 'url' => array('comment/admin')),
//                            array('label' => 'Category', 'url' => array('/category/index')),
//                            array('label' => 'Ingredient', 'url' => array('/ingredient/index')),
//                            array('label' => 'Measurement', 'url' => array('/measurement/index')),
                            // array('label' => 'Testimonial', 'url' => array('testimonial/filterdropdown/')),
                            //array('label' => 'About', 'url' => array('/site/page', 'view' => 'about')),
                            //array('label' => 'Contact', 'url' => array('/site/contact')),
                            array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                            array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
                        ),
                    ),
                    '<form class="navbar-search pull-left" action=""><input type="text" class="search-query span2" placeholder="Search"></form>',
                ),
            ));
            ?>
            <!-- mainmenu -->
            <div class="container" style="margin-top:80px">
<?php if (isset($this->breadcrumbs)): ?>
                    <?php
                    $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
                        'links' => $this->breadcrumbs,
                    ));
                    ?><!-- breadcrumbs -->
                <?php endif ?>

                <?php echo $content; ?>
                <hr/>

                <!-- footer -->
            </div>
        </div>
        <!-- page -->
    </body>
</html>