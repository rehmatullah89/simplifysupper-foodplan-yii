<?php
/* @var $this BannerController */
/* @var $model Banner */

$this->breadcrumbs = array(
    'Banners' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Banner', 'url' => array('index')),
    array('label' => 'Create Banner', 'url' => array('create')),
);
?>

<h1>Manage Banners</h1>

<?php
Yii::app()->clientScript->registerScript('blogdropdown', "

$('.banner-form form #staticid').change(function(){
	$.fn.yiiGridView.update('banner-grid', {
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
    'id' => 'banner-grid',
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
        'details',
        'owner_name',
        'image',
        'back_url',
        /*
          'owner_type',
          'owner',
          'owner_phone',
          'owner_email',
          'btype',
          'price',
          'clicks',
          'views',
          'clicked',
          'viewed',
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
        $.fn.yiiGridView.update('banner-grid');
    }
</script>
<?php
echo CHtml::ajaxSubmitButton('Filter', array('banner/ajaxupdate'), array(), array("style" => "display:none;"));
echo CHtml::ajaxSubmitButton('Delete', array('banner/ajaxupdate', 'act' => 'doDelete'), array('success' => 'reloadGrid'), array('class' => 'btn btn-primary'));
echo CHtml::ajaxSubmitButton('Active', array('banner/ajaxupdate', 'act' => 'Active'), array('success' => 'reloadGrid'), array('class' => 'btn btn-primary', 'style' => 'margin:6px;'));
echo CHtml::ajaxSubmitButton('Expired', array('banner/ajaxupdate', 'act' => 'Expired'), array('success' => 'reloadGrid'), array('class' => 'btn btn-primary'));
$this->endWidget();
?>
