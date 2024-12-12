
<?php
/* @var $this StoreAdController */
/* @var $model StoreAd */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'store-ad-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php
    if ($chkrequest == 'create') {
        ?>
        <div class="row">
            <?php
            echo $form->labelEx($model, 'Categories');

            $this->widget(
                    'bootstrap.widgets.TbSelect2', array(
                'name' => 'cat_names[]',
                'data' => StoreAd::getRecipeforstoread(),
                'htmlOptions' => array(
                    'multiple' => 'multiple',
                    'class' => 'span3',
                    'left' => '207px',
                    'id' => 'select1li_id'
                ),
                    )
            );
            ?>
        </div>

        <?php
    } 
    ?>
    
     <?php
    if ($chkrequest == 'update') {
        ?>
        <div class="row">
            <?php
            echo $form->labelEx($model, 'Categories');

            $this->widget(
                    'bootstrap.widgets.TbSelect2', array(
                'name' => 'cat_names[]',
                'data' => StoreAd::getRecipeforstoread(),
                'htmlOptions' => array(
                    'multiple' => 'multiple',
                    'class' => 'span3',
                    'left' => '207px',
                    'id' => 'select1li_id'
                ),
                    )
            );
            ?>
        </div>

        <?php
    } 
    ?>


    <div class="row">
        <?php echo $form->labelEx($model, 'title'); ?>
        <?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'title'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'description'); ?>
        <?php echo $form->textArea($model, 'description', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'description'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'url'); ?>
        <?php echo $form->textField($model, 'url', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'url'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'store_logo'); ?>
        <?php echo CHtml::activeFileField($model, 'store_logo'); ?>  

        <?php //echo $form->textArea($model, 'store_logo', array('rows' => 6, 'cols' => 50));    ?>
        <?php echo $form->error($model, 'store_logo'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'start_date'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model' => $model,
            //==options==
            'options' => array(
                'dateFormat' => 'yy-mm-dd', // save to db format
                'altField' => 'start_date',
                'altFormat' => 'yy-mm-dd', // show to user format
            ),
            //==========
            'attribute' => 'start_date',
            'htmlOptions' => array(
                'size' => '10', // textField size
                'maxlength' => '10', // textField maxlength
            ),
        ));
        echo $form->error($model, 'start_date');
        ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'end_date'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model' => $model,
            //==options==
            'options' => array(
                'dateFormat' => 'yy-mm-dd', // save to db format
                'altField' => 'end_date',
                'altFormat' => 'yy-mm-dd', // show to user format
            ),
            //==========
            'attribute' => 'end_date',
            'htmlOptions' => array(
                'size' => '10', // textField size
                'maxlength' => '10', // textField maxlength
            ),
        ));
        echo $form->error($model, 'end_date');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'status');
        echo $form->dropDownList($model, 'status', array('active' => 'Active', 'inactive' => 'InActive'));
        echo $form->error($model, 'status');
        ?>
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