<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->memberid=>array('view','id'=>$model->memberid),
	'Update',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'View User', 'url'=>array('view', 'id'=>$model->memberid)),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h3>Edit  <?php echo $model->firstname; ?></h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>