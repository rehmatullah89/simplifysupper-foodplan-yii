<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Users',
);

$this->menu=array(
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>Users</h1>

<?php 
// $this->widget('zii.widgets.CListView', array(
	// 'dataProvider'=>$dataProvider,
	// 'itemView'=>'_view',
// )); ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array
    (
	array(
        'name'  => 'firstname',
        //'value' => 'CHtml::link($data->firstname, Yii::app()->createUrl("user/view/".$data->primaryKey))',
            'value' => 'CHtml::link($data->firstname, Yii::app()->createUrl("user/update/".$data->primaryKey))',
		'type'  => 'raw',
		),
		//'firstname',
		'lastname',
		'usertype',
		'email',
		//'username',
		'signed_up',
		'status', 
	),
)); ?>