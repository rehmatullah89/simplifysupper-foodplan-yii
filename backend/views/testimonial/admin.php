<?php
/* @var $this TestimonialController */
/* @var $model Testimonial */

$this->breadcrumbs = array(
    'Testimonials' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Testimonial', 'url' => array('index')),
    array('label' => 'Create Testimonial', 'url' => array('create')),
);
?>

<h1>Manage Testimonials</h1>
<!-----------drop down form------------->
<?php
Yii::app()->clientScript->registerScript('dropdownfilter', "

$('.dropdown-form form #staticid').change(function(){
	$.fn.yiiGridView.update('testimonial-grid', {
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
    'id' => 'testimonial-grid',
    'dataProvider' => $model->search(),
    // 'filter' => $model,
    'columns' => array(
        array(
            'id' => 'autoId',
            'class' => 'CCheckBoxColumn',
            'selectableRows' => '50',
        ),
       // 'id',
        'created_by',
        'test_name',
        'test_email',
        'comments',
        'created_at',
        'status',
        /*
          'status',
          'approved_on',
          'approved_by',
         */
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
<script>
    function reloadGrid(data) {
        $.fn.yiiGridView.update('testimonial-grid');
    }
</script>
<?php
echo CHtml::ajaxSubmitButton('Filter', array('testimonial/ajaxupdate'), array(), array("style" => "display:none;")); 
echo CHtml::ajaxSubmitButton('Delete', array('testimonial/ajaxupdate', 'act' => 'doDelete'), array('success' => 'reloadGrid'), array('class' => 'btn btn-primary')); 
echo CHtml::ajaxSubmitButton('Approved Testimonial', array('testimonial/ajaxupdate', 'act' => 'testimonialAccept'), array('success' => 'reloadGrid'), array('class' => 'btn btn-primary','style'=>'margin:6px;')); 
echo CHtml::ajaxSubmitButton('Decline Testimonial', array('testimonial/ajaxupdate', 'act' => 'testimonialDelete'), array('success' => 'reloadGrid'), array('class' => 'btn btn-primary')); 
$this->endWidget();
?>


