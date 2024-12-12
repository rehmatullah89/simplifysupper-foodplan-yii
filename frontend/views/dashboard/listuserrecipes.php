
<!--======= Main Block ======-->
<div id="main-block">
    <!--======= Shopping List ======-->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <br/>
        <!-- //////// Title Bar Start //////// -->
        <h2 class="home-title">My Recipes</h2>

        <a class="readmore pull-right" href="<?php echo Yii::app()->request->baseUrl . '/dashboard/useraddrecipe' ?>">Add Recipe</a>
        <div class="clearfix"></div>
        <!-- //////// Title Bar Close //////// -->

        <hr/>

        <div class="row">

            <!-- //////// Page Details And Select Recipes Start //////// -->
            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
<!--                <span class="displaying-title">Displaying 3 of 3 recipes</span>-->
            </div>
            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                <form role="form">
                    <select class="select-recipy">
                        <option>Add Recipe</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>

                </form>
            </div>
            <p>&nbsp;</p>
            <div class="clearfix"></div>

            <!-- //////// Page Details And Select Recipes Close //////// -->

            <?php
            $path = Yii::app()->request->baseUrl . '/../../backend/www/images/';
            foreach ($models as $model)
            {
                ?>
                <!-- //////// Products Boxs Start //////// -->
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="img-pods">
                        <img src="<?php echo $path . '/' . $model->photo; ?>" class="img-responsive">
                        <h4><?php echo $model->title; ?></h4>
    <!--                        <span class="meal-time">Dinner, Breakfast</span>-->
                        <span class="meal-time">
                            <?php
                            if ($model->meal_for_breakfast == 1)
                                echo 'BreakFast  ';
                            if ($model->meal_for_lunch == 1)
                                echo 'Lunch ';
                            if ($model->meal_for_dinner == 1)
                                echo 'Dinner  ';
                            ?>
                        </span>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th class="text-right">Sub Category</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <?php
                                        $recipeCategories = RecipeCategory::model()->findAllByAttributes(array('recipe_id' => $model->id));
                                        foreach ($recipeCategories as $rc)
                                        {
                                            $categoryName = Category::model()->findAllByAttributes(array('id' => $rc->cat->id, 'parent' => 0));
                                            foreach ($categoryName as $categoryName)
                                            {
                                                echo $categoryName->cat_name . '<br>';
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td class="text-right">
                                        <?php
                                        foreach ($recipeCategories as $rc)
                                        {
                                            $criteria = new CDbCriteria();
                                            $criteria->select = "*";
                                            $criteria->addCondition('id=:categoryid');
                                            $criteria->addCondition("parent <> 0 ");
                                            $criteria->params = array(':categoryid' => $rc->cat->id);
                                            $subcategoryName = Category::model()->findAll($criteria);
                                            foreach ($subcategoryName as $subcategoryName)
                                            {
                                                echo $subcategoryName->cat_name . '<br>';
                                            }
                                        }
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="text-center">
                            <a href="<?php echo Yii::app()->request->baseUrl . '/site/recipedetail/' . $model->id ?>"><span class="col-lg-3 col-md-3 col-sl-3 col-xs-3 glyphicon glyphicon-eye-open"></span></a>
                            <a href="#"><span class="col-lg-3 col-md-3 col-sl-3 col-xs-3 glyphicon glyphicon-pushpin"></span></a>
                            <a href="#"><span class="col-lg-3 col-md-3 col-sl-3 col-xs-3 glyphicon glyphicon-pencil"></span></a>
                            <a href="#"><span class="col-lg-3 col-md-3 col-sl-3 col-xs-3 glyphicon glyphicon-trash"></span></a>
                        </div>
                    </div>
                </div>
                <!-- //////// Products Boxs Close //////// -->
            <?php } ?>
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


