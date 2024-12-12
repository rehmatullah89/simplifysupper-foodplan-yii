<?php

class NotesController extends Controller {

    public function actionIndex() {

        $this->render('index');
    }
    public function filterRights($filterChain) {
        $filter = new RightsFilter;
        $filter->allowedActions = $this->allowedActions();
        $filter->filter($filterChain);
    }
     public function actionsaveNotes() {

        // get model name - > $model_name = get_class($modelName);
        $model = new Note();
        if (isset($_POST['Note'])) {
            $model->attributes = $_POST['Note'];
          
            $model->save();
          $this->redirect(Yii::app()->request->urlReferrer);
            Yii::app()->end();
//            if (isset($_POST['returnUrl'])) {
//                Yii::app()->user->setFlash('success', "Data1 saved!");
//                $this->redirect(array('/' . $_POST['returnUrl']));
//            } else {
//                
//            }
        }
    }

}