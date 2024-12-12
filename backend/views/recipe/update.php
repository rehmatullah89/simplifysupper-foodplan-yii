<?php
/* @var $this RecipeController */
/* @var $model Recipe */

$this->breadcrumbs = array(
    'Recipes' => array('index'),
    $model->title => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'List Recipe', 'url' => array('index')),
    array('label' => 'Create Recipe', 'url' => array('create')),
    array('label' => 'View Recipe', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Manage Recipe', 'url' => array('admin')),
);
?>

<h1>Update Recipe <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form2', array('model' => $model, 'id' => $id, 'recipeIng' => $recipeIng, 'rec_ing' => $rec_ing)); ?>
<script type="text/javascript">

    $(document).ready(function() {

        var ab = "<?php echo Yii::app()->session['count']; ?>";
        if(ab == "")
            ab=0;
        $('.row1').hide();
        var abc = $('div.row1 table.options-table tr').html();

        $('.del').live('click', function() {
            if (ab > 1)
                $(this).parent().parent().remove();
            ab = ab - 1;
        });

        $('.add').live('click', function() {
            //$(this).val('Delete');
            //$(this).attr('class', 'del');
            ab = ab + 1;
            var appendTxt = '<tr style="background-color: #ddd ;">' + abc + '</tr>';
            $("tr:last").after(appendTxt);
        });
    });


</script>