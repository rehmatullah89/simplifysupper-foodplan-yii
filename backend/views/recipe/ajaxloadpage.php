<div id="search-results" style=" height: 200px; width: 100%; overflow-y: scroll; overflow-x: hidden; margin-left: -11px; ">

    <?php
    foreach ($recipies as $vals) {

//        CVarDumper::dump($vals->serving_size,10,1);exit;
        ?>
        <div class="row-fluid reciperow" style="border-radius: 4px;
             margin-left: 10px;
             overflow: auto;
             width: 90%;">
            <div class="span12 ">

                <div class="row-fluid">
                    <div class="span2">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/<?php echo $vals['photo']; ?>" alt="" widht="50px" height="50px"/>
                    </div>
                    <div class="span10">
                        <div class="row-fluid">
                            <div class="span4"><?= $vals->title; ?></div>
                        </div>
                        <div class="row-fluid">
                            <div class="span12"><?= $vals->description; ?></div>
                        </div>
                    </div>

                </div>
                <div class="row-fluid">
                    <div class="span2">Servings</div>
                    <div class="span2"> <p><input type="text" class="servingtext" name="servingsize" id="servingsize<?php echo $vals['id']; ?>" value="<?php echo $vals->serving_size; ?>"></p></div>
                    <div class="span3"><button id="setrecipeshowmsg" class="btn btn-primary btnsetrecipe" onClick="setRecipe(<?php echo $vals['id']; ?>)">Set Recipe</button>
                        <div id="testing<?php echo $vals['id']; ?>"  style="display:none;"><?php echo $vals['title']; ?></div>
                    </div>
                </div>


            </div>
        </div>

        <?php
    }
    ?>
    <ul id="existing-recipes">
        <?php
        $selections = explode("</a>", $selected_recipes);
        for ($i = 0; $i < count($selections) - 1; $i++) {
            $c = explode('/', $selections[$i]);
            $result = explode('/', end($c));
            $recipe_id = explode('"', $result[0]);
            $recipe_id[0];
            ?>
            <div id="deleterecipe<?php echo $recipe_id[0]; ?>">
                <i class="icon-remove" onclick="deleteRecipeOfDay(<?php echo $recipe_id[0]; ?>)" style="cursor:pointer;"></i>
                <li style="display:inline;"><?php $recipe_info = Recipe::model()->findByPk($recipe_id[0]); ?>
                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/recipe/<?php echo $recipe_id[0]; ?>"><?php echo $recipe_info->title; ?></a>

                </li><br/>
            </div>
        <?php } ?>


    </ul>
    <ul id="chosen-recipes">
    </ul>

    <ul id="hiddenserving" style="display:none;"  >
    </ul>
    <br/>

    <p id="site_url" style="display:none;"><?php echo Yii::app()->request->getBaseUrl(true) . '/recipe/'; ?></p>
</div>
<br>
<div>
    <input class="btn btn-secondary" type="button" id="save-recipes" value="Submit">
    <input class="btn btn-secondary" type="button" id="close-modal" value="Cancel"/>
</div>
<ul id="already-selected">
</ul>

</div>
<style>
    img {
        border: 0 none;
        height: 65px;
        max-width: 100%;
        vertical-align: middle;
        width: 65px;
        margin-top: 5px;
    }
    .btn.btn-primary.btnsetrecipe {
        border-radius: 3px;
        margin-bottom: 30px;
    }
    .row-fluid.reciperow {
        margin-top: 7px;
        padding-left: 18px;
    }
    .servingtext{
        width: 40px;
    }
</style>


<script>
    $("#setrecipeshowmsg").click(function() {
      $('#showmsgonsetrecipe').show();
      $('#showmsgonsetrecipe').css('color','green');
    });
    function setRecipe(id)
    {
        var site_url = $("#site_url").text();
        var recipe_title = $("#testing" + id).text();
        var serving_size = $("#servingsize" + id).val();


        $("#chosen-recipes").append("<i id='removecross" + id + "' class='icon-remove' style='cursor:pointer;' onclick='removeRecipe(" + id + ")'></i>");
        $("#chosen-recipes").append("<span id='delete" + id + "'><li style='display:inline;'><a href='" + site_url + "" + id + "'> " + recipe_title + "<a/></li></span>");



//        $('#chosen-recipes').append("<li dir='" + serving_size + "' onClick='removeRecipe(" + id + ")' id=delete" + id + "><a href=" + site_url + "" + id + ">" + recipe_title + "</a></li>");
        $('#hiddenserving').append("<p>" + id + ":" + serving_size + ":</p>");
    }
    function removeRecipe(id)
    {

        $("#delete" + id).remove();
        $("#removecross" + id).remove();
    }
    $('#close-modal').click(function() {
        $("#search-results").remove();
        $("#cat_name").val("");
        $("#test_modal").dialog("close");
    });

    $("#save-recipes").click(function() {
        var selections = $("#chosen-recipes").html();
        var calendar_day = $("#getdatevalue").text();
        var recipe_date_array = calendar_day.split(".").join('-');
        var recipe_selections = $("#hiddenserving").text();
        $.ajax({
            type: 'POST',
            url: '<?php echo Yii::app()->createAbsoluteUrl("recipe/setrecipeoftheday"); ?>',
            data: 'recipe_selections=' + recipe_selections + "&recipe_date=" + recipe_date_array,
            success: function(data) {
                $("#" + recipe_date_array).append(selections);
                $("#test_modal").dialog("close");
                window.location = document.URL;
            },
            error: function(data) { // if error occured
                alert("Error occured.please try again");

            },
        });
        return false;
    });
    function deleteRecipeOfDay(id)
    {
        var recipe_id = id;
        var confirmation = confirm("Are you sure you want to delete this recipe?");
        if (confirmation == true)
        {
            var calendar_day = $("#getdatevalue").text();
            var recipe_date = calendar_day.split(".").join('-');

            $.ajax({
                type: 'POST',
                url: '<?php echo Yii::app()->createAbsoluteUrl("recipe/deleterecipeoftheday"); ?>',
                data: 'recipe_id=' + recipe_id + "&recipe_date=" + recipe_date,
                success: function(data)
                {
                    $("#deleterecipe" + recipe_id).remove();
                },
                error: function(data)
                {

                },
            });
        }
        else
        {
        }
    }
</script>



