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

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('approved-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Testimonials</h1>


<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'testimonial-form',
    'enableAjaxValidation' => false,
    'action' => Yii::app()->createUrl('testimonial/filterdropdown'),
        ));
echo CHtml::dropDownList('staticid', '', array( '1' => 'Approved' ,'0' => 'New', '2' => 'Declined'), array(
    'onChange' => 'this.form.submit()',
    'ajax' => array(
        'type' => 'POST', //request type
)));
$this->endWidget();
?>



<?php
//echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); 
?>

<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$form = $this->beginWidget('CActiveForm', array(
    'enableAjaxValidation' => true,
        ));
?>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
   'id' => 'testimonial-grid',
    'dataProvider' => $model->searchApproved(),
 //   'filter' => $model,
    'columns' => array(
        array(
            'id' => 'autoId',
            'class' => 'CCheckBoxColumn',
            'selectableRows' => '50',
        ),
        'id',
        'created_by',
        'test_name',
        'status',
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
<?php echo CHtml::ajaxSubmitButton('Filter', array('testimonial/ajaxupdate'), array(), array("style" => "display:none;")); ?>
<?php echo CHtml::ajaxSubmitButton('Delete', array('testimonial/ajaxupdate', 'act' => 'doDelete'), array('success' => 'reloadGrid'), array('class' => 'btn btn-primary')); ?>
<?php //echo CHtml::ajaxSubmitButton('Accept Testimonial', array('testimonial/ajaxupdate', 'act' => 'testimonialAccept'), array('success' => 'reloadGrid'), array('class' => 'btn btn-primary','style'=>'margin:6px;')); ?>
<?php echo CHtml::ajaxSubmitButton('Decline Testimonial', array('testimonial/ajaxupdate', 'act' => 'testimonialDelete'), array('success' => 'reloadGrid'), array('class' => 'btn btn-primary')); ?>
<?php
$this->endWidget();

