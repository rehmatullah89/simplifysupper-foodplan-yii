<?php
$path = Yii::app()->request->baseUrl . '/../../backend/www/images/';
?>

<!--=======About Panel======-->
<div id="about-panel">

    <div class="about-top blog-top">
        <div class="container">
            <h2><?php echo $recipeDetails->title; ?></h2>
        </div>
    </div>  
    <!----------------------->
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                <!-- Recipe Top Details Start -->
                <div class="sh-RecipeDetailTop">
                    <div class="sh-RecipeDetailTop-Banner"><img width="620px" height="420px" src="<?php echo $path; ?>/<?php echo $recipeDetails->photo; ?>" /></div>
                    <div class="col-lg-9 col-md-6 col-sm-12 col-xs-12 row"><h3>Serving sizes will vary per recipe. Adjust your serving size here.</h3></div>
                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 pull-right title">
                        <img class="pull-right" src="<?php echo Yii::app()->baseUrl; ?>/images/sh-RecipeDetail-iconPrentst.jpg" />
                        <img class="pull-right" src="<?php echo Yii::app()->baseUrl; ?>/images/sh-RecipeDetail-iconFacebook.jpg" />
                        <img class="pull-right" src="<?php echo Yii::app()->baseUrl; ?>/images/sh-RecipeDetail-iconTweeter.jpg" />
                        <img class="pull-right" src="<?php echo Yii::app()->baseUrl; ?>/images/sh-RecipeDetail-iconHeart.jpg" />
                    </div>
                    <div class="clearfix"></div>
                    <div class="RecipeDetailTopValue">
                        <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 title">Serving Size:</div>
                        <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 field">
                            <div class="row">
                                <div class="col-lg-10 pull-left">
                                    <input type="range" name="rangeInput" id="serving-size" min="0" max="200" value="<?php echo $recipeDetails->serving_size; ?>" onchange="updateTextInput(this.value);">                                                       
                                </div>
                                <div id="hiddenservingsize" style="display: none;"><?php echo $recipeDetails->serving_size; ?></div>
                                <div id="hiddenrecipeid" style="display: none;"><?php echo $recipeDetails->id; ?></div>
                                <div class="col-lg-2 pull-right">
                                    <div id="servings" style="border: 1px grey solid; text-align: center;"></div>
                                </div>

                            </div>
                        <!--                                <input type="text" value="02" class="input-value"><img src="<?php //echo Yii::app()->baseUrl;                            ?>/images/sh-scroll.jpg" />-->
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 sh-btn"><a href="#" id="RecipeBtnforServingSize" class="RecipeBtn">Show Recipe with Selected Size</a></div>
                    </div>
                    <div>&nbsp;</div>
                    <div class="col-lg-9 col-md-8 row"><h3>Add to Calender</h3></div>
                    <div class="clearfix"></div>
                    <div class="RecipeDetailTopValue">
                        <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 title">Select Date:</div>
                        <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 field">

                            <div class="form-group">
                                <input type="text" id="datepicker">
                                <!--                                                            <div id="datetimepicker1" class="input-group date">
                                                                                                <input type="text" class="form-control">
                                                                                                <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span>
                                                                                                </span>
                                                                                            </div>-->
                            </div>
                        </div>
                        <?php
                        if (Yii::app()->user->isGuest)
                        {
                            ?>
                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 sh-btn"><a data-toggle="modal" data-target="#myModalLoginShow" href="#" class="RecipeBtn">Add to My Calender</a></div>
                            <?php
                        } else
                        {
                            ?>
                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 sh-btn"><a data-toggle="modal" data-target="#" href="#" id="RecipeBtnAddtoCalendar" class="RecipeBtn">Add to My Calender</a></div>
                            <?php
                        }
                        ?>
                    </div>

                </div>
                <!-- Recipe Top Details Close -->

                <!-- sh-Recipe Middel Details Start -->
                <div class="row alert alert-success" style="width:50%; display:none;margin-left: 0px;" id="set-recipe-status">The selected recipe has been saved</div>
                <div class="row alert alert-danger" style="width:50%; display:none; margin-left: 0px;" id="set-recipe-exists">You have already selected this recipe on this date</div>
                <div class="sh-RecipeFor-Details">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><h1>Recipe For: <span><?php echo $recipeDetails->title; ?></span></h1></div>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 RecipeDataBox">
                            <h3>Taking the Blah Out</h3>
                            <div class="Y-bg-box">
                                <ul class="Ingredients">
                                    <?php
                                    $getIngredients = RecipeIngredient::model()->findAllByAttributes(array('recipe_id' => $recipeDetails->id));
                                    foreach ($getIngredients as $IngVal)
                                    {
                                        ?>
                                        <li class="amount"><?php echo $IngVal->amount . ' ' . $IngVal->ingredient->ingredient ?></li>
                                        <?php
                                    }
                                    ?>
                                    <!--                                        <li>2 large Carrots, diced</li>
                                                                            <li>2 large Celery Stalks, diced</li>
                                                                            <li>1 can Diced Tomatoes, 14 oz. size</li>
                                                                            <li>2 pounds Ground Beef</li>
                                                                            <li>1 cup Milk</li>
                                                                            <li>1 tablespoon Olive Oil</li>
                                                                            <li>1 tablespoon Oregano</li>
                                                                            <li>4 ounces Pancetta, cubed</li>
                                                                            <li>1 pound Spaghetti</li>
                                                                            <li>2 tablespoons Sugar</li>
                                                                            <li>1 large Yellow Onion, diced</li>-->
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 RecipeDataBox">
                            <h3>Nutrition Facts</h3>
                            <div class="Y-bg-box"><div class="Y-bg-box-inner">
                                    <p>Serving Size: 0 gm</p>
                                    <p>Serving Per Recipe: 4</p>
                                    <dl>
                                        <dt><strong>Amount Per Serving:</strong></dt>
                                        <dt>Calories: 0 <span class="pull-right text-right">%Daily Value*</span></dt>

                                        <dt><strong>Total Fat:</strong><span class="pull-right text-right">0 gm</span></dt>
                                        <dd>Saturated Fat: 0 gm<span class="pull-right text-right">0%</span></dd>
                                        <dd>Polyunsaturated Fat: 0 gm</dd>
                                        <dd>Monounsaturated Fat: 0 gm</dd>

                                        <dt><strong>Cholesterol:</strong> 0 mg<span class="pull-right text-right">0%</span></dt>
                                        <dt><strong>Sodium:</strong> 0 mg<span class="pull-right text-right">0%</span></dt>
                                        <dt><strong>Total Carbohydrates:</strong> 0 mg<span class="pull-right text-right">0%</span></dt>

                                        <dd><strong>Dietry Fiber</strong> 0 gm 0%</dd>
                                        <dd><strong>Sugars:</strong> 0 gm</dd>

                                        <dt><strong>Proteins:</strong> 0 gm</dt>
                                    </dl>
                                </div></div>
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 RecipeDataBox">
                            <h3>Instructions</h3>
                            <div class="Y-bg-box">
                                <ol>
                                    <li><?php echo $recipeDetails->directions; ?></li>

                                                <!--                                    <li><strong>1.</strong> Bring a large pot of lightly salted water to a rolling boil. Cooin the boiling water until al dente.</li>
                                                                                    <li><strong>2.</strong> Meanwhile heat the olive oil in a large pot over medium heatrisp, about 5 
                                                                                        minutes. Stir 
                                                                                        mixture; cook and stir until the beef is completely cooked and no longer pink, 8 to 10 minutes.</li>
                                                                                    <li><strong>3.</strong> Pour the beef stock over the ground beef mixture; allow to simmaporates, about 5 minutes.</li>
                                                                                    <li><strong>4.</strong> Pour the milk, the crushed tomatoes with juice and thbeef mixture; bring the mixture to a boil,
                                                                                    </li>
                                                                                    <li><strong>5.</strong> Ladle the sauce over the cooked spaghetti. Top with Parmesan cheese to serve</li>-->
                                </ol>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- sh-Recipe Middel Details Close -->
                <p>&nbsp;</p>
                <hr/>
                <!-- Adds Coppon Area Start -->
                <div class="sh-AddsCoponArea">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 row">
                            <h3>In Store Ads</h3>
                            <ul class="sh-AddStore">
                                <?php
                                foreach ($recipeDetails->recipeCategories as $data)
                                {
                                    $findstoreadsbycats = StoreadCategory::model()->findAllByAttributes(array('cat_id' => $data->cat_id));
                                    foreach ($findstoreadsbycats as $findstoread)
                                    {
                                        ?>
                                        <li>
                                            <img width="100" height="60" src="<?php echo $path ?>/<?php echo $findstoread->storad->store_logo; ?>" />
                                            <input type="submit" class="btn btn-danger btn-AddStore" value="Weekly Special" />
                                        </li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right">
                            <h3>Coupons</h3>
                            <ul class="sh-AddCopoun">
                                <?php
                                foreach ($recipeDetails->recipeCategories as $data)
                                {
                                    $findcoupons = CouponsCategory::model()->findAllByAttributes(array('cat_id' => $data->cat_id));
                                    foreach ($findcoupons as $findcoupons)
                                    {
                                        ?>
                                        <li><img class="img-responsive" src="<?php echo $path ?>/<?php echo $findcoupons->coupon->photo; ?>" /></li>
                                        <?php
                                    }
                                }
                                ?>

<!--                                <li><img class="img-responsive" src="<?php // echo Yii::app()->baseUrl;    ?>/images/sh-copon1.jpg" /></li>
<li><img class="img-responsive" src="<?php // echo Yii::app()->baseUrl;    ?>/images/sh-copon1.jpg" /></li>
<li><img class="img-responsive" src="<?php //echo Yii::app()->baseUrl;    ?>/images/sh-copon1.jpg" /></li>
<li><img class="img-responsive" src="<?php // echo Yii::app()->baseUrl;    ?>/images/sh-copon1.jpg" /></li>-->
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Adds Coppon Area Close -->

                <hr/>

                <!-- Coment Area Start -->
                <div class="sh-ComentBox">
                    <div class="pic pull-left"><img src="<?php echo Yii::app()->baseUrl; ?>/images/sh-coment-pic.jpg" /></div>
                    <div class="text-area pull-left">
                        <h5>Krista Numbers</h5>
                        <p>Krista is the founder of Simplify Supper. She is passionate about making family dinner a priority and strives to provide simple solutions to make it happen.</p>
                        <span class="date"><span class="glyphicon glyphicon-calendar"></span> Feb 02, 2014</span>
                    </div>
                </div>
                <!-- Coment Area Close -->

                <!-- Form Area Start Here -->
                <span class="title-comments">Leave a Comment</span>
                <form class="row" action="#">
                    <div class="form-row">
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                            <label class="form-label" for="name">Your Name</label>
                            <input type="text" id="name">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-12">
                            <label class="form-label" for="comts">Your Comments</label>
                            <textarea rows="10" cols="10" id="comts"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-12">
                            <input type="submit" class="btn-send-msg" value="Send Message">
                        </div>
                    </div>
                </form>

                <!-- Form Area Close Here -->

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
                                <img src="<?php echo Yii::app()->baseUrl; ?>/images/img-burger.jpg" alt="" class="img-responsive" />
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
                                <img src="<?php echo Yii::app()->baseUrl; ?>/images/img-burger.jpg" alt="" class="img-responsive" />
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
                            <img src="<?php echo Yii::app()->baseUrl; ?>/images/img-s1.jpg" alt="" />
                            <div>Sweet and Savory <br />Sloppy Joes</div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="<?php echo Yii::app()->baseUrl; ?>/images/img-s3.jpg" alt="" />
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


    <div  class="modal fade" id="myModalLoginShow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Login Here</h4>
                </div>
                <div class="modal-body">
                    <form action="" >
                        <p id="loginerror-title-modal" style="display:none;color:red;">Please fix following input errors!</p>
                        <ul id="error-holder-modal" class="login-errors" style="color:red;">
                        </ul>
                        <div class="row-holder">
                            <input type="text" class="username_modal" placeholder="Email" id="email-modal" />
                        </div>
                        <div class="row-holder">
                            <input type="password" class="password_modal" placeholder="Password" id="password-modal"/>
                        </div>
                        <div class="row-holder">
                            <input id="rem" type="checkbox" />
                            <label for="rem" class="rem-me">Remember Me</label>
                        </div>
                        <div class="row-holder">
                            <input type="submit" value="Login" class="btn-login-modal" id="login-form-modal" />
                        </div>
                        <div class="row-holder text-center">
                            <span class="singOR">OR</span>
                        </div>
                        <div class="row-holder">
<!--                                    <input type="submit" value="SignUp" class="btn-login-modal" id="login-form-modal" />-->
                            <input type="submit" value="SignUp" class="btn-login-modal" />
                        </div>
                        <div class="row-holder text-center">
                            <span class="singOR">OR</span>
                        </div>
                        <div class="row-holder">
                            <a class="singnin-fb-modal" href="https://www.facebook.com/dialog/oauth?client_id=716978615033533&redirect_uri=http://localhost/simplifysupper/frontend/www/site/join/&scope=email">SignIn With Facebook</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>





</div>
<!--=======Footer======-->
<script type="text/javascript">


    $('#RecipeBtnAddtoCalendar').click(function() {
        var recipeDate = $('#datepicker').val();
        if (recipeDate == '') {
            alert('Please choose date');
            return false;
        }
        var servingSize = <?php echo $recipeDetails->serving_size; ?>;
        var recipeid = <?php echo $recipeDetails->id; ?>;
        $.ajax({
            url: "<?php echo Yii::app()->request->baseUrl; ?>/dashboard/recipesaveondetail",
            type: "post",
            async: false,
            data: "recipeDate=" + recipeDate + "&servingSize=" + servingSize + "&recipeid=" + recipeid,
            success: function(response) {
                if (response == 99)
                {
                    $("#set-recipe-status").fadeIn('slow');
                    setTimeout(function() {

                        $("#set-recipe-status").fadeOut('slow');

                    }, 3000);
                }
                if (response == 77)
                {
                    $("#set-recipe-exists").fadeIn('slow');
                    setTimeout(function() {

                        $("#set-recipe-exists").fadeOut('slow');

                    }, 3000);
                }
                if (response == 33)
                {
                    alert('problem in saving');
                }
            }
        });
    });

    $(document).ready(function() {
        $("#login-form-modal").click(function(e) {
            var email = $("#email-modal").val();
            var password = $("#password-modal").val();
            $("#error-holder-modal").html("");
            $("#loginerror-title-modal").css("display", "none");
            $.ajax({
                url: "<?php echo Yii::app()->request->baseUrl; ?>/site/validatelogin",
                type: "post",
                datatype: "json",
                async: false,
                data: "email=" + email + "&password=" + password,
                success: function(response) {
                    if (response === "1") {
                        window.location.href = "<?php echo Yii::app()->getBaseUrl(true); ?>/site/recipedetail/<?php echo $recipeDetails->id ?>";
                                                //window.location= <?php echo Yii::app()->request->baseUrl . '/dashboard/' ?>;
                                            }
                                            else
                                            {
                                                //Dispaly response errors above login form
                                                $("#loginerror-title-modal").css("display", "block");
                                                var json_data = response;
                                                var result = [];
                                                for (var i in json_data)
                                                    result.push([i, json_data [i]]);
                                                for (var i = 0; i < result.length; i++)
                                                {
                                                    var error = result[i];
                                                    $("#error-holder-modal").append("<li>" + error[1] + "</li>")
                                                }
                                                e.preventDefault();
                                            }
                                        },
                                        error: function() {
                                            alert("Could not perform the requested operation due to some error.");
                                            return false;
                                        }
                                    });
                                });
                                $(".set-recipy").click(function() {
                                    var date = $(this).attr("date");
                                    var recipeid = $(this).attr("dir");

                                    $("#modal-get-date").text(date);

                                    $.ajax({
                                        url: "<?php echo Yii::app()->request->baseUrl . '/site/showpopup/' ?>",
                                        type: "post",
//                async: false,
                                        data: "date=" + date + "&recipeid=" + recipeid,
                                        success: function(response) {
//                    console.log(response);
                                            $("#modal-content").html(response);
                                            $("#signupmodal").click();
                                        },
                                        error: function() {
                                            alert('error');
                                        },
                                    });
                                });
                            });

                            $(document).ready(function() {

                                $("#datepicker").datepicker({
                                    inline: true
                                });
                                $('#RecipeBtnforServingSize').click(function() {
//            $("li").filter(".amount").each(function() {
//                $(this).text().replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, ' ');
//            });
                                    var denominator = $("#hiddenservingsize").text();
                                    var ingredients = $('.Ingredients').children();
                                    var new_serving_size = $("#servings").text();
                                    new_serving_size = parseInt(new_serving_size);
                                    ingredients.each(function() {
                                        var ingredient_text = $(this).text();
                                        var ingredient_count = parseFloat(ingredient_text, 10);
                                        var ing_string = ingredient_text.split(/[0-9]+/);
                                        var new_ingredient_count = (ingredient_count / denominator) * new_serving_size;
                                        //var new_text = new_ingredient_count + " " + ing_string;
                                        var new_text = new_ingredient_count + " " + ing_string;
                                        $(this).text(new_text);
                                    });
                                });
                                var servings = $("#serving-size").val();
                                $("#servings").text(servings);
                            });
                            function updateTextInput(val) {
                                $("#servings").text(val);
                            }


</script>
<style>
    .row-holder .username_modal{
        background: url("<?php echo Yii::app()->request->baseUrl; ?>/images/ico-username.png") no-repeat scroll 0 0 rgba(0, 0, 0, 0);
        border: 1px solid #CCCCCC;
        color: #333333;
        font-family: 'Open Sans',sans-serif;
        font-size: 14px;
        height: 32px;
        margin-left: 25%;
        outline: medium none;
        padding: 0 10px 0 45px;
        width: 50%;
        border-radius:4px;
    }
    .row-holder .password_modal{
        background: url("<?php echo Yii::app()->request->baseUrl; ?>/images/ico-password.png") no-repeat scroll 0 0 rgba(0, 0, 0, 0);
        border: 1px solid #CCCCCC;
        color: #333333;
        font-family: 'Open Sans',sans-serif;
        font-size: 14px;
        height: 32px;
        margin-left: 25%;
        outline: medium none;
        padding: 0 10px 0 45px;
        width: 50%;
        border-radius:4px;
    }
    #rem{
        margin-left: 25%;
    }
    .row-holder .btn-login-modal {
        background: none repeat scroll 0 0 #148871;
        border: 0 none;
        color: #FFFFFF;
        font-family: 'Open Sans',sans-serif;
        height: 34px;
        list-style: none outside none;
        opacity: 0.9;
        padding: 0;
        text-transform: uppercase;
        width: 50%;
        margin-left: 25%;
        font-size:15px;
    }

    .singOR {
        color: #666666;
        float: left;
        font-family: 'Open Sans',sans-serif;
        font-size: 15px;
        margin-left: 48%;
        height:17px;
    }

    .home-title-loginheading{
        border-bottom: 1px solid #16A085;
        color: #4B4D4F;
        display: inline-block;
        font: 600 21px/28px 'Open Sans',sans-serif;
        margin: 0 230px 0px;
    }
    .img-hdr{
        max-height:221px;
    }
</style>

