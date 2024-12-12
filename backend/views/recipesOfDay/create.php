<?php
/* @var $this RecipesOfDayController */
/* @var $model RecipesOfDay */

$this->breadcrumbs=array(
	'Recipes Of Days'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RecipesOfDay', 'url'=>array('index')),
	array('label'=>'Manage RecipesOfDay', 'url'=>array('admin')),
);
?>

<h1>Create RecipesOfDay</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>