<?php

class BannerController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'admin', 'delete', 'ajaxupdate'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array(),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Banner;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Banner'])) {
            //check file posted
            $rnd = rand(0, 9999);  // generate random number between 0-9999
            $uploadedFile = CUploadedFile::getInstance($model, 'image');
            $fileName = "{$rnd}-00-{$uploadedFile}";  // random number + file name




            $model->attributes = $_POST['Banner'];
            $model->image = $fileName;
            $model->created_at = new CDbExpression("NOW()");
            $model->created_by = Yii::app()->user->id;


            if ($model->validate()) {
                if (!empty($uploadedFile))
                    $uploadedFile->saveAs(Yii::app()->basePath . '/www/images/' . $fileName);

                if ($model->save())
                    $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Banner'])) {
            $model->attributes = $_POST['Banner'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Banner');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Banner('search');
        $model->unsetAttributes();  // clear any default values

        $model->status = 'New';

        if (isset($_GET['staticid'])) {
            $getStatus = $_GET['staticid'];
            if ($getStatus == 0)
                $status = 'New';
            if ($getStatus == 1)
                $status = 'Active';
            if ($getStatus == 2)
                $status = 'Expired';
            $model->status = $status;
        }

        if (isset($_GET['Banner']))
            $model->attributes = $_GET['Banner'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /*
     * Action to handle buttons with checkboxes
     * For Delete all , Activate and DeActivate button
     * We pas act as Get Variable and autoId of checkbox as post
     */

    public function actionajaxupdate() {
        $model = new Banner();
        $act = $_GET['act'];

        if ($act == 'doDelete') {
            //delete blog category and blog media relations before blog deletion
            foreach ($_POST['autoId'] as $id) {

                $delImage = Banner::model()->findbyPk($id);
                $path = Yii::app()->basePath . "\\www\\images\\" . $delImage->image;
                unlink($path);

                $this->loadModel($id)->delete();
            }
            exit;
        }
        //testimonialAccept
        if ($act == 'Active') {
            foreach ($_POST['autoId'] as $value) {
                $model = Banner::model()->findByPk($value);
                $model->status = 'Active';
                $model->save();
            }
            exit;
        }
        //testimonialAccept
        if ($act == 'Expired') {
            foreach ($_POST['autoId'] as $value) {
                $model = Banner::model()->findByPk($value);
                $model->status = 'Expired';
                $model->save();
            }
            exit;
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Banner::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'banner-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
