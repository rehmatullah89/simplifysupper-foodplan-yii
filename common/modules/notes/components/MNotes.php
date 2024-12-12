<?php

/*
 * @author fahad.akram
 * project :  nxBabylon
 * create this module to all notes for all users
 */

class MNotes extends CApplicationComponent {
    /*
     * create funciton to Save Notes and call this from any controller 
     * like -> Notes::saveNotes('1','Leads);
     */

    public static function updateTodos() {
        // get model name - > $model_name = get_class($modelName);

        $model = new Todo();
        if (isset($_POST['Todos'])) {
            $model->attributes = $_POST['Todos'];
            $model->save();
            if (isset($_POST['returnUrl'])) {
                Yii::app()->user->setFlash('success', "Data1 saved!");
                $this->redirect(array('/' . $_POST['returnUrl']));
            } else {
                
            }
        }
    }

    public static function saveNotes() {

        // get model name - > $model_name = get_class($modelName);
        $model = new Note();
        if (isset($_POST['Note'])) {
            $model->attributes = $_POST['Note'];
            $model->save();
            Yii::app()->end();
//            if (isset($_POST['returnUrl'])) {
//                Yii::app()->user->setFlash('success', "Data1 saved!");
//                $this->redirect(array('/' . $_POST['returnUrl']));
//            } else {
//                
//            }
        }
    }

    /*
     * create funciton to view Notes regarding Parent id and type
     */

    public function viewNotes($parentId, $modelName) {

        $notes = Note::model()->findAll(array(
            'order' => 'id desc',
            'condition' => 'parent_type=:modelName AND parent_id=:parent_id',
            'params' => array(':modelName' => $modelName, ':parent_id' => $parentId),
                )
        );
        return $notes;
        foreach ($notes as $notes) {
//            echo $notes->id . "<br  />";
//            echo $notes->description . "<br> <br>";
//            echo $notes->parent_id . "<br>";
//            echo $notes->parent_type . "<br>";
        }
        //  $this->redirect(Yii::app()->request->urlReferrer);
    }

    /*
     * create funciton update Notes
     * Regarding its id , parent id and type
     */

    public function updateNotess($notesId, $parentId, $parentType) {
        // get model name - > $model_name = get_class($modelName);
        $Notes = new Note;
        $Notes->id = $notesId;
        $Notes->note_type = 'CheckNoteType';
        $Notes->description = 'DescriptionforNotes';
        $Notes->parent_id = 1;
        $Notes->parent_type = $parentType;
        if ($Notes->validate()) {
            if ($Notes->save()) {
                echo "Success";
                $this->redirect(Yii::app()->request->urlReferrer);
                exit;
            } else {
                echo 'Fail to Update a record';
                $this->redirect(Yii::app()->request->urlReferrer);
                exit;
            }
            $this->lastViset();
            $this->redirect(Yii::app()->request->urlReferrer);
        }

        $this->redirect(Yii::app()->request->urlReferrer);
    }

    /*
     * @author fahad.akram
     * create funciton delete Notes reagarding notes id
     */

    public function deleteNotes($id) {
        $Notes = Note::model()->findByPk($id); // assuming there is a post whose ID is 10
        $Notes->delete(); // delete the row from the database table
        $this->redirect(Yii::app()->request->urlReferrer);
    }

}

?>
