<!--
In this section we have add note button to show form for addition of notes ,
remove note button to hide form
plus icon to save the saved notes
minus icon to hide the saved notes
iocns to show the s
-->
<div class="row-fluid">
    <div class="span12">
        <div class="row-fluid">
            <div class="span6">
                <!--add plus minus icon with notes here  -->
                <div class="row-fluid">
                    <div class="span1">
                    </div>
                    <div class="span5">
                        <div id="plusicon"><li class="icon-plus"></li> <?php echo "Show Notes"; ?></div>
                        <div id="minusicon"><li class="icon-minus"></li> <?php echo "Hide Notes"; ?></div>
                    </div>
                </div>
            </div>
            <div class="span6">
                <!--add notes button icon with notes here -->
                <div class="row-fluid">
                    <div class="span2">

                    </div>
                    <div class="span4">
                        <?php
                        /*
                         * ADD NOTE BUTTON AND REMOVE NOTE BUTTON
                         * ADD NOTE BUTTON IS SHOWN BY DEFAULT
                         * REMOVE BUTTON IS HIDDEN UNTIL ADD NOTE BUTTON IS PRESSED
                         */
                        $this->widget('bootstrap.widgets.TbButton', array(
                            'label' => 'Add Note',
                            'size' => 'mini',
                            'htmlOptions' => array(
                                'id' => 'add-note-link'
                            ),
                        ));
                        $this->widget('bootstrap.widgets.TbButton', array(
                            'label' => 'Remove Note',
                            'size' => 'mini',
                            'htmlOptions' => array(
                                'id' => 'remove-note-link'
                            ),
                        ));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--
         Add new form to add notes.
    -->
    <div class="span12">
        <div class="row-fluid">
            <div class="span1"></div>
            <div class="span10">

                <?php
                $model = new Note();
                $notes_type = array('Feedback' => 'Feedback', 'comment' => 'Comment', 'question' => 'Questions');
                $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                    'id' => 'note-form-add',
                    'type' => 'horizontal',
                    //   'action' => Yii::app()->params['commonBaseUrl'].('www/notes/notes/saveNotes'),
                    'action' => Yii::app()->controller->createUrl('/notes/notes/saveNotes'),
                      // 'action' =>'/notes/notes/saveNotes',
                    'enableAjaxValidation' => false,
                    'htmlOptions' => array('enctype' => 'multipart/form-data', 'method' => 'POST',)
                        ));
                echo $form->hiddenField($model, 'parent_id', array('value' => $this->noteTypes));
                echo $form->hiddenField($model, 'parent_type', array('value' => $this->parent_id));
                echo $form->dropdownListRow($model, 'note_type', $notes_type, array('class' => 'span5'));
                echo $form->textAreaRow($model, 'description', array('class' => 'span8', 'rows' => 6));
                ?>
                <div class="form-actions">
                    <button class="btn btn-primary" id="btn-notes" onclick="" type="submit" name="yt0">Submit</button> or
                    <a class="color-blue" id="cancel-note-link" href="javascript:void(0);">Cancel</a>
                </div>
                <?php
                $this->endWidget();
                ?>
            </div>
            <div class="span1"></div>
        </div>
    </div>
    <!--
        show saved notes here
    -->
    <div class="span12">
        <div class="row-fluid">
            <div class="span2"></div>
            <div class="span8 showhidesavenotes">
                <?php
                $this->_notes = Note::model()->findnotes($this->parent_id, $this->noteTypes);
                $dataProvider = new CArrayDataProvider($this->_notes);
                $this->widget('bootstrap.widgets.TbListView', array(
                    'dataProvider' => $dataProvider,
                    'id' => 'show-save-notes-list',
                    'emptyText' => 'No notes has been added yet.',
                    'itemView' => 'common.modules.notes.components.widgets.views._viewNotes', // refers to the partial view named '_post'
                ));
                ?>
            </div>
            <div class="span2"></div>

        </div>
    </div>
    <script>
        
        function addnotes(){
            var form = $('#note-form-add');
            alert(form);
            $.ajax({
                url : form.attr('action'),
             
                data: form.serialize(),
                type: 'post',
                success: function(response){
                    form.hide();
                    fn.yiiListView.show('show-save-notes-list');
                    fn.yiiListView.update('show-save-notes-list');
                   
                }
            })
        }
        $(document).ready(function(){
            $('a#add-note-link').css('visibility','visible');
            $('a#add-note-link').css('display','inline');
            $('a#remove-note-link').css('visibility','hidden');
            $('a#remove-note-link').css('display','none');
            $('#note-form-add').css('display','none');      
            $('#minusicon').css('display','none');      
            $('.showhidesavenotes').css('display','none');

        });
    
        $('#plusicon').click(function(event){
            event.preventDefault();
            $('#plusicon').css('visibility','hidden');
            $('#plusicon').css('display','none');
            $('#minusicon').css('visibility','visible');
            $('#minusicon').css('display','inline');
            $('.showhidesavenotes').css('display','inline');
        });
    
        $('#minusicon').click(function(event){
            event.preventDefault();
            $('#minusicon').css('visibility','hidden');
            $('#minusicon').css('display','none');
            $('#plusicon').css('visibility','visible');
            $('#plusicon').css('display','inline');
            $('.showhidesavenotes').css('display','none');
        });
        
        $('a#add-note-link').click(function(event){
            event.preventDefault();
            $('a#add-note-link').css('visibility','hidden');
            $('a#add-note-link').css('display','none');
            $('a#remove-note-link').css('visibility','visible');
            $('a#remove-note-link').css('display','inline');
            $('#formaddnote').css('display','none');
            $('#note-form-add').css('display','inline');
            $('#note-form-add').show('slow');
        });
    
        $('a#remove-note-link').click(function(event){
            event.preventDefault();
            $('a#remove-note-link').css('visibility','hidden');
            $('a#remove-note-link').css('display','none');
            $('a#add-note-link').css('visibility','visible');
            $('a#add-note-link').css('display','inline');
            $('#note-form-add').css('display','none');
        });
    
  
    </script>
    <style>
        #note-form-add {
            margin-top: 25px;
        }
        .showmynotes {
            border-bottom: 1px dotted;
        }
        .showmynotes ul{
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        .showmynotes :hover{
            background: #F5F5F5;
            text-decoration: none;

        }
        .showhidesavenotes{
            /*            border: sandybrown solid;*/
        }
    </style>
