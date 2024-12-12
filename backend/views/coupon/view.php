<?php
/* @var $this CouponController */
/* @var $model Coupon */
$this->breadcrumbs=array(
	'Coupons'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Coupon', 'url'=>array('index')),
	array('label'=>'Create Coupon', 'url'=>array('create')),
	array('label'=>'Update Coupon', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Coupon', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Coupon', 'url'=>array('admin')),
);
?>

<h1>View Coupon #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'coupon_code',
		'coupon_title',
		'coupon_details',
		'url',
		'photo',
		'date_from',
		'date_to',
		'coupon_type',
		'discount',
		'status',
		'viewed',
		'clicked',
		'created_at',
		'created_by',
		'modified_at',
		'modified_by',
	),
)); ?>
