
<?php
foreach ($recipes as $recipe) {
    $path = Yii::app()->request->baseUrl . '/../../backend/www/images/';
    ?>
    <div class="row">
        <div class="col-lg-3 col-sm-3">
            <img src="<?php echo $path; ?>/<?php echo $recipe->photo; ?>" style='widht:50px; height:50px;margin-bottom: 15px;'/>
        </div>

        <div class="col-lg-9 col-sm-9">
            <p><?php echo $recipe->title; ?></p>
            <p><?php
//                if (strlen($recipe->description) > 10)
//                    $text = substr($recipe->description, 0, 50) . "...";
//                echo $text;
                ?></p>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-3 col-sm-3">
            <p><strong>Servings</strong></p>
        </div>
        <div class="col-lg-1 col-sm-1">
            <input type="text" name="servingsize" value="<?php echo $recipe->serving_size; ?>" style="width:30px;text-align:center;" id="servingsize<?php echo $recipe->id; ?>">
        </div>
        <div class="col-lg-3 col-sm-3">
            <input type="button" class="btn btn-xs setrecipe" value="Set Recipe" recipe_id="<?php echo $recipe->id; ?>">
        </div>



    </div>
    </div>
<?php } ?>


<script>

    $(".setrecipe").click(function() {
        var recipe_id = $(this).attr("recipe_id");
        var date = $("#modal-get-date").text();
        
        var serving_size = $("#servingsize" + recipe_id).val();
        var dataString = "recipe_id=" + recipe_id + "&date=" + date + "&serving_size=" + serving_size;

        $.ajax({
            type: 'post',
            url: '<?php echo Yii::app()->createAbsoluteUrl('site/setrecipe'); ?>',
            data: dataString,
            success: function(response) {

                if (response == "false")
                {
                    var time = 500;
                    $("#error-setting-recipe").fadeTo(0, 0.1).fadeTo(time, 1);

                    setTimeout(function() {

                        var time = 1000;
                        $("#error-setting-recipe").fadeTo(0, 0.1).fadeTo(time, 0);
                    }, 3000);
                }
                else
                {
                    $("#setusingmodal").append(response)
                }

            },
            error: function(response) {
                alert(response);
            }

        });

    });

</script>