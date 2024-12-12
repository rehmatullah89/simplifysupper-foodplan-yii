<?php
/* @var $this RecipeController */
/* @var $model Recipe */
/* @var $form CActiveForm */
?>
<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'recipe-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>
    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    <?php echo $form->errorSummary($recipeIng); ?>
    <div class="row">
        <?php
        echo $form->labelEx($model, 'Categories');
        $this->widget(
                'bootstrap.widgets.TbSelect2', array(
            'name' => 'cat_names[]',
            'data' => Category::getRecipehere(),
            'htmlOptions' => array(
                'multiple' => 'multiple',
                'class' => 'span3',
                'id' => 'select1li_id'
            ),
            'events' => array('change' => 'js:getsubcategories')
                )
        );
        ?>
    </div>
    <!--
    <div class="row">
    <?php
//        echo $form->labelEx($model, 'Categories');
//
//        $this->widget(
//                'bootstrap.widgets.TbSelect2', array(
//            'name' => 'cat_names',
//            'data' => Category::getRecipe(),
//            'htmlOptions' => array(
//                'multiple' => 'multiple',
//                'class' => 'span3'
//            ),
//                )
//        );
    ?>
    </div>-->
    </br>

    <div class="row">
        <div id="subcats">
    <!--         <div class="sub"><input type="checkbox" value="Fried Chicken" name="subcategories"><span>Fried Chicken</span></div>
             <div class="sub"><input type="checkbox" value="Grilled Chicken" name="subcategories"><span>Grilled Chicken</span></div>
             <div class='sub'><input type="checkbox" value="Grilled Beef" name="subcategories"><span>Grilled Beef</span></div>-->
        </div>
    </div>

    </br>

    <div class="row">
        <?php echo $form->labelEx($model, 'title'); ?>
        <?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'title'); ?>
    </div></br>

    <div class="row">
        <div class="span1">
            <?php echo $form->checkBox($model, 'meal_for_breakfast'); ?>
            <?php echo $form->labelEx($model, 'meal_for_breakfast'); ?>
            <?php echo $form->error($model, 'meal_for_breakfast'); ?>
        </div>

        <div class="span1">
            <?php echo $form->checkBox($model, 'meal_for_lunch'); ?>
            <?php echo $form->labelEx($model, 'meal_for_lunch'); ?>
            <?php echo $form->error($model, 'meal_for_lunch'); ?>
        </div>

        <div class="span1">
            <?php echo $form->checkBox($model, 'meal_for_dinner'); ?>
            <?php echo $form->labelEx($model, 'meal_for_dinner'); ?>
            <?php echo $form->error($model, 'meal_for_dinner'); ?>
        </div>
    </div></br>

    <div class="row">
        <?php echo $form->labelEx($model, 'photo'); ?>
        <?php echo CHtml::activeFileField($model, 'photo'); ?>  
        <?php echo $form->error($model, 'photo'); ?>
    </div></br>

    <div class="row">
        <?php echo $form->labelEx($model, 'description'); ?>
        <?php echo $form->textArea($model, 'description', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'description'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'directions'); ?>
        <?php echo $form->textArea($model, 'directions', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'directions'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'nutritions'); ?>
        <?php echo $form->textArea($model, 'nutritions', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'nutritions'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'recipe_type'); ?>
        <?php echo $form->dropDownList($model, 'recipe_type', $model->getRecipeTypeOptions()); ?>
        <?php echo $form->error($model, 'recipe_type'); ?>
    </div>


    <div class="row">
        <?php echo $form->checkBox($model, 'sidedish'); ?>
        <?php echo $form->labelEx($model, 'sidedish'); ?>
        <?php echo $form->error($model, 'sidedish'); ?>
    </div></br>

    <div class="row">
        <?php echo $form->labelEx($model, 'serving_size'); ?>
        <?php echo $form->textField($model, 'serving_size'); ?>
        <?php echo $form->error($model, 'serving_size'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'status'); ?>
        <?php echo $form->dropDownList($model, 'status', $model->getRecipeStatusOptions()); ?>
        <?php echo $form->error($model, 'status'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'videourl'); ?>
        <?php echo $form->textField($model, 'videourl', array('size' => 60, 'maxlength' => 500)); ?>
        <?php echo $form->error($model, 'videourl'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'video'); ?>
        <?php echo $form->textArea($model, 'video', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'video'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'meta_title'); ?>
        <?php echo $form->textField($model, 'meta_title', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'meta_title'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'meta_keywords'); ?>
        <?php echo $form->textArea($model, 'meta_keywords', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'meta_keywords'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'meta_desc'); ?>
        <?php echo $form->textArea($model, 'meta_desc', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'meta_desc'); ?>
    </div>

    <div class="row">
        <?php //echo $form->labelEx($model,'owner_type');     ?>
        <?php echo $form->hiddenField($model, 'owner_type', array('size' => 6, 'maxlength' => 6)); ?>
        <?php //echo $form->error($model,'owner_type');   ?>
    </div>	

    <div class="row1">
        <table id="options-table">
            <tr id="options-table-row" >
                <td><?php echo $form->textField($recipeIng, 'amount', array('class' => 'namecls', 'name' => 'amount[]')); ?></td>
                <td><?php echo $form->dropDownList($recipeIng, 'measure_id[]', CHtml::listData(Measurement::model()->findAll(), 'id', 'measurement'), array('class' => 'namecls')); ?></td>
                <td><?php echo $form->textField($recipeIng, 'weight[]', array('class' => 'namecls', 'name' => 'weight[]')); ?><?php echo $form->dropDownList($recipeIng, 'weight_unit[]', $model->getWeightTypeOptions(), array('class' => 'namecls')); ?></td>
                <td><?php echo $form->dropDownList($recipeIng, 'ingredient_id[]', CHtml::listData(Ingredient::model()->findAll(), 'id', 'ingredient'), array('class' => 'namecls')); ?></td>
                <td><?php echo $form->textArea($recipeIng, 'ingdesc[]', array('class' => 'nameclsdesc')); ?></td>
                <td><input type="button" class="add btn btn-primary" value="Add More"></td>
                <td><input type="button" class="del btn btn-secondary" value="Delete"></td>
            </tr>

        </table>


    </div>

    <div class="row">
        <table id="options-table2">
            <tr>
                <td><strong>Amount</strong></td>
                <td><strong>Measurement</strong></td>
                <td><strong>Weight</strong></td>
                <td><strong>Ingredient</strong></td>
                <td><strong>Description</strong></td>
            </tr>
            <tr id="options-table-row">
                <td><?php echo $form->textField($recipeIng, 'amount[]', array('class' => 'namecls', 'name' => 'amount[]')); ?></td>
                <td><?php echo $form->dropDownList($recipeIng, 'measure_id[]', CHtml::listData(Measurement::model()->findAll(), 'id', 'measurement'), array('class' => 'namecls')); ?></td>
                <td><?php echo $form->textField($recipeIng, 'weight[]', array('class' => 'namecls', 'name' => 'weight[]')); ?><?php echo $form->dropDownList($recipeIng, 'weight_unit[]', $model->getWeightTypeOptions(), array('class' => 'namecls')); ?></td>
                <td><?php echo $form->dropDownList($recipeIng, 'ingredient_id[]', CHtml::listData(Ingredient::model()->findAll(), 'id', 'ingredient'), array('class' => 'namecls')); ?></td>
                <td><?php echo $form->textArea($recipeIng, 'ingdesc[]', array('class' => 'nameclsdesc')); ?></td>                
                <td><input type="button" class="add btn btn-primary" value="Add More"></td>
            </tr>

        </table>	
    </div>
    <div class="row" id="ingredient-errors" style="background-color: pink; margin-bottom: 10px; display:none; ">Please enter only integer values in amount and weight fields. The fields highlighted contain error.</div>



    <div class="row buttons">
        <?php
        echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary', 'id' => 'create_recipe'));

