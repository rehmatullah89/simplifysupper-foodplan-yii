<?php
/* @var $this BlogController */
/* @var $model Blog */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'blog-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php
//        echo CHtml::textField('cat_names', implode(',', Blog::getBlogCatName($model->id)), array('id' => 'cat_names'));
//        $this->widget('ext.select2.ESelect2', array(
//            'selector' => '#cat_names',
//            'options' => array(
//                'tags' => implode(',', Blog::getBlogCatName($model->id)), array('id' => 'cat_names'),
//                'placeholder' => 'Select categories for the recipe!',
//                'width' => '28%',
//                'tokenSeparators' => array(',', ' '),
//                'active' => array('selected' => true,)
//            ),
//        ));
        ?>
    </div>
    <div class="row">
        <div id="subcats">
            <?php
            // CVarDumper::dump($vals->blogCategories[1]['cat_id'],10,1);
//            
//            foreach($subcats as $vals){
//                CVarDumper::dump($vals->blogCategories->id, 10,1);
//           }
//           exit;
            ?>
        </div>
    </div>

    <div class="row title">
        <?php
        echo $form->labelEx($model, 'title');
        echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 100));
        echo $form->error($model, 'title');
        ?>
    </div>

    <!--    <div class="row">-->
    <div class="tinymce" style="margin-left: -30px;">
        <?php
        echo $form->labelEx($model, 'description');
        echo $form->textArea($model, 'description', array('rows' => 6, 'cols' => 50));
        echo $form->error($model, 'description');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'status');
        echo $form->dropDownList($model, 'status', array('Active' => 'Active', 'InActive' => 'InActive'));
        echo $form->error($model, 'status');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'meta_keywords');
        echo $form->textArea($model, 'meta_keywords', array('rows' => 6, 'cols' => 50));
        echo $form->error($model, 'meta_keywords');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'meta_title');
        echo $form->textArea($model, 'meta_title', array('rows' => 6, 'cols' => 50));
        echo $form->error($model, 'meta_title');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'meta_desc');
        echo $form->textArea($model, 'meta_desc', array('rows' => 6, 'cols' => 50));
        echo $form->error($model, 'meta_desc');
        ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create Article' : 'Save', array('class' => 'btn btn-primary')); ?>
    </div>


    <!------tiny mce code here--------->

    <?php $this->widget('application.extensions.tinymce.SladekTinyMce'); ?>


    <script>
        tinymce.init({
            selector: "textarea#Contracts_contractName",
            menubar: false,
            width: 900,
            height: 300,
            toolbar1: "undo redo | bold | italic underline | alignleft aligncenter alignright alignjustify ",
            toolbar2: "outdent indent | hr | sub sup | bullist numlist | formatselect fontselect fontsizeselect | cut copy paste pastetext pasteword | search replace",
        });
    </script>

    <script type="text/javascript">

        tinymce.init({
            selector: "textarea#Blog_description",
            theme: "modern",
            width: 900,
            height: 300,
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],
            content_css: "css/content.css",
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
            style_formats: [
                {title: 'Bold text', inline: 'b'},
                {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                {title: 'Example 1', inline: 'span', classes: 'example1'},
                {title: 'Example 2', inline: 'span', classes: 'example2'},
                {title: 'Table styles'},
                {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
            ]
        });
    </script>

    <?php $this->endWidget(); ?>

</div><!-- form -->

<script>
    function getsubcategories()
    {
        $("#subcats").html("");
        var category_length = $(".select2-search-choice").length;
        for (var i = 0; i < category_length; i++)
        {
            var categories = $(".select2-search-choice:eq(" + i + ")").find("div").html();
            $.ajax({
                type: 'POST',
                url: '<?php echo Yii::app()->createAbsoluteUrl("recipe/getsubcategories"); ?>',
                data: 'categories=' + categories,
                success: function(data) {
                    var subcategories = $.parseJSON(data);
                    for (var i = 0; i < subcategories.length; i++)
                    {
                        // <div class="sub"><input type="checkbox" value="Fried Chicken" name="subcategories"><span>Fried Chicken</span></div>  
                        $("#subcats").append("<div class='sub'><input type='checkbox' name='subcategories[]' value='" + subcategories[i] + "'><span>" + subcategories[i] + "</span></div>");
                    }
                },
                error: function(data) { // if error occured
                    alert("Error occured.please try again");

                },
            })
        }
    }

</script>

<style>
    .select2-container-multi .select2-choices{
        margin-bottom: 15px;
    }
    .row.title > label {
        margin-top: 15px;
    }
    .sub
    {
        float:left;
    }
    .sub span
    {
        margin: 5px 10px 0 10px;
        vertical-align: top;
    }
</style>