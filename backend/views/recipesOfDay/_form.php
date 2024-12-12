<?php
/* @var $this RecipesOfDayController */
/* @var $model RecipesOfDay */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $model = new RecipesOfDay();
    $form = $this->beginWidget(
            'bootstrap.widgets.TbActiveForm', array(
        'id' => 'recipes-of-day-form horizontalForm',
        'type' => 'horizontal',
            )
    );
//    $form = $this->beginWidget('CActiveForm', array(
//        'id' => 'recipes-of-day-form',
//        'enableAjaxValidation' => false,
//    ));
    ?>
    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'rod_day');
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model' => $model,
            //==options==
            'options' => array(
                'dateFormat' => 'yy-mm-dd', // save to db format
                'altField' => 'rod_day',
                'altFormat' => 'yy-mm-dd', // show to user format
            ),
            //attribute and htmloptions
            'attribute' => 'rod_day',
            'htmlOptions' => array(
                'size' => '10', // textField size
                'maxlength' => '10', // textField maxlength
                'value' => date('Y-m-d'), // set the default date here
            ),
        ));
        echo $form->error($model, 'rod_day');
        ?>

    </div>

    <div class="row">
        <?php
        
//        $m_model = Recipe::model()->findAll(array("condition"=>'status=Approved'));
        
       $m_model = Recipe::model()->findAll(array("condition" => "status = 'Approved'"));
        
        $myarray =  CHtml::listData($m_model, 'id', 'title');   
        
        echo $form->dropDownListRow(
                $model, 'recipeid', $myarray, array(
            'multiple' => true,
                )
        );
        ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
<style>
    .form-horizontal .control-label {
        float: left;
        padding-top: 5px;
        text-align: left;
        width: auto;
    }

    select {
        background-color: #FFFFFF;
        border: 1px solid #CCCCCC;
        margin-left: -180px;
        margin-top: 34px;
        width: 220px;
    }
</style>