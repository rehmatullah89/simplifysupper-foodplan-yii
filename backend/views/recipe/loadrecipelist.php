
<div class="showrecipes">
    <ul>
        <li><b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b></li>
        &nbsp;&nbsp;&nbsp;&nbsp;     <?php echo CHtml::encode($data->title); ?>
        <br />
        <li><b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b></li>
        &nbsp;&nbsp;&nbsp;&nbsp;  <?php echo CHtml::encode($data->description); ?>
        <br />
    </ul>
</div>


