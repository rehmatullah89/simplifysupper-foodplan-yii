<?php
/* @var $this RecipesOfDayController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Recipes Of Days',
);

$this->menu=array(
	array('label'=>'Create RecipesOfDay', 'url'=>array('create')),
	array('label'=>'Manage RecipesOfDay', 'url'=>array('admin')),
);
?>

<h1>Recipes Of Days</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
