<?php
/* @var $this RecipesOfDayController */
/* @var $model RecipesOfDay */
$this->breadcrumbs = array(
    'Recipes Of Days' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List RecipesOfDay', 'url' => array('index')),
    array('label' => 'Create RecipesOfDay', 'url' => array('create')),
);

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
    //  'filter' => $model,
    'columns' => array(
        //'id',
        // 'rod_day',
        array(
            'name' => 'recipeid',
            'type' => 'html',
            'value' => function($data) {
        $countRecipe = 0;
        $recipes = RecipesOfDay::model()->findAllbyAttributes(array('rod_day' => $data->rod_day));
        $count = 1;
        foreach ($recipes as $myrecipe) {
            //echo query->relation->fkfieldname . ',';
            if ($count === 1) {
//                echo $data->rod_day .'!'  ;
                echo '<p class="mydatemargin">' . $data->rod_day . '</p>';
                echo '<p class="datashow">"' . $myrecipe->recipe->title . '"</p>';
            } else {
                echo '<p class="datashow">' . $myrecipe->recipe->title . ',' . '</p>';
                //echo ','. $myrecipe->recipe->title;
            }
            $count++;
        }
    }
        ),
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
<style>
    .datashow {
        float: right;
        padding-right: 40px;
    }
    .mydatemargin{
        margin: -4px 6px 4px;
        padding-left: 3px;

    }
</style>
