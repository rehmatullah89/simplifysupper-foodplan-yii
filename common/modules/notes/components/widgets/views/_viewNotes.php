
<div class="showmynotes">
    <ul>
        <li><b><?php echo CHtml::encode($data->getAttributeLabel('note_type')); ?>:</b></li>
        &nbsp;&nbsp;&nbsp;&nbsp;     <?php echo CHtml::encode($data->note_type); ?>
        <br />
        <li><b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b></li>
        &nbsp;&nbsp;&nbsp;&nbsp;  <?php echo CHtml::encode($data->description); ?>
        <br />
    </ul>
</div>