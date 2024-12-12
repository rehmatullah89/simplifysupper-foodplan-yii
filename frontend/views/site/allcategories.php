
<!--======= Main Block ======-->
<div id="main-block">
    <!--======= Shopping List ======-->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <br/>
        <!-- //////// Title Bar Start //////// -->
        <h2 class="home-title">All Categories</h2>

<!--        <a class="readmore pull-right" href="<?php //echo Yii::app()->request->baseUrl . '/dashboard/useraddrecipe'  ?>">Add Recipe</a>-->
        <div class="clearfix"></div>
        <!-- //////// Title Bar Close //////// -->

        <hr/>

        <div class="row">

            <!-- //////// Page Details And Select Recipes Start //////// -->
            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
<!--                <span class="displaying-title">Displaying 3 of 3 recipes</span>-->
            </div>
            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">

            </div>
            <p>&nbsp;</p>
            <div class="clearfix"></div>

            <!-- //////// Page Details And Select Recipes Close //////// -->


            <?php
            $path = Yii::app()->request->baseUrl . '/../../backend/www/images/';
            foreach ($data as $value)
            {
                ?>

                <!-- //////// Products Boxs Start //////// -->
                <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                    <div class="img-pods">


                        <?php
                        if (!empty($value->photo))
                        {
                            ?>
                        <img src="<?php echo $path . '/' . $value->photo; ?>" class="img-responsive">
                            <?php
                        } else
                        {
                            ?>
                            <img src="<?php echo $path.'/image_preview.jpg'?>" class="img-responsive">
                            <?php
                        }
                        ?>



    <!--                        <img src="<?php //echo $path ."/" ?>" class="img-responsive">-->
                        <h4><a href="<?php echo Yii::app()->request->baseUrl . '/site/categorydetails/' . $value->id; ?>"><?php echo $value->cat_name; ?></a></h4>
                        <p><?php echo $value->cat_desc; ?></p>
    <!--                        <span class="meal-time">Dinner, Breakfast</span>-->


                        <div class="text-center">

    <!--                            <a href="<?php //echo Yii::app()->request->baseUrl . '/site/catgorydetail/'  ?>"><span class="col-lg-3 col-md-3 col-sl-3 col-xs-3 glyphicon glyphicon-eye-open"></span></a>
     <a href="#"><span class="col-lg-3 col-md-3 col-sl-3 col-xs-3 glyphicon glyphicon-pushpin"></span></a>
     <a href="#"><span class="col-lg-3 col-md-3 col-sl-3 col-xs-3 glyphicon glyphicon-pencil"></span></a>
     <a href="#"><span class="col-lg-3 col-md-3 col-sl-3 col-xs-3 glyphicon glyphicon-trash"></span></a>-->
                        </div>
                    </div>
                </div>
            <?php } ?>                <!-- //////// Products Boxs Close //////// -->

        </div>
    </div>
    <!--======= Featured Recipies ======-->

</div>
<?php
//$this->widget('CLinkPager', array(
//            'currentPage'=>$pages->getCurrentPage(),
//            'itemCount'=>$item_count,
//            'pageSize'=>1,
//            'maxButtonCount'=>5,
//            //'nextPageLabel'=>'My text >',
//            'header'=>'',
//        'htmlOptions'=>array('class'=>'pages'),
//        ));
?>


