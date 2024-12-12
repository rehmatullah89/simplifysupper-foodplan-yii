<?php
/* @var $this StoreAdController */
/* @var $model StoreAd */

$this->breadcrumbs = array(
    'Store Ads' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List StoreAd', 'url' => array('index')),
    array('label' => 'Create StoreAd', 'url' => array('create')),
);
?>

<h1>Manage Store Ads</h1>

<?php
Yii::app()->clientScript->registerScript('storeaddropdown', "

$('.store-ad-status-form form #staticid').change(function(){
	$.fn.yiiGridView.update('store-ad-grid', {
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
    'id' => 'store-ad-grid',
    'dataProvider' => $model->search(),
//    'filter' => $model,
    'columns' => array(
        array(
            'id' => 'autoId',
            'class' => 'CCheckBoxColumn',
            'selectableRows' => '50',
        ),
//        'id',
        'title',
        'description',
        'url',
        'store_logo',
        'start_date',
        /*
          'end_date',
          'status',
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
        $.fn.yiiGridView.update('store-ad-grid');
    }
</script>
<?php
echo CHtml::ajaxSubmitButton('Filter', array('storead/ajaxupdate'), array(), array("style" => "display:none;"));
echo CHtml::ajaxSubmitButton('Delete', array('storead/ajaxupdate', 'act' => 'doDelete'), array('success' => 'reloadGrid'), array('class' => 'btn btn-primary'));
echo CHtml::ajaxSubmitButton('Active', array('storead/ajaxupdate', 'act' => 'Active'), array('success' => 'reloadGrid'), array('class' => 'btn btn-primary', 'style' => 'margin:6px;'));
echo CHtml::ajaxSubmitButton('InActive', array('storead/ajaxupdate', 'act' => 'InActive'), array('success' => 'reloadGrid'), array('class' => 'btn btn-primary'));
$this->endWidget();
?>
