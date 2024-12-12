<?php
/* @var $this RecipesOfDayController */
/* @var $model RecipesOfDay */
$this->breadcrumbs = array(
    'Recipes Of Days' => array('index'),
    'Manage',
);

//$this->menu = array(
//    array('label' => 'List RecipesOfDay', 'url' => array('index')),
//    array('label' => 'Create RecipesOfDay', 'url' => array('create')),
//);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('recipes-of-day-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Recipes Of Days</h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'recipes-of-day-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        //'id',
        'rod_day',
        array(
            'name' => 'recipeid',
            'type' => 'html',
            'value' => function($data) {
        $countRecipe = 0;
        $recipes = RecipesOfDay::model()->findAllbyAttributes(array('rod_day' => $data->rod_day));
        $myString = '';
        foreach ($recipes as $myrecipe) {
            //echo query->relation->fkfieldname . ',';
            $myString.=$myrecipe->recipe->title.',';
          
        }
          echo $myString;
    }
        ),
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
