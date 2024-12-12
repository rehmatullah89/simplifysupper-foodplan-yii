<?php
/* @var $this RecipesOfDayController */
/* @var $data RecipesOfDay */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rod_day')); ?>:</b>
	<?php echo CHtml::encode($data->rod_day); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('recipeid')); ?>:</b>
	<?php echo CHtml::encode($data->recipeid); ?>
	<br />


</div>