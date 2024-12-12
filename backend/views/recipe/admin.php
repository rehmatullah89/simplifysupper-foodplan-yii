<?php
/* @var $this RecipeController */
/* @var $model Recipe */

$this->breadcrumbs = array(
    'Recipes' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Recipe', 'url' => array('index')),
    array('label' => 'Create Recipe', 'url' => array('create')),
);
?>

<h3>Manage Recipes</h3>
<?php
Yii::app()->clientScript->registerScript('dropdownfilter2', "

$('.dropdown-form form #staticid').change(function(){
$.fn.yiiGridView.update('recipe-grid', {
      
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
    'id' => 'recipe-grid',
    'dataProvider' => $model->search(),
    // 'filter' => $model,
    'columns' => array(
        array(
            'id' => 'autoId',
            'class' => 'CCheckBoxColumn',
            'selectableRows' => '50',
        ),
        //'id',
        'title',
        array(
            'name' => '',
            'type' => 'raw',
            'value' => '$data->meal_for_breakfast==1?"BreakFast,":""',
            'htmlOptions' => array(
                'class' => 'testclass'
            ),
        ),
        array(
            'name' => 'Meal',
            'type' => 'raw',
            'value' => '$data->meal_for_lunch==1?"Lunch,":""',
            'htmlOptions' => array(
                'class' => 'testclass'
            ),
        ),
        array(
            'name' => '',
            'type' => 'raw',
            'value' => '$data->meal_for_dinner==1?"Dinner":""',
            'htmlOptions' => array(
                'class' => 'testclass'
            ),
        ),
//        'meal_for_lunch',
//        'meal_for_dinner',
        //    'created_by',
        array(
            'name' => 'created_by',
            'type' => 'raw',
            'value' => '$data->createdBy->firstname',
            'htmlOptions' => array(
                'class' => 'testclass'
            ),
        ),
        'status',
        array(
            'name' => 'photo',
            'type' => 'html',
            'value' => 'CHtml::image(Yii::app()->baseUrl . "/images/" . $data->photo)',
            'htmlOptions' => array('class' => 'myimage')


        //  array("width" => "150px", "height" => "150px"),
        ),
        //   'photo',
        /*
          'description',
          'directions',
          'nutritions',
          'recipe_type',
          'meta_keywords',
          'meta_title',
          'meta_desc',
          'sidedish',
          'serving_size',
          'video',
          'videourl',
          'status',
          'photos',
          'featured',
          'rating',
          'viewed',
          'owner_type',
          'created_by',
          'created_at',
          'modified_at',
          'modified_by',
          'approved_by',
          'approved_on',
         */
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
<script>
    function reloadGrid(data) {
        $.fn.yiiGridView.update('recipe-grid');
    }
</script>
<?php
echo CHtml::ajaxSubmitButton('Filter', array('recipe/ajaxupdate'), array(), array("style" => "display:none;"));
echo CHtml::ajaxSubmitButton('Delete', array('recipe/ajaxupdate', 'act' => 'doDelete'), array('success' => 'reloadGrid'), array('class' => 'btn btn-primary', 'id' => 'deletebuttonid', 'style' => 'margin:6px;'));
echo CHtml::ajaxSubmitButton('Approved Recipe ', array('recipe/ajaxupdate', 'act' => 'testimonialAccept'), array('success' => 'reloadGrid'), array('class' => 'btn btn-primary', 'id' => 'approvedbuttonid', 'style' => 'margin:6px;'));
echo CHtml::ajaxSubmitButton('Decline Recipe ', array('recipe/ajaxupdate', 'act' => 'testimonialDelete'), array('success' => 'reloadGrid'), array('class' => 'btn btn-primary', 'id' => 'declinedbuttonid', 'style' => '6px;'));
$this->endWidget();
?>

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
<script>

//    $('#staticid').change(function() {
//        var getdropval = $("#staticid option:selected").text();
//        if (getdropval == "New") {
//            $('#approvedbuttonid').css("visibility", "visible");
//            $('#approvedbuttonid').css("display", "block");
//            $('#declinedbuttonid').css("visibility", "visible");
//            $("#deletebuttonid").css("visibility", "visible");
//        }
//        if (getdropval == "Approved") {
//            $('#approvedbuttonid').css("visibility", "hidden");
//            $('#declinedbuttonid').css("visibility", "visible");
//            $('#declinedbuttonid').css("margin-left", "-850px");
//             $('#declinedbuttonid').css("margin-top", "32px");
//        }
//        if (getdropval == "Declined") {
//            $('#declinedbuttonid').css("visibility", "hidden");
//           // $("#approvedbuttonid").css("display", "block");
////                $('#approvedbuttonid').css("margin", "-26px 80px 6px");
//
//        }
//    });

</script>