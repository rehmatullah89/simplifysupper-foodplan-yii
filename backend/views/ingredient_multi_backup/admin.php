<?php
/* @var $this IngredientController */
/* @var $model Ingredient */

$this->breadcrumbs = array(
    'Ingredients' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Ingredient', 'url' => array('index')),
    array('label' => 'Create Ingredient', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('ingredient-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Ingredients</h1>

<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<!--<div class="search-form" style="display:none">-->
<?php
//$this->renderPartial('_search',array(
//	'model'=>$model,
//));
?>
<!--</div> search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'ingredient-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        //'id',
        'barcode',
        'ingredient',
        'pantry',
        'catid',
        array(
            'name' => 'measurement',
            'type' => 'html',
            'value' => function($data) {
        $countRecipe = 0;
        $findMeasures = IngredientMeasurement::model()->findAllbyAttributes(array('ing_id' => $data->id));
        $myString = '';
        foreach ($findMeasures as $ms) {
            //echo query->relation->fkfieldname . ',';
            $myString.=$ms->measure->measurement . ',';
        }
        echo $myString;
    }
        ),
        /*
          'ingweight',
          'weight',
          'water',
          'kcal',
          'protein',
          'fat',
          'sat_fat',
          'mono_unsat_fat',
          'poly_unsat_fat',
          'cholesterol',
          'carbohydrate',
          'dietry_fiber',
          'calcium',
          'iron',
          'potassium',
          'sodium',
          'suger',
          'vit_a_iu',
          'vit_a_re',
          'thiamin',
          'flavin',
          'niacin',
          'vit_c',
          'vit_e',
          'refuse_pct',
          'updated_by',
          'created_at',
          'created_by',
          'updated_at',
         */
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
