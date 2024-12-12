
<form name="recipe-search" method="post" id="recipe-search">
    <input type="name" placeholder="Enter Recipe Name" id="q"/>
    <input type="submit" value="Search" class="btn"/>
</form>

<div id="search-results" style="height: 200px; overflow-y: scroll; overflow-x: hidden; margin-top: 15px;">

</div>

<p class="alert alert-danger removeerror" style="display:none">Unable to remove the recipe this time. Please try again later.</p>
<?php
if (!empty($meals))
    echo '<p id="already-msg">Already Selected Recipes</p>';
foreach ($meals as $values)
{
    ?>

    <div id="<?php echo $values['id']; ?>" class="selectedrecipes">
        <span class='glyphicon glyphicon-remove-circle' style='cursor:pointer;' onClick="deleteSelected(<?php echo $values['id']; ?>)"></span>
        <a href='<?php echo Yii::app()->request->baseUrl; ?>/site/test'><?php echo $values->recipe->title; ?></a><br/>
    </div>

<?php } ?>

<div id="setusingmodal">

</div>



<script>
    $('#set_recipe').on('hidden.bs.modal', function() {
        location.reload();
    })


    function deleteSelected(id)
    {

        var date = $("#modal-get-date").text();
        var recipe_name = $("#" + id).text();


//        $(".set-recipy").each(function() {
//
//            if ($(this).attr("date") == date)
//            {
//
//               
//                var rec=$(this).prev().find(".usermeal").html();
//                if(rec.trim()==recipe_name.trim())
//                {
//                   $(this).prev().find("span").remove();
//                }
//               
//            }
//
//        });
//
//
//        return false;

        $.ajax({
            url: "<?php echo Yii::app()->request->baseUrl . '/site/deleteselected/' ?>",
            type: "post",
            async: false,
            data: "id=" + id,
            success: function(response) {
                if (response == "1")
                {
                    $("#" + id).remove();

                    var selected_recipes = $(".selectedrecipes").html();

                    if (selected_recipes == null)
                    {
                        $("#already-msg").remove();
                    }

                }
                else
                {
                    $(".removeerror").show();
                }
            },
            error: function() {
                alert('error');
            },
        });
    }
    $("#recipe-search").submit(function() {
        var query = $("#q").val();
        if (query == "")
        {
            alert("Please enter a search term to proceed");
        }
        else
        {
            $.ajax({
                url: "<?php echo Yii::app()->request->baseUrl . '/site/searchresults/' ?>",
                type: "post",
                async: false,
                data: "q=" + query,
                success: function(response) {

                    $("#search-results").html(response);
                },
                error: function() {
                    alert('error');
                },
            });
        }
        return false;
    });
</script>
<style>
    .btn{
        -moz-user-select: none;
        background-color: #16A085;
        background-image: none;
        border: 1px solid rgba(0, 0, 0, 0);
        border-radius: 0;
        color: #FFFFFF;
        cursor: pointer;
        display: inline-block;
        font-size: 14px;
        font-weight: normal;
        line-height: 1.42857;
        margin-bottom: 0;
        padding: 3px 12px;
        text-align: center;
        vertical-align: middle;
        white-space: nowrap;
    }
    .btn :hover {
        -moz-user-select: none;
        background-color: #16A085;
        background-image: none;
        border: 1px solid rgba(0, 0, 0, 0);
        border-radius: 0;
        color: #FFFFFF;
        cursor: pointer;
        display: inline-block;
        font-size: 14px;
        font-weight: normal;
        line-height: 1.42857;
        margin-bottom: 0;
        padding: 3px 12px;
        text-align: center;
        vertical-align: middle;
        white-space: nowrap;
    }
    #recipe-search > input{
        height: 25px;
    }
</style>