<?php
/* @var $this RecipeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Recipes',
);

$this->menu=array(
	array('label'=>'Create Recipe', 'url'=>array('create')),
	array('label'=>'Manage Recipe', 'url'=>array('admin')),
        array('label'=>'Set Recipe of Day', 'url'=>array('rod')),
);
?>

<h1>Recipes</h1>

<?php //$this->widget('zii.widgets.CListView', array(
	//'dataProvider'=>$dataProvider,
	//'itemView'=>'_view',
//)); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array
    (
	array(
        'name'  => 'title',
        'value' => 'CHtml::link($data->title, Yii::app()->createUrl("recipe/view/".$data->primaryKey))',
		'type'  => 'raw',
		),
		//'title',
		'description',
		'directions',
		'nutritions',
		'recipe_type',
		'status',
		'created_by', 
	),
)); ?>