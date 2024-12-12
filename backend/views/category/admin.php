<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Category', 'url'=>array('index')),
	array('label'=>'Create Category', 'url'=>array('create')),
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
?>

<h1>Manage Categories</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'category-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		'cat_name',
		'cat_desc',
		'cat_type',
		'parent',
		//'photo',
              array(
            'name' => 'photo',
            'type' => 'html',
            'value' => 'CHtml::image(Yii::app()->baseUrl . "/images/" . $data->photo)',
            'htmlOptions' => array('class' => 'myimage')


        //  array("width" => "150px", "height" => "150px"),
        ),
		/*
		'video',
		'status',
		'seo_url',
		'meta_keyword',
		'meta_title',
		'meta_desc',
		'rating',
		'rater',
		'viewed',
		'created_by',
		'created_at',
		'modified_at',
		'modified_by',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
<style>
    .testclass{
        width: 6%;
    }
    .photoclass{
        text-align: center;
    }
    .myimage img {
        width: 100px;
        height: 100px;
        margin-left:100px;


    }
</style>