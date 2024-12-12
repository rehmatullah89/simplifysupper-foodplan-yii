<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('user-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Users</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		//'memberid',
		'firstname',
		'lastname',
		'usertype',
		'email',
             array(
            'name' => 'photo',
            'type' => 'html',
            'value' => 'CHtml::image(Yii::app()->baseUrl . "/images/" . $data->photo)',
            'htmlOptions' => array('class' => 'myimage')


        //  array("width" => "150px", "height" => "150px"),
        ),
		//'username',
		'status',
		//'password',
		/*
		'about',
		'photo',
		'address',
		'city',
		'state',
		'zip',
		'country',
		'phone',
		'dob',
		'age',
		'gender',
		'signed_up',
		'recipes',
		'articles',
		'photos',
		'videos',
		'testimonials',
		'friends',
		'viewed',
		'spclicks',
		'spviews',
		'howto',
		'meta_keywords',
		'meta_title',
		'meta_desc',
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