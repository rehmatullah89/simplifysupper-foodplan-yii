<div class="setmessage">
    <p class="alert alert-success"><?php echo $msg ; ?></p>
</div>
<p id="site_url" style="display:none;"><?php echo Yii::app()->request->getBaseUrl(true) . '/dashboard/'; ?></p>
<script>

    $(document).ready(function() {
        var site_url = $("#site_url").text();
        setTimeout(function() {
            // Do something after 5 seconds
            window.location = site_url;
        }, 5000);
    });
</script>
<style>
    .setmessage {
        height: 300px;
        padding-top: 100px;
        text-align: center;
    }
    .alert-success {
        margin-left: 425px;
        width: 43%;
    }
</style>