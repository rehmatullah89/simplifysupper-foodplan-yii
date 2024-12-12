<h4>comment view wisdget</h4>
<div class="row-fluid">
    <div class="span4"></div>
    <div class="span4">
        <?php
        $model = new Comment;
        $form = $this->beginWidget(
                'bootstrap.widgets.TbActiveForm', array(
            'id' => 'verticalForm',
            'htmlOptions' => array('class' => 'well'), // for inset effect
                )
        );

        echo $form->textFieldRow($model, 'title', array('class' => 'span3'));
        echo $form->textFieldRow($model, 'description', array('class' => 'span3'));
        $this->widget(
                'bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'label' => 'Add Comment')
        );

        $this->endWidget();
        unset($form);
        ?>
    </div>
    <div class="span4"></div>
</div>
