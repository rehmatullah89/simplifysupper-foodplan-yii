
<ul>
    <?php foreach($categories as $category){?>
    <li id="<?php echo $category['id'];?>"><?php echo $category['name'];?></li>
    <?php } ?>
</ul>


<script>

$(document).ready(function(){
    
    $("li").click(function(){
        
        var category_text=$(this).text();
        var field_existing_content=$("#categories").val();
        var field_new_content=field_existing_content+","+category_text;
        $("#categories").val(field_new_content);
       $(this).remove();
        
    });
    
});
    
</script>

<style>
    
    li{
        cursor:pointer;
    }
    
</style>