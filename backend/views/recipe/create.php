<?php
/* @var $this RecipeController */
/* @var $model Recipe */

$this->breadcrumbs = array(
    'Recipes' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List Recipe', 'url' => array('index')),
    array('label' => 'Manage Recipe', 'url' => array('admin')),
);
?>

<h1>Create Recipe</h1>
<script type="text/javascript">

    $(document).ready(function() {


        $('.row1').hide();
        var abc = $('div.row1 table tr').html();

        $('.del').live('click', function() {
            $(this).parent().parent().remove();
        });

        $('.add').live('click', function() {
            //$(this).val('Delete');
            //$(this).attr('class', 'del');
            var appendTxt = '<tr style="background-color: #ddd ;">' + abc + '</tr>';
            $("tr:last").after(appendTxt);
        });
    });


</script>
<?php echo $this->renderPartial('_form', array('model' => $model, 'recipeIng' => $recipeIng /* , 'category' => $category */)); ?>