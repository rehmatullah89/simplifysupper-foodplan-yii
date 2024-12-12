<?php
/* @var $this TestimonialController */
/* @var $model Testimonial */
/* @var $form CActiveForm */
?>

<div class="wide form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    ));
    ?>
    <div class="row">
        <?php
        echo CHtml::dropDownList('staticid', '', array('0' => 'New', '1' => 'Approved', '2' => 'Declined'), array(
            // 'onChange' => 'this.form.submit()',

            'ajax' => array(
                'type' => 'POST', //request type
        )));
        ?>
    </div>
    <?php $this->endWidget(); ?>
</div><!-- search-form -->