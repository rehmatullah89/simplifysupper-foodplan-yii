<?php
/* @var $this RecipeController */
/* @var $model Recipe */

$this->breadcrumbs = array(
    'Recipes' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List Recipe', 'url' => array('index')),
    array('label' => 'Manage Recipe', 'url' => array('admin')),
);
?>

<h1>Create Recipe of Day</h1>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'recipe-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>




    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model_rod); ?>
    <div class="row">
         <?php echo $form->labelEx($model_rod, 'rod_day'); ?>
        <?php
            $this->widget(
    'bootstrap.widgets.TbDatePicker',
    array(
    'model' => $model_rod,
    'name' => 'rod_day'
    )
    );
        ?>
    </div>

 <div class="row buttons">
        <?php echo CHtml::submitButton($model_rod->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->