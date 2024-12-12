<?php
/* @var $this StoreAdController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Store Ads',
);

$this->menu=array(
	array('label'=>'Create StoreAd', 'url'=>array('create')),
	array('label'=>'Manage StoreAd', 'url'=>array('admin')),
);
?>

<h1>Store Ads</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
