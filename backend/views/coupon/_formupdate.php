<?php
/* @var $this CouponController */
/* @var $model Coupon */
/* @var $form CActiveForm */
?>

<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'coupon-form',
        'enableAjaxValidation' => false,
         'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

   <div class="row">
        <?php echo $form->labelEx($model, 'Categories'); ?>
        <?php
        echo CHtml::textField('cat_names', implode(',', Coupon::getCouponCatNames($model->id)), array('id' => 'cat_names'));
        $this->widget('ext.select2.ESelect2', array(
            'selector' => '#cat_names',
            'options' => array(
                'tags' => Coupon::getCategories(),
                'placeholder' => 'Select categories for the recipe!',
                'width' => '28%',
                'tokenSeparators' => array(',', ' '),
                'active' => array('selected' => true,)
            ),
        ));
        ?>
    </div></br>


    <div class="row">
        <?php echo $form->labelEx($model, 'coupon_code'); ?>
        <?php echo $form->textField($model, 'coupon_code', array('size' => 16, 'maxlength' => 16)); ?>
        <?php echo $form->error($model, 'coupon_code'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'coupon_title'); ?>
        <?php echo $form->textField($model, 'coupon_title', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'coupon_title'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'coupon_details'); ?>
        <?php echo $form->textArea($model, 'coupon_details', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'coupon_details'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'url'); ?>
        <?php echo $form->textField($model, 'url', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'url'); ?>
    </div>

    <div class="row">
        <?php // echo $form->labelEx($model, 'photo'); ?>
        <?php //echo $form->textField($model, 'photo', array('size' => 60, 'maxlength' => 255)); ?>
        <?php //echo $form->error($model, 'photo'); ?>
        <?php echo $form->labelEx($model, 'photo'); ?>
        <?php echo CHtml::activeFileField($model, 'photo'); ?>  
        <?php echo $form->error($model, 'photo'); ?>
    </div>



    <div class="row">
        <?php echo $form->labelEx($model, 'date_from'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model' => $model,
            //==options==
            'options' => array(
                'dateFormat' => 'yy-mm-dd', // save to db format
                'altField' => 'date_from',
                'altFormat' => 'yy-mm-dd', // show to user format
            ),
            //==========
            'attribute' => 'date_from',
            'htmlOptions' => array(
                'size' => '10', // textField size
                'maxlength' => '10', // textField maxlength
            ),
        ));
        echo $form->error($model, 'date_from');
        ?>
    </div>


    <div class="row">
        <?php echo $form->labelEx($model, 'date_to'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model' => $model,
            //==options==
            'options' => array(
                'dateFormat' => 'yy-mm-dd', // save to db format
                'altField' => 'date_to',
                'altFormat' => 'yy-mm-dd', // show to user format
            ),
            //==========
            'attribute' => 'date_to',
            'htmlOptions' => array(
                'size' => '10', // textField size
                'maxlength' => '10', // textField maxlength
            ),
        ));
        echo $form->error($model, 'date_to');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'coupon_type');
        echo $form->dropDownList($model, 'status', array('percentage' => 'Percentage', 'fixed' => 'Fixed'));
        echo $form->error($model, 'status');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'status');
        echo $form->dropDownList($model, 'status', array('active' => 'Active', 'inactive' => 'InActive'));
        echo $form->error($model, 'status');
        ?>
    </div>


    <div class="row">
        <?php echo $form->labelEx($model, 'discount'); ?>
        <?php echo $form->textField($model, 'discount'); ?>
        <?php echo $form->error($model, 'discount'); ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
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

</style>