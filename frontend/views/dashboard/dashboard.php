
<!--======= Main Block ======-->
<div id="main-block">
    <!--======= Shopping List ======-->
    <br />
    <h2 class="home-title">My Weekly Monthly Calender</h2>
    <div id="calender-meal">
        <?php $this->renderPartial('../site/sliders'); ?>
    </div>
    <div class="row">
        <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
            <h2 class="home-title">Shopping List</h2>
            <div id="horizontalTab">
                <ul class="resp-tabs-list">
                    <li>Print</li>
                    <li>Email</li>
                    <li>Send to Cell</li>
                    <li>Coupons</li>
                </ul>
                <div class="resp-tabs-container">
                    <div>
                        <div class="tab-hdr">
                            <span class="col-lg-4 col-md-12 col-sm-12 col-xs-12 meta">For Feb 05, 2014 to Feb 11, 2014 </span>
                            <ul class="col-lg-8 col-md-12 col-sm-12 col-xs-12 hdr-nav hdr-nav01">
                                <li><a href="#">Print Shopping List</a></li>
                                <li><a href="#">Print Recipes for This Week</a></li>
                                <li><a data-toggle="modal" data-target="#myModal01" href="#">Add Items</a></li>
                            </ul>
                        </div>
                        <?php $this->renderPartial('../site/_shoppinglist'); ?>
                        <!--                        <ul class="shopping-list">
                                                    <li>
                                                        <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
                                                            <span class="title green">Baking</span>
                                                            <ul class="shopping-inner">
                                                                <li>2 cups Canola Oil </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
                                                            <span class="title green">Canned Goods</span>
                                                            <ul class="shopping-inner">
                                                                <li>1 can Chili</li>
                                                                <li>1 can Enchilada Sauce 19 ounce size</li>
                                                                <li>1 can Refried Beans 16 ounce size</li>
                                                                <li>2 can Cream of Chicken Soup</li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                                                            <img class="img-responsive" src="<?php //echo Yii::app()->request->baseurl;     ?>/images/img-shop1.jpg" alt="" />
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
                                                            <span class="title green">Dairy</span>
                                                            <ul class="shopping-inner">
                                                                <li>1 cup Cream (heavy)</li>
                                                                <li>1 cup Mexican Style Cheese shredded</li>
                                                                <li>2 cups Sour Cream</li>
                                                                <li>5.75 cups Cheddar Cheese shredded</li>
                                                                <li>8 slices Swiss Cheese</li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                                                            <img class="img-responsive" src="<?php //echo Yii::app()->request->baseurl;     ?>/images/img-shop2.jpg" alt="" />
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
                                                            <span class="title green">Meat</span>
                                                            <ul class="shopping-inner">
                                                                <li>3 pound Ground Beef lean</li>
                                                                <li>4 Chicken Breast (bone in, skin on)</li>
                                                                <li>4 Tuna Steaks about 1/2 pound each</li>
                                                                <li>5 Boneless Skinless Chicken Breasts</li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                                                            <img class="img-responsive" src="<?php //echo Yii::app()->request->baseurl;     ?>/images/img-shop3.jpg" alt="" />
                                                        </div>
                                                    </li>
                                                </ul>-->
                    </div>
                    <div class="content-panel">
                        <p>This tab has icon in consectetur adipiscing eliconse consectetur adipiscing elit. Vestibulum nibh urna, ctetur adipiscing elit. Vestibulum nibh urna, t.consectetur adipiscing elit. Vestibulum nibh urna,  Vestibulum nibh urna,it.</p>
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
        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 pull-right">
            <h2 class="home-title">Featured Recipes</h2>
            <ul class="featured-list">
                <li>
                    <a href="#">
                        <img src="<?php echo Yii::app()->request->baseurl; ?>/images/img-s1.jpg" alt="" />
                        <div>Sweet and Savory <br />Sloppy Joes</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="<?php echo Yii::app()->request->baseurl; ?>/images/img-s2.jpg" alt="" />
                        <div>BBQ Chicken <br />Sandwiches</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="<?php echo Yii::app()->request->baseurl; ?>/images/img-s3.jpg" alt="" />
                        <div>Apricot Chicken</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="<?php echo Yii::app()->request->baseurl; ?>/images/img-s4.jpg" alt="" />
                        <div>Apple Cider Beef Stew</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="<?php echo Yii::app()->request->baseurl; ?>/images/img-s5.jpg" alt="" />
                        <div>Asparagus Quiche</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="<?php echo Yii::app()->request->baseurl; ?>/images/img-s6.jpg" alt="" />
                        <div>Apple Bread</div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="blog-panel">
        <h2 class="home-title">Friends Activity Feed</h2>
        <div class="bolg-holder">
            <div class="blog-img-holder">
                <img src="<?php echo Yii::app()->request->baseurl; ?>/images/img-pic01.jpg" alt="" />
            </div>
            <div class="blog-detail">
                <div class="blog-top-panel">
                    <span class="title-comments">Tamaree Howland</span>
                    <span class="title-commts title-commts01">Baked Chicken Parmesan Sliders</span>
                </div>
                <ul class="blog-list">
                    <li>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <img src="<?php echo Yii::app()->request->baseurl; ?>/images/img-blog1.jpg" alt="" class="img-responsive" />
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <strong class="title">Taking the Blah Out</strong>
                                <div class="meta">
                                    <span class="name-info">By Krista Marry</span>
                                    <em class="date">November, 02 , 2013</em>
                                </div>
                                <p>I have decided that January can be quite the blah month. There’s so much hype going into a new year and then once it starts it seems like kind of a letdown if your life is still the same as it was last year. Guess what? It is still the same.  You are still you. You still have the same habits, weaknesses and strengths. It’s awesome to set goals and make resolutions but having a...</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="bolg-holder">
            <div class="blog-img-holder">
                <img src="<?php echo Yii::app()->request->baseurl; ?>/images/img-pic02.jpg" alt="" />
            </div>
            <div class="blog-detail">
                <div class="blog-top-panel">
                    <span class="title-comments">Tamaree Howland</span>
                    <span class="title-commts title-commts01">Baked Chicken Parmesan Sliders</span>
                </div>
                <ul class="blog-list">
                    <li>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <img src="<?php echo Yii::app()->request->baseurl; ?>/images/img-blog3.jpg" alt="" class="img-responsive" />
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <strong class="title">No Stress Resolution</strong>
                                <div class="meta">
                                    <span class="name-info">By Krista Marry</span>
                                    <em class="date">November, 02 , 2013</em>
                                </div>
                                <p>I have decided that January can be quite the blah month. There’s so much hype going into a new year and then once it starts it seems like kind of a letdown if your life is still the same as it was last year. Guess what? It is still the same.  You are still you. You still have the same habits, weaknesses and strengths. It’s awesome to set goals and make resolutions but having a...</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- Modal SET RECIPE -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="modal-get-date"></h4>
            </div>
            <div class="modal-body">

                <p id="modal-content-text"></p>

            </div>
            <div class="modal-footer">
                <div id="error-setting-recipe" class="alert-danger" style="font-size:14px; text-align: left; opacity: 0">
                    You have already selected this recipe
                </div>
            </div>
        </div>
    </div>
</div>

<!------------------MODAL ADD ITME----------------->
<div class="modal fade" id="myModal01" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Add Item in Shopping List</h4>
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
                                foreach ($getallCats as $cats)
                                {
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
            <!--            <div class="modal-footer">
                            <div class="form-row">
                                <label class="form-label pull-left">Item Added</label>
                                <input type="text" />
                            </div>
                        </div>-->
        </div>
    </div>
</div>
</body>
</html>

<script>
    $(document).ready(function() {
        $(".shoppingcategory").each(function() {
            var child = $(this).find(".shopping-inner").find("li:first").html();
            if (child == null)
            {
                $(this).remove();
            }
        });
    });
    $(".set-recipy").click(function() {
        var date = $(this).attr("date");
        $("#modal-get-date").text(date);
        $.ajax({
            url: "<?php echo Yii::app()->request->baseUrl . '/dashboard/setuserrecipe/' ?>",
            type: "post",
            async: false,
            data: "date=" + date,
            success: function(response) {
                $("#modal-content-text").html(response);
            },
            error: function() {
                alert('error');
            },
        });
    });

</script>
<style>
    #flexiselDemo2{
        left: -156px !important;
    }
</style>


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