<?php
/* @var $this CommentController */
/* @var $model Comment */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'comment-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'title'); ?>
<?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 100)); ?>
<?php echo $form->error($model, 'title'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'description'); ?>
<?php echo $form->textArea($model, 'description', array('rows' => 6, 'cols' => 50)); ?>
<?php echo $form->error($model, 'description'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'parent_id'); ?>
<?php echo $form->textField($model, 'parent_id', array('size' => 10, 'maxlength' => 10)); ?>
<?php echo $form->error($model, 'parent_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'parent_type'); ?>
<?php echo $form->textField($model, 'parent_type', array('size' => 60, 'maxlength' => 100)); ?>
<?php echo $form->error($model, 'parent_type'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'created_at'); ?>
        <?php
        // echo $form->textField($model,'created_at');

      
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model' => $model,
            //==options==
            'options' => array(
                'dateFormat' => 'yy-mm-dd', // save to db format
                'altField' => 'created_at',
                'altFormat' => 'yy-mm-dd', // show to user format
            ),
            //==========
            'attribute' => 'created_at',
            'htmlOptions' => array(
                'size' => '10', // textField size
                'maxlength' => '10', // textField maxlength
            ),
        ));
        ?>

       
        <?php echo $form->error($model, 'created_at'); ?>
    </div>

    <div class="row">
<?php echo $form->labelEx($model, 'created_by'); ?>
<?php echo $form->textField($model, 'created_by', array('size' => 20, 'maxlength' => 20)); ?>
        <?php echo $form->error($model, 'created_by'); ?>
    </div>

    <div class="row">
<?php echo $form->labelEx($model, 'modified_at'); ?>
<?php echo $form->textField($model, 'modified_at'); ?>
        <?php echo $form->error($model, 'modified_at'); ?>
    </div>

    <div class="row">
<?php echo $form->labelEx($model, 'modified_by'); ?>
<?php echo $form->textField($model, 'modified_by', array('size' => 11, 'maxlength' => 11)); ?>
        <?php echo $form->error($model, 'modified_by'); ?>
    </div>

    <div class="row">
<?php echo $form->labelEx($model, 'status'); ?>
<?php echo $form->textField($model, 'status', array('size' => 8, 'maxlength' => 8)); ?>
        <?php echo $form->error($model, 'status'); ?>
    </div>

    <div class="row buttons">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->