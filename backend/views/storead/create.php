<?php
/* @var $this StoreAdController */
/* @var $model StoreAd */

$this->breadcrumbs=array(
	'Store Ads'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StoreAd', 'url'=>array('index')),
	array('label'=>'Manage StoreAd', 'url'=>array('admin')),
);
?>

<h1>Create StoreAd</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'chkrequest'=>'create')); ?>