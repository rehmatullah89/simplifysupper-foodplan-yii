<div class="row-fluid" id="underline">
    <div class="span1"></div>
    <div class="span5   pull-left">
        <li class="icon-plus" id="show-notes"></li> <?php echo "Notes"; ?>
    </div>
    <div class="span4  pull-right"> <a id="add-note-link" class="btn btn-mini">Add Note</a></div>
    <div class="span2"></div>
</div>
<div class="row-fluid">
    <!------FORM----------->
    <div class="span1"></div>
    <div class="span10">
        <!------------form------------------->
        <div id="note-form" style="<?php  echo $this->formHide ? 'display:none;' : '' ?>">
            <?php
           
            $model = new Notes();
            $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                'id' => 'notes-form',
                'type' => 'horizontal',
                'action' => BabylonNotes::saveNotes(),
                'enableAjaxValidation' => false,
                'htmlOptions' => array('enctype' => 'multipart/form-data', 'method' => 'POST',)
                    ));
            echo $form->hiddenField($model, 'parent_type', array('value' => $this->parent->getType()));
            echo $form->hiddenField($model, 'parent_id', array('value' => $this->parent_id));
            echo $form->dropdownListRow($model, 'note_type', $this->noteTypes, array('class' => 'span5'));

            if ($this->htmlEditor) {

                echo $form->html5EditorRow($model, 'description', array('class' => 'span4', 'rows' => 5, 'height' => '200', 'options' => array('color' => true)));
            } else {
                echo $form->textAreaRow($model, 'description', array('class' => 'span8', 'rows' => 6));
            }
            ?>
            <div class="form-actions">
                <button class="btn btn-primary btnaddnote" id="btn-notes" type="submit" name="yt0">Submit</button> or <a class="color-blue" id="cancel-note-link" href="javascript:void(0);">Cancel</a></div>
            <?php
            $this->endWidget();
            ?>
        </div>
    </div>
    <div class="span1"></div>
</div>
<div class="row-fluid">
    <div class="span1"></div>
    <div class="span8">
        <div id="notes-show" style="display: none;">
            <?php
            
            $this->_notes = Notes::model()->findAllByAttributes(array('parent_type' => $this->parent->getType(), 'parent_id' => $this->parent_id));
            $dataProvider = new CArrayDataProvider($this->_notes);
            ?>
            <ul class="recent-comments">
                <?php
                
                $this->widget('bootstrap.widgets.TbListView', array(
                    'dataProvider' => $dataProvider,
                    'emptyText' => 'No notes has been added yet.',
                    'itemView' => '_viewNotes', // refers to the partial view named '_post'
                ));
                ?>
            </ul>
        </div>
    </div>
    <div class="span2"></div>
</div>

<?php  ?>

<script>
    $(function(){
        
        $('#add-note-link').click(function(event){
            event.preventDefault();
            $(this).parent().parent().next().find('#note-form').slideToggle('slow');          
        });       
        
        $('#cancel-note-link').click(function(event){
            event.preventDefault();           
            $('#note-form').hide('slow');
        
        });  
        
        $('.icon-plus').live('click',function(){
            $(this).removeClass('icon-plus').addClass('icon-minus');
            $('#notes-show').slideDown();
        });
        
        $('.icon-minus').live('click',function(){
            $(this).removeClass('icon-minus').addClass('icon-plus');
            $('#notes-show').slideUp();            
        })
 
    });
</script>