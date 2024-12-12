
<div id="<?php echo $recipe_details->id; ?>">
    <span class='glyphicon glyphicon-remove-circle' style='cursor:pointer;' onClick="deleteSelected(<?php echo $recipe_details->id; ?>)"></span>
    <a href='<?php echo Yii::app()->request->baseUrl; ?>/site/test'><?php echo $recipe_details->title; ?></a><br/>
</div>


<script>

    function deleteSelected(id)
    {
        alert(id)
        return false;
        
//        $.ajax({
//            url: "<?php //echo Yii::app()->request->baseUrl . '/site/deleteselected/' ?>",
//            type: "post",
//            async: false,
//            data: "id=" + id,
//            success: function(response) {
//
//                if (response == "1")
//                {
//                    $("#" + id).remove();
//                }
//                else
//                {
//                    $(".removeerror").show();
//
//                }
//            },
//            error: function() {
//                alert('error');
//            },
//        });
    }
</script>