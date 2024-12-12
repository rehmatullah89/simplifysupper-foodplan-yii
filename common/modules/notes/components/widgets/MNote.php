<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class MNote extends CWidget {

    public $parent;
    public $parent_id;
    public $_notes;
    public $htmlEditor = false;
    public $renderNotesList = true; // doesnt render html.
    public $container = true;
    public $formHide = false;
    public $notesListHide = true; // display:none
    public $noteTypes = array('Feedback' => 'Feedback', 'Comment' => 'Comment', 'Question' => 'Questions');

    public function run() {
        $this->render('common.modules.notes.components.widgets.views.mnote');
    }
}

?>
