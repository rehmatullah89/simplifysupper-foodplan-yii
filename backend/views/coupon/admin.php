<?php
/* @var $this CouponController */
/* @var $model Coupon */
$this->breadcrumbs = array(
    'Coupons' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Coupon', 'url' => array('index')),
    array('label' => 'Create Coupon', 'url' => array('create')),
);
?>

<h1>Manage Coupons</h1>

<?php
Yii::app()->clientScript->registerScript('coupondropdown', "

$('.blog-form form #staticid').change(function(){
	$.fn.yiiGridView.update('coupon-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="dropdown-form">
<?php
$this->renderPartial('_dropdownfilter', array(
    'model' => $model,
));
?>
</div><!-- end dropdown partial form -->

<?php
$form = $this->beginWidget('CActiveForm', array(
    'enableAjaxValidation' => true,
        ));

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'coupon-grid',
    'dataProvider' => $model->search(),
    //'filter'=>$model,
    'columns' => array(
        array(
            'id' => 'autoId',
            'class' => 'CCheckBoxColumn',
            'selectableRows' => '50',
        ),
//'id',
        'coupon_code',
        'coupon_title',
        'coupon_details',
        'url',
        'photo',
        /*
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
         */
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
<script>
    function reloadGrid(data) {
        $.fn.yiiGridView.update('coupon-grid');
    }
</script>
<?php
echo CHtml::ajaxSubmitButton('Filter', array('coupon/ajaxupdate'), array(), array("style" => "display:none;"));
echo CHtml::ajaxSubmitButton('Delete', array('coupon/ajaxupdate', 'act' => 'doDelete'), array('success' => 'reloadGrid'), array('class' => 'btn btn-primary'));
echo CHtml::ajaxSubmitButton('Active', array('coupon/ajaxupdate', 'act' => 'Active'), array('success' => 'reloadGrid'), array('class' => 'btn btn-primary', 'style' => 'margin:6px;'));
echo CHtml::ajaxSubmitButton('InActive', array('coupon/ajaxupdate', 'act' => 'InActive'), array('success' => 'reloadGrid'), array('class' => 'btn btn-primary'));
$this->endWidget();
?>
