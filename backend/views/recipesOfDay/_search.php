<?php
/* @var $this RecipesOfDayController */
/* @var $model RecipesOfDay */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rod_day'); ?>
		<?php echo $form->textField($model,'rod_day'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'recipeid'); ?>
		<?php echo $form->textField($model,'recipeid'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->