<?php
/* @var $this StoreAdController */
/* @var $model StoreAd */

$this->breadcrumbs=array(
	'Store Ads'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List StoreAd', 'url'=>array('index')),
	array('label'=>'Create StoreAd', 'url'=>array('create')),
	array('label'=>'Update StoreAd', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete StoreAd', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StoreAd', 'url'=>array('admin')),
);
?>

<h1>View StoreAd #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'description',
		'url',
		'store_logo',
		'start_date',
		'end_date',
		'status',
		'created_at',
		'created_by',
		'modified_at',
		'modified_by',
	),
)); ?>
