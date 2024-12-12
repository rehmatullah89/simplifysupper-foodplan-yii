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
    <?php
    //echo $form->errorSummary($recipeIng); 
    ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'Categories'); ?>
        <?php
        echo CHtml::textField('cat_names', implode(',', Recipe::getRecipeCatNames($id)), array('id' => 'cat_names'));
        $this->widget('ext.select2.ESelect2', array(
            'selector' => '#cat_names',
            'options' => array(
                'tags' => Category::getRecipe(),
                'placeholder' => 'Select categories for the recipe!',
                'width' => '28%',
                'tokenSeparators' => array(',', ' '),
                'active' => array('selected' => true,)
            ),
        ));
        ?>
    </div></br>

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
        <?php //echo $form->labelEx($model,'owner_type');   ?>
        <?php echo $form->hiddenField($model, 'owner_type', array('size' => 6, 'maxlength' => 6)); ?>
        <?php //echo $form->error($model,'owner_type'); ?>
    </div>	

    
    <div class="row1">
        <table class="options-table">
            <tr id="options-table-row" >
                <td><?php echo $form->textField($recipeIng, 'amount[]', array('class' => 'namecls')); ?></td>
                <td><?php echo $form->dropDownList($recipeIng, 'measure_id[]', CHtml::listData(Measurement::model()->findAll(), 'id', 'measurement'), array('class' => 'namecls')); ?></td>
                <td><?php echo $form->textField($recipeIng, 'weight[]', array('class' => 'namecls')); ?><?php echo $form->dropDownList($recipeIng, 'weight_unit[]', $model->getWeightTypeOptions(), array('class' => 'namecls')); ?></td>
                <td><?php echo $form->dropDownList($recipeIng, 'ingredient_id[]', CHtml::listData(Ingredient::model()->findAll(), 'id', 'ingredient'), array('class' => 'namecls')); ?></td>
                <td><?php echo $form->textField($recipeIng, 'ingdesc[]', array('class' => 'nameclsdesc')); ?></td>
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
            <?php 
            if(!empty($rec_ing))
            foreach($rec_ing as $key=>$rec_val){
               ?>
            <tr id="options-table-row">
                <td><?php echo $form->textField($recipeIng, 'amount[]', array('class' => 'namecls' , 'value'=>$rec_val->amount )); ?></td>
                <td><?php echo $form->dropDownList($recipeIng, 'measure_id[]', CHtml::listData(Measurement::model()->findAll(), 'id', 'measurement'), array('class' => 'namecls','options' => array($rec_val->measure_id=>array('selected'=>true)))); ?></td>
                <td><?php echo $form->textField($recipeIng, 'weight[]', array('class' => 'namecls', 'value'=>$rec_val->weight)); ?><?php echo $form->dropDownList($recipeIng, 'weight_unit[]', $model->getWeightTypeOptions(), array('class' => 'namecls','options' => array($rec_val->weight_unit=>array('selected'=>true)))); ?></td>
                <td><?php echo $form->dropDownList($recipeIng, 'ingredient_id[]', CHtml::listData(Ingredient::model()->findAll(), 'id', 'ingredient'), array('class' => 'namecls','options' => array($rec_val->ingredient_id=>array('selected'=>true)))); ?></td>
                <td><?php echo $form->textField($recipeIng, 'ingdesc[]', array('class' => 'nameclsdesc', 'value'=>$rec_val->ingdesc)); ?></td>                
                <td><input type="button" class="add btn btn-primary" value="Add More"></td>
                <td><input type="button" class="del btn btn-secondary" value="Delete"></td>
                </tr>
           <?php }
           else {?>
               <tr id="options-table-row">
                <td><?php echo $form->textField($recipeIng, 'amount[]', array('class' => 'namecls' , 'value'=>$rec_val->amount )); ?></td>
                <td><?php echo $form->dropDownList($recipeIng, 'measure_id[]', CHtml::listData(Measurement::model()->findAll(), 'id', 'measurement'), array('class' => 'namecls','options' => array($rec_val->measure_id=>array('selected'=>true)))); ?></td>
                <td><?php echo $form->textField($recipeIng, 'weight[]', array('class' => 'namecls', 'value'=>$rec_val->weight)); ?><?php echo $form->dropDownList($recipeIng, 'weight_unit[]', $model->getWeightTypeOptions(), array('class' => 'namecls','options' => array($rec_val->weight_unit=>array('selected'=>true)))); ?></td>
                <td><?php echo $form->dropDownList($recipeIng, 'ingredient_id[]', CHtml::listData(Ingredient::model()->findAll(), 'id', 'ingredient'), array('class' => 'namecls','options' => array($rec_val->ingredient_id=>array('selected'=>true)))); ?></td>
                <td><?php echo $form->textField($recipeIng, 'ingdesc[]', array('class' => 'nameclsdesc', 'value'=>$rec_val->ingdesc)); ?></td>                
                <td><input type="button" class="add btn btn-primary" value="Add More"></td>
                <td><input type="button" class="del btn btn-secondary" value="Delete"></td>
                </tr>
           <?php }?>
        </table>	
    </div>

    <div class="row buttons">
<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<style>
    .namecls{
        width: 60px !important;
    }
    .nameclsdesc{
        width: 85px !important;
    }
    #options-table-row {
        background-color: #ddd ;
    }

</style>