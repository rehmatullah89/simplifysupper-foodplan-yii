<?php
/* @var $this RecipesOfDayController */
/* @var $model RecipesOfDay */

$this->breadcrumbs=array(
	'Recipes Of Days'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RecipesOfDay', 'url'=>array('index')),
	array('label'=>'Create RecipesOfDay', 'url'=>array('create')),
	array('label'=>'View RecipesOfDay', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage RecipesOfDay', 'url'=>array('admin')),
);
?>

<h1>Update RecipesOfDay <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>