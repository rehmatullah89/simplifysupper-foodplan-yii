
<div id="about-panel">
    <div class="about-top blog-top">
        <div class="container">
            <h2><?php echo $categoryDetails->cat_name; ?></h2>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <a class="wek-recipy" href="#">Weekly Special</a>
                    <a class="wek-recipy" href="#">Logo</a>

                </div>
                <div class="clearfix"></div>
                <ul class="recipy-list">

                    <?php
                    $path = Yii::app()->request->baseUrl . '/../../backend/www/images/';
                    $findRecipesofCats = RecipeCategory::model()->findAllByAttributes(array('cat_id' => $categoryDetails->id));
                    foreach ($findRecipesofCats as $reipes)
                    {
                        ?>

                        <li class="row">
                            <?php
                            if (empty($reipes->recipe->photo))
                            {
                                ?><div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                    <img src="images/recp-01.jpg" alt="" class="img-responsive" />
                                </div>

                                <?php
                            } else
                            {
                                ?>
                                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                    <img src="<?php echo $path . '/' . $reipes->recipe->photo; ?>" alt="" class="img-responsive" />
                                </div>
                                <?php
                            }
                            ?>
                            <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
                                <a href="<?php echo Yii::app()->request->baseUrl.'/site/recipedetail/'.$reipes->recipe_id;?>"><span class="title-comments"><?php echo $reipes->recipe->title; ?></span></a>
                                <p class="blog-para"><?php echo $reipes->recipe->description; ?></p>
                            </div>
<!--                            <a class="view-more" href="#">Read more</a>-->
                        </li>
                    <?php } ?>




                </ul>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 col-lg-offset-1">
<!--                    <div class="page-hoder row">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <p class="abt-para abt-para01 abt-para03">Displaying <em>1</em> of <em>20</em> (of <em>21</em> Categories)</p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right">
                                									<ul class="pagination pagination-custom pull-right">
                                                                                                                <li class="previous"><a href="#">&lt;&lt;</a></li>
                                                                                                                <li><a href="#">1</a></li>
                                                                                                                <li><a href="#">2</a></li>
                                                                                                                <li><a href="#">3</a></li>
                                                                                                                <li><a href="#">4</a></li>
                                                                                                                <li class="next"><a href="#">&gt;&gt;</a></li>
                                                                                                        </ul>
                            </div>
                        </div>
                    </div>-->
                </div>
            </div>
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
                                <img src="images/img-burger.jpg" alt="" class="img-responsive" />
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
                                <img src="images/img-burger.jpg" alt="" class="img-responsive" />
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
                            <img src="images/img-s1.jpg" alt="" />
                            <div>Sweet and Savory <br />Sloppy Joes</div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="images/img-s3.jpg" alt="" />
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
