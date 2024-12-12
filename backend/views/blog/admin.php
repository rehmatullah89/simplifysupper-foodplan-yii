<?php
/* @var $this BlogController */
/* @var $model Blog */
$this->breadcrumbs=array(
	'Blogs'=>array('index'),
	'Manage',
);
$this->menu=array(
	array('label'=>'List Blog', 'url'=>array('index')),
	array('label'=>'Create Blog', 'url'=>array('create')),
);
?>

<h1>Manage Blogs</h1>
<?php
Yii::app()->clientScript->registerScript('blogdropdown', "

$('.blog-form form #staticid').change(function(){
	$.fn.yiiGridView.update('blog-grid', {
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
    'id' => 'blog-grid',
    'dataProvider' => $model->search(),
    //'filter'=>$model,
    'columns' => array(
        array(
            'id' => 'autoId',
            'class' => 'CCheckBoxColumn',
            'selectableRows' => '50',
        ),
        //'id',
        'title',
        'description',
        'created_at',
        'created_by',
        'status',
        /*
          'meta_keywords',
          'meta_title',
          'meta_desc',
         */
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));

?>
<script>
    function reloadGrid(data) {
        $.fn.yiiGridView.update('blog-grid');
    }
</script>
<?php
echo CHtml::ajaxSubmitButton('Filter', array('blog/ajaxupdate'), array(), array("style" => "display:none;"));
echo CHtml::ajaxSubmitButton('Delete', array('blog/ajaxupdate', 'act' => 'doDelete'), array('success' => 'reloadGrid'), array('class' => 'btn btn-primary'));
echo CHtml::ajaxSubmitButton('Active', array('blog/ajaxupdate', 'act' => 'Active'), array('success' => 'reloadGrid'), array('class' => 'btn btn-primary', 'style' => 'margin:6px;'));
echo CHtml::ajaxSubmitButton('InActive', array('blog/ajaxupdate', 'act' => 'InActive'), array('success' => 'reloadGrid'), array('class' => 'btn btn-primary'));
$this->endWidget();
?>
