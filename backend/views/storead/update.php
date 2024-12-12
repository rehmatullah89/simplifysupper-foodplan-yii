<?php
/* @var $this StoreAdController */
/* @var $model StoreAd */

$this->breadcrumbs=array(
	'Store Ads'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List StoreAd', 'url'=>array('index')),
	array('label'=>'Create StoreAd', 'url'=>array('create')),
	array('label'=>'View StoreAd', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage StoreAd', 'url'=>array('admin')),
);
?>

<h1>Update StoreAd <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_formupdate', array('model'=>$model)); ?>