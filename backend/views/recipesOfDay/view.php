<?php
/* @var $this RecipesOfDayController */
/* @var $model RecipesOfDay */

$this->breadcrumbs=array(
	'Recipes Of Days'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RecipesOfDay', 'url'=>array('index')),
	array('label'=>'Create RecipesOfDay', 'url'=>array('create')),
	array('label'=>'Update RecipesOfDay', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RecipesOfDay', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RecipesOfDay', 'url'=>array('admin')),
);
?>

<h1>View RecipesOfDay #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'rod_day',
		'recipeid',
	),
)); ?>
