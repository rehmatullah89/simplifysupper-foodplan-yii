<!--======= MainSlider ======-->
<div class="carousel">
    <div class="mask">
        <div class="slideset">
            <div class="slide">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <img alt="900x500" src="<?php echo Yii::app()->request->baseUrl; ?>/images/1.jpg" class="img-responsive">
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <span class="slide-text">MEAL PLANNING</span><br />
                            <span class="slide-text">MADE SIMPLE</span><br />
                            <span class="slide-text slide-text01">KEEP IT SIMPLIFY SUPPER</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <img alt="900x500" src="<?php echo Yii::app()->request->baseUrl; ?>/images/1.jpg" class="img-responsive">
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <span class="slide-text">MEAL PLANNING</span><br />
                            <span class="slide-text">MADE SIMPLE</span><br />
                            <span class="slide-text slide-text01">KEEP IT SIMPLIFY SUPPER</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <img alt="900x500" src="<?php echo Yii::app()->request->baseUrl; ?>/images/1.jpg" class="img-responsive">
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <span class="slide-text">MEAL PLANNING</span><br />
                            <span class="slide-text">MADE SIMPLE</span><br />
                            <span class="slide-text slide-text01">KEEP IT SIMPLIFY SUPPER</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="btn-prev glyphicon glyphicon-chevron-left" href="#"></a>
        <a class="btn-next glyphicon glyphicon-chevron-right" href="#"></a>
    </div>
</div>
<!--======= Meal Calender Panel ======-->

<div id="meal-calender">
    <div class="row">
        <div class="container">
            <h2 class="home-title">Meal Calender</h2>
            <ul id="flexiselDemo2"> 
                <?php
                //If user is guest then show him only admin recipes

                if (Yii::app()->user->isGuest)
                {//Retrieve and display all the recipes of the day set by admin
                    $today = date("Y-m-d");
                    $recipeOfDay = RecipesOfDay::model()->findAll(array(
                        'condition' => 'rod_day >= :date',
                        'params' => array(':date' => $today),
                    ));
                    $path = Yii::app()->request->baseUrl . '/../../backend/www/images/';
                    foreach ($recipeOfDay as $rod)
                    {
                        ?>
                        <li>
                            <div class="calender-info">
                                <span class="day pull-left"><?php echo date('l', strtotime($today)); ?></span>
                                <span class="day pull-right"><?php echo date('d', strtotime($today)); ?></span>
                            </div>
                            <div class="img-hdr">
                                <img src="<?php echo $path; ?>/<?php echo $rod->recipe->photo; ?>" />
                                <span class="deal-name"><?php echo $rod->recipe->title; ?></span><br/>
                                <?php
                                $remaining_recipes = RecipesOfDay::model()->findAll(array(
                                    'condition' => 'rod_day = :date AND recipeid!=:recipeid',
                                    'params' => array(':date' => $today, ':recipeid' => $rod['recipeid']),
                                ));
                                foreach ($remaining_recipes as $recipe)
                                {
                                    ?>
                                    <span class="deal-name"><?php echo substr($recipe->recipe->title, 0, 40)  //echo $recipe->recipe->title;    ?></span><br/>
                                <?php } ?>
                            </div>
                            <a class="set-recipy-guest"  data-toggle="modal" data-target="#myModalLoginShow"  dir="<?php echo $rod->recipeid ?>" date="<?php echo $today; ?>">Set Recipe</a>
                        </li>
                        <?php
                        $today = date('Y-m-d', strtotime($today . ' + 1 day'));
                    }
                } else
                {
                    $today = date("Y-m-d");
                    $recipeOfDay = RecipesOfDay::model()->findAll(array(
                        'condition' => 'rod_day >= :date',
                        'params' => array(':date' => $today),
                    ));
                    $path = Yii::app()->request->baseUrl . '/../../backend/www/images/';
                    foreach ($recipeOfDay as $rod)
                    {
                        ?>
                        <li>
                            <div class="calender-info">
                                <span class="day pull-left"><?php echo date('l', strtotime($today)); ?></span>
                                <span class="day pull-right"><?php echo date('d', strtotime($today)); ?></span>
                            </div>
                            <div class="img-hdr">
                                <img src="<?php echo $path; ?>/<?php echo $rod->recipe->photo; ?>" />
                                <span class="deal-name"><?php echo $rod->recipe->title; ?></span><br/>
                                <?php
                                $remaining_recipes = RecipesOfDay::model()->findAll(array(
                                    'condition' => 'rod_day = :date AND recipeid!=:recipeid',
                                    'params' => array(':date' => $today, ':recipeid' => $rod['recipeid']),
                                ));
                                foreach ($remaining_recipes as $recipe)
                                {
                                    ?>
                                    <span class="deal-name"><?php echo $recipe->recipe->title; ?></span><br/>
                                <?php
                                }
                                $userMeals = UserMeal::model()->findAllByAttributes(array('recipe_date' => $today, 'member_id' => Yii::app()->user->id));
                                foreach ($userMeals as $meal)
                                {
                                    ?>
                                    <span class="deal-name usermeal"><a href="<?php echo  Yii::app()->baseUrl.'/site/recipedetail/'.$meal->recipe->id;?>"><?php echo substr($meal->recipe->title, 0, 40);?></a></span><br/>
        <?php } ?>
                            </div>
                            <a class="set-recipy"  dir="<?php echo $rod->recipeid ?>" date="<?php echo $today; ?>">Set Recipe</a>
                        </li>
                        <?php
                        $today = date('Y-m-d', strtotime($today . ' + 1 day'));
                    }
                }
                ?>
            </ul>
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
        <!----------->
        <!-----------to open modal--------------->
        <a data-toggle="modal" href="#set_recipe" class="btn btn-primary" style="display:none;" id="signupmodal">Launch modal</a>
        <!---------------------------------------->
        <!--------------Set Recipe Modal----------->

        <div class="modal fade" id="set_recipe">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="modal-get-date"></h4>
                    </div>
                    <div class="modal-body">
                        <p id="modal-content"></p>
                    </div>
                    <!--                        <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>-->
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!---------------Set Recipe Modal End------>
    </div>
</div>
</div>

<?php
if (Yii::app()->user->isGuest)
{
    $js = "$('.set-recipy-guest').click(function (e) {
                
                  $('#myModalLoginShow').click(); 
            });";
    Yii::app()->clientScript->registerScript('testtestes', $js, CClientScript::POS_READY);
}
?>
<script>


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
                        window.location.href = "<?php echo Yii::app()->getBaseUrl(true); ?>/dashboard";
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
