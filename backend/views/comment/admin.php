<?php
/* @var $this CommentController */
/* @var $model Comment */

$this->breadcrumbs = array(
    'Comments' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Comment', 'url' => array('index')),
    array('label' => 'Create Comment', 'url' => array('create')),
);
?>

<h1>Manage Comments</h1>

<!-----------drop down form------------->
<?php
Yii::app()->clientScript->registerScript('dropdownfilter', "

$('.dropdown-form form #staticid').change(function(){
	$.fn.yiiGridView.update('comment-grid', {
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

$form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>true,
)); 

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'comment-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'id' => 'autoId',
            'class' => 'CCheckBoxColumn',
            'selectableRows' => '50',
        ),
        'id',
        'title',
        'description',
        'parent_id',
        'parent_type',
        //	'created_at',
//        'created_by',
//		'modified_at',
//		'modified_by',
        'status',
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
<script>
    function reloadGrid(data) {
        $.fn.yiiGridView.update('comment-grid');
    }
</script>
<?php
echo CHtml::ajaxSubmitButton('Filter', array('comment/ajaxupdate'), array(), array("style" => "display:none;"));
echo CHtml::ajaxSubmitButton('Delete', array('comment/ajaxupdate', 'act' => 'doDelete'), array('success' => 'reloadGrid'), array('class' => 'btn btn-primary'));
echo CHtml::ajaxSubmitButton('Approved Comments', array('comment/ajaxupdate', 'act' => 'Accept'), array('success' => 'reloadGrid'), array('class' => 'btn btn-primary', 'style' => 'margin:6px;'));
echo CHtml::ajaxSubmitButton('Decline Comment', array('comment/ajaxupdate', 'act' => 'Decline'), array('success' => 'reloadGrid'), array('class' => 'btn btn-primary'));
$this->endWidget();
?>


