<?php
/* @var $this BannerController */
/* @var $model Banner */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'banner-form',
        'enableAjaxValidation' => false,
         'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'title'); ?>
        <?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'title'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'details'); ?>
        <?php echo $form->textArea($model, 'details', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'details'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'owner_name'); ?>
        <?php echo $form->textField($model, 'owner_name', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'owner_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'image'); ?>
        <?php echo CHtml::activeFileField($model, 'image'); ?>  
        <?php echo $form->error($model, 'image'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'back_url'); ?>
        <?php echo $form->textArea($model, 'back_url', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'back_url'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'owner_type'); ?>
        <?php echo $form->textField($model, 'owner_type', array('size' => 6, 'maxlength' => 6)); ?>
        <?php echo $form->error($model, 'owner_type'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'owner'); ?>
        <?php echo $form->textField($model, 'owner', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'owner'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'owner_phone'); ?>
        <?php echo $form->textField($model, 'owner_phone', array('size' => 30, 'maxlength' => 30)); ?>
        <?php echo $form->error($model, 'owner_phone'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'owner_email'); ?>
        <?php echo $form->textField($model, 'owner_email', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'owner_email'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'btype'); ?>
        <?php echo $form->textArea($model, 'btype', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'btype'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'price'); ?>
        <?php echo $form->textField($model, 'price'); ?>
        <?php echo $form->error($model, 'price'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'clicks'); ?>
        <?php echo $form->textField($model, 'clicks', array('size' => 20, 'maxlength' => 20)); ?>
        <?php echo $form->error($model, 'clicks'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'views'); ?>
        <?php echo $form->textField($model, 'views', array('size' => 20, 'maxlength' => 20)); ?>
        <?php echo $form->error($model, 'views'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'clicked'); ?>
        <?php echo $form->textField($model, 'clicked', array('size' => 20, 'maxlength' => 20)); ?>
        <?php echo $form->error($model, 'clicked'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'viewed'); ?>
        <?php echo $form->textField($model, 'viewed', array('size' => 20, 'maxlength' => 20)); ?>
        <?php echo $form->error($model, 'viewed'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'status'); ?>
        <?php echo $form->textField($model, 'status', array('size' => 7, 'maxlength' => 7)); ?>
        <?php echo $form->error($model, 'status'); ?>
    </div>



    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->