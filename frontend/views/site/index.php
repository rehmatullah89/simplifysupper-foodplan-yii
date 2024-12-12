<?php $this->renderPartial('sliders'); ?>
<!--======= Main Block ======-->
<div id="main-block">
    <div class="container">
        <div class="row">
            <!--======= Shopping List ======-->
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <h2 class="home-title">Shopping List</h2>
                <div id="horizontalTab">
                    <ul class="resp-tabs-list">
                        <li>Print</li>
                        <li id="email-tab">Email</li>
                        <li>Send to Cell</li>
                        <li>Coupons</li>
                    </ul>
                    <div class="resp-tabs-container">
                        <div>
                            <div class="tab-hdr">
                                <span class="col-lg-4 col-md-12 col-sm-12 col-xs-12 meta">For Feb 05, 2014 to Feb 11, 2014 </span>
                                <ul class="col-lg-8 col-md-12 col-sm-12 col-xs-12 hdr-nav">
                                    <li><a href="#">Print Shopping List</a></li>
                                    <li><a href="#">Print Recipes for This Week</a></li>

                                    <?php
                                    $target = "";
                                    if (Yii::app()->user->isGuest) {
                                        $target = "#myModalLoginShow";
                                    } else {
                                        $target = "#myModalforaddlist";
                                    }
                                    ?>
                                    <li><a href="#" data-toggle="modal"  data-target="<?php echo $target; ?>"> Add Items</a></li>
                                </ul>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="myModalforaddlist" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Add Items</h4>
                                        </div>
                                        <div class="modal-body">
                                            <!-------form------------>
                                            <form class="form-horizontal" role="form" id="add-item" method="post">
                                                <div class="form-group">
                                                    <label for="item" class="col-sm-2 control-label">Item</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="item" placeholder="Enter Item" name="item">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="category" class="col-sm-2 control-label">Cateory</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" id="category" name="category">
                                                            <?php
                                                            $getallCats = Category::model()->findAll();
                                                            foreach ($getallCats as $cats) {
                                                                ?>
                                                                <option id="<?php echo $cats->id ?>"><?php echo $cats->cat_name; ?></option>                                                          
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-offset-2 col-sm-10">
                                                        <button type="submit" class="btn btn-default">Add Item</button>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </form>

                                            <!---------------------->
                                        </div>
                                        <div class="modal-footer">
                                            <!--                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary">Save changes</button>-->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-->

                            <?php $this->renderPartial('_shoppinglist'); ?>


                        </div>
                        <div class="content-panel">

                            <form method="post" action="" id="send-list">

                                <p>Please provide email address you want to send this list to.</p><br/>

                                <input type="email" name="email" placeholder="Enter email"/><br><br>
                                <input type="submit" id="btnsendmail" value="Send List" class="btn btn-success"/>
                                <div id="loadshoppinglist" href="shopping-list"></div>

                            </form>

                        </div>
                        <div class="content-panel">
                            <p>Suspendisse blandit velit Integer laoreet placerat suscipit. Sed sodales scelerisque commodo. Nam porta cursus lectus. Proin nunc erat, gravida a facilisis quis, ornare id lectus. Proin consectetur nibh quis Integer laoreet placerat suscipit. Sed sodales scelerisque commodo. Nam porta cursus lectus. Proin nunc erat, gravida a facilisis quis, ornare id lectus. Proin consectetur nibh quis urna gravid urna gravid eget erat suscipit in malesuada odio venenatis.</p>
                        </div>
                        <div class="content-panel">
                            <p>Suspendisse blandit velit Integer laoreet placerat suscipit. Sed sodales scelerisque commodo. Nam porta cursus lectus. Proin nunc erat, gravida a facilisis quis, ornare id lectus. Proin consectetur nibh quis Integer laoreet placerat suscipit. Sed sodales scelerisque commodo. Nam porta cursus lectus. Proin nunc erat, gravida a facilisis quis, ornare id lectus. Proin consectetur nibh quis urna gravid urna gravid eget erat suscipit in malesuada odio venenatis.</p>
                        </div>
                    </div>
                </div>
            </div>
                            <!--======= Featured Recipies ======-->
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 pull-right">
                                <h2 class="home-title">Featured Recipes</h2>
                                <ul class="featured-list">
                                    <li>
                                        <a href="#">
                                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/img-s1.jpg" alt="" />
                                            <div>Sweet and Savory <br />Sloppy Joes</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/img-s2.jpg" alt="" />
                                            <div>BBQ Chicken <br />Sandwiches</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/img-s3.jpg" alt="" />
                                            <div>Apricot Chicken</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/img-s4.jpg" alt="" />
                                            <div>Apple Cider Beef Stew</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/img-s5.jpg" alt="" />
                                            <div>Asparagus Quiche</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/img-s6.jpg" alt="" />
                                            <div>Apple Bread</div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!------modal login ------------->
                
                
                   <div  class="modal fade" id="myModalLoginShow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Login Here</h4>
                        </div>
                        <div class="modal-body">
                            <form action="" id="login-form" method="post" >
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
                
                
                
                <script>
                    function removeItem(obj)
                    {
                        var ingredient = $(obj);
                        ingredient.parent().remove();
                        $(".shopping-inner").each(function() {
                            var hasLI = $(this).find("li");
                            if (hasLI.length == "")
                            {
                                $(this).parent().closest(".shoppingcategory").remove();
                            }
                        });
                    }

                    $(document).ready(function() {
                        //===========email sent==========
                        $("#send-list").submit(function() {
                            var postData = $(this).serialize();
                            $.ajax({
                                type: 'post',
                                url: '<?php echo Yii::app()->createAbsoluteUrl('site/emailshoppinglist') ?>',
                                data: postData,
                                success: function(response) {
                                    console.log(response);
                                },
                                error: function() {
                                }
                            });
                            return false;
                        });
                        //========login form=============
                        $("#login-form").submit(function() {
                            var email = $("#email").val();
                            var password = $("#password").val();
                            $("#error-holder").html("");
                            $("#loginerror-title").css("display", "none");
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
                                        $("#loginerror-title").css("display", "block");
                                        var json_data = response;
                                        var result = [];
                                        for (var i in json_data)
                                            result.push([i, json_data [i]]);
                                        for (var i = 0; i < result.length; i++)
                                        {
                                            var error = result[i];
                                            $("#error-holder").append("<li>" + error[1] + "</li>")
                                        }
                                    }
                                },
                                error: function() {
                                    alert("Could not perform the requested operation due to some error.");
                                    return false;

                                }
                            });
                        });

                        $(".shoppingcategory").each(function() {
                            var child = $(this).find(".shopping-inner").find("li:first").html();
                            if (child == null)
                            {
                                $(this).remove();
                            }
                        });
                        //================add item===========
                        $('#myModalforaddlist').on('show.bs.modal', function(e) {
                            $('#item').val("");
                        })


                        $("#add-item").submit(function() {
                            var item = $("#item").val();
                            var category = $("#category").val();
                            var categories_on_page = [];
                            $(".category-name").each(function() {
                                categories_on_page.push($(this).text());

                            });
                            var category_exists = categories_on_page.indexOf(category);
                            if (category_exists == -1)
                            {
                                //Create a category div and append items in that
                                var append_text = "<li class='shoppingcategory'>\n\
                                                   <div class='col-lg-9 col-md-8 col-sm-8 col-xs-12'>\n\
                                                   <span class='title green category-name'>" + category + "</span> \n\
                                                   <ul class='shopping-inner'>\n\
                                                   <li>\n\
                                                   <span id='removeitemshere' class='glyphicon glyphicon-remove-circle removeitem' onClick='removeItem(this)'>\n\
                                                   </span> " + item + "</li> \n\
                                                   </ul>\n\
                                                   </div>\n\
                                                   </li>";

                                $(".shopping-list").append(append_text);
                            }
                            else
                            {
                                $(".category-name").each(function() {
                                    if ($(this).text() == category)
                                    {
                                        $(this).next().append("<li>\n\
                                                               <span id='removeitemshere' class='glyphicon glyphicon-remove-circle removeitem' onClick='removeItem(this)'>\n\
                                                               </span> " + item + "</li>");
//                                        $(this).append("<ul class='shopping-inner'><li>"+item+"</li></ul>");
                                    }

                                });
                            }
                            return false;

                        });
                    });



                </script>


                <style>
                    .removeitem
                    {
                        cursor:pointer;
                    }
                </style>