<?php
$this->breadcrumbs = array(
    'Categories' => array('index'),
    'Manage',
);
$this->menu = array(
	array('label'=>'List Category', 'url'=>array('index')),
	array('label'=>'Create Category', 'url'=>array('create')),
//    array('label' => 'List SubCategory', 'url' => array('#')),
//    array('label' => 'Create SubCategory', 'url' => array('#')),
);
$form = $this->beginWidget('CActiveForm', array(
    'enableAjaxValidation' => true,
        ));
?>
<h3>Categories</h3>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'menu-grid',
    'dataProvider' => $model->searchchkboxes(),
    //'filter' => $model,
    'columns' => array(
        array(
            'id' => 'autoId',
            'class' => 'CCheckBoxColumn',
            'selectableRows' => '50',
        ),
        array(
            'name' => 'cat_name',
            'value' => 'CHtml::link($data->cat_name, Yii::app()->createUrl("category/viewsubcat/".$data->primaryKey))',
            'type' => 'raw',
        ),
       // 'cat_desc',
        'cat_type',
//        'parent',
        'photo',
        'video',
        'status',
//        array(
//            'class'=>'CButtonColumn',
//        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{update}{delete}{add}',
            'buttons' => array(
                'update' => array(
                    'visible' => 'true',
                    'label' => '<span>Edit/</span>&nbsp;', //Text label of the button.
                ),
                'delete' => array(
                    'visible' => 'true',
                    'url' => 'Yii::app()->createUrl("category/delete", array("id"=>$data->primaryKey))',
                ),
                'add' => array(
                    'visible' => 'true',
//                     'url'=>'Yii::app()->createUrl("category/addsubcat", array("id"=>$data->primaryKey))',
//                    'htmlOptions'=>array('width'=>'20','height'=>'20'),
//                     'imageUrl' => Yii::app()->baseUrl . '/images/plus-icone-9072-48.png', // 
                    'url' => 'Yii::app()->createUrl("category/addsubcat", array("id"=>$data->primaryKey))',
                    'label' => '<span> / Add SubCategory</span>&nbsp;', //Text label of the button.
                ),
            ),
        ),
    ),
));
?>
<script>
    function reloadGrid(data) {
        $.fn.yiiGridView.update('menu-grid');
    }
</script>
<?php echo CHtml::ajaxSubmitButton('Filter', array('category/ajaxupdate'), array(), array("style" => "display:none;")); ?>
<?php echo CHtml::ajaxSubmitButton('Delete', array('category/ajaxupdate', 'act' => 'doDelete'), array('success' => 'reloadGrid'), array('class' => 'btn btn-primary')); ?>
<?php $this->endWidget(); ?>