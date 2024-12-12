<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs = array(
    'Categories' => array('index'),
    'Manage',
);

$this->menu = array(
//	array('label'=>'List SubCategory', 'url'=>array('index')),
//	array('label'=>'Create SubCategory', 'url'=>array('create')),
    array('label' => 'List SubCategory', 'url' => array('#')),
    array('label' => 'Create SubCategory', 'url' => array('#')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('category-grid', {
		data: $(this).serialize()
	});
	return false;
});
");

$form = $this->beginWidget('CActiveForm', array(
    'enableAjaxValidation' => true,
        ));
?>



<h3><?php echo $cat_name; ?>  </h3>



<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'category-grid',
    'dataProvider' => $model->searchSubCats($id),
//    'filter' => $model,
    'columns' => array(
        array(
            'id' => 'autoId',
            'class' => 'CCheckBoxColumn',
            'selectableRows' => '50',
        ),
        //'id',
        'cat_name',
        'cat_desc',
        'cat_type',
        'parent',
        'photo',
        'video',
        'status',
//        'seo_url',
//        'meta_keyword',
//        'meta_title',
//        'meta_desc',
//        'rating',
//        'rater',
//        'viewed',
//        'created_by',
//        'created_at',
//        'modified_at',
//        'modified_by',
//		array(
//			'class'=>'CButtonColumn',
//		),
        array(
            'class' => 'CButtonColumn',
            'template' => '{update}{delete}',
            'buttons' => array(
                'update' => array(
                    'visible' => 'true',
                    'label' => '<span>Edit/</span>&nbsp;', //Text label of the button.
                ),
                'delete' => array(
                    'visible' => 'true',
                    'url' => 'Yii::app()->createUrl("category/deletesubcat", array("id"=>$data->primaryKey))',
                ),
            ),
        ),
    ),
));
?>
<script>
    function reloadGrid(data) {
        $.fn.yiiGridView.update('category-grid');
    }
</script>
<?php echo CHtml::ajaxSubmitButton('Filter', array('category/ajaxupdate'), array(), array("style" => "display:none;")); ?>
<?php echo CHtml::ajaxSubmitButton('Delete', array('category/ajaxupdate', 'act' => 'doDelete'), array('success' => 'reloadGrid'), array('class' => 'btn btn-primary')); ?>
<?php $this->endWidget(); ?>
<?php

//    if (is_file(Yii::getPathOfAlias('common.modules.notes') . DIRECTORY_SEPARATOR . 'NotesModule.php'))
//        NotesModule::renderNotes('Invite', $model->id);

//$moduleStatuses = Yii::app()->params['modulstatus'];
//if (isset($moduleStatuses['notes']) && $moduleStatuses['notes'] == 'active') {
//    if (is_file(Yii::getPathOfAlias('common.modules.notes') . DIRECTORY_SEPARATOR . 'NotesModule.php'))
//        NotesModule::renderNotes('Invite', $model->id);
//}
?>