//echo CHtml::submitButton('Login', array('class' => 'submitClass', 'style' => 'width: 120px; border-radius: 10px;')); 
        ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
<script>
    function getsubcategories()
    {
        $("#subcats").html("");
        var category_length = $(".select2-search-choice").length;
        for (var i = 0; i < category_length; i++)
        {
            var categories = $(".select2-search-choice:eq(" + i + ")").find("div").html();
            $.ajax({
                type: 'POST',
                url: '<?php echo Yii::app()->createAbsoluteUrl("recipe/getsubcategories"); ?>',
                data: 'categories=' + categories,
                success: function(data) {
                    var subcategories = $.parseJSON(data);
                    for (var i = 0; i < subcategories.length; i++)
                    {
                        // <div class="sub"><input type="checkbox" value="Fried Chicken" name="subcategories"><span>Fried Chicken</span></div>  
                        $("#subcats").append("<div class='sub'><input type='checkbox' name='subcategories[]' value='" + subcategories[i] + "'><span>" + subcategories[i] + "</span></div>");
                    }
                },
                error: function(data) { // if error occured
                    alert("Error occured.please try again");
                },
            })
        }
    }

</script>
<style>

    .namecls{
        width: 80px !important;
    }
    .nameclsdesc{
        width: 85px !important;
    }
    #options-table-row {
        background-color: #ddd ;
    }
    .sub
    {
        float:left;
    }
    .sub span
    {
        margin: 5px 10px 0 10px;
        vertical-align: top;
    }
    .select2-container {
        display: inline-block;
        margin-left: 0;
        position: relative;
        vertical-align: top;
    }

    .ingredient_error{

        border:1px solid red;
    }

</style>

<script>

    $(document).ready(function() {


        $("#create_recipe").click(function(e) {
            var errors = 0;
            var emptyfields = -2;

            $('input[name="amount[]"]').map(function() {

                if (isNaN(this.value))
                {
                    var jquery_object = jQuery(this);
                    jquery_object.css("border", "1px solid red");
                    errors++;
                }

                if (this.value === "")
                {
                    var jquery_object = jQuery(this);
                    jquery_object.css("border", "1px solid red");
                    emptyfields = emptyfields + 1;
                }
            }).get();



            $('input[name="weight[]"]').map(function() {

                if (isNaN(this.value))
                {
                    var jquery_object = jQuery(this);
                    jquery_object.css("border", "1px solid red");
                    errors++;
                }

                if (this.value === "")
                {
                    var jquery_object = jQuery(this);
                    jquery_object.css("border", "1px solid red");
                    emptyfields = emptyfields + 1;
                }
            }).get();



            if (emptyfields > 0)
            {
                $("#ingredient-errors").text("Fields cannot be left blank");
                $("#ingredient-errors").show();
                e.preventDefault();

            }
            if (errors > 0)
            {
                $("#ingredient-errors").show();
                e.preventDefault();
            }

        });


    });

</script>
<style>
    #options-table-row {
    background-color: #DDDDDD;
    position: absolute !important;
    width: 1000px !important;
    }
    .namecls{
        width: 130px !important;
    }
    .nameclsdesc{
        width: 85px !important;
    }
   

</style>