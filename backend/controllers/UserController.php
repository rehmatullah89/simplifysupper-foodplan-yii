<?php

class UserController extends Controller {

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
                //'actions'=>array('create','update','admin'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
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
        $model = new Userbackend();

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);


        if (isset($_POST['Userbackend'])) {
            $rnd = rand(0, 9999);  // generate random number between 0-9999
            $model->attributes = $_POST['Userbackend'];
            $uploadedFile = CUploadedFile::getInstance($model, 'photo');
            $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
            $model->photo = $fileName;

            // $model->password = md5($model->password);
            $model->password = md5($_POST['Userbackend']['password']);
            $model->status = 'Active';
            if ($model->save()) {
                if (!empty($uploadedFile))
                    $uploadedFile->saveAs(Yii::app()->basePath . '/www/images/' . $fileName);
                $this->redirect(array('view', 'id' => $model->memberid));
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
     * Change Made by @FahadAkram to resolve file updating , unlink issues
     * on 10 July 2014
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);
        if (isset($_POST['Userbackend'])) {
            $rnd = rand(0, 9999);  // generate random number between 0-9999
            $_POST['Userbackend']['photo'] = $model->photo;
            $model->attributes = $_POST['Userbackend'];
            $uploadedFile = CUploadedFile::getInstance($model, 'photo');
            if (empty($uploadedFile)) {
                if ($model->validate()) {
                    if ($model->save()) {
                        if (!empty($uploadedFile))  // check if uploaded file is set or not
                            $uploadedFile->saveAs(Yii::app()->basePath . '/www/images/' . $fileName);
                        $this->redirect(array('view', 'id' => $model->memberid));
                    }
                    else {
                        echo 'Model Not Validated';
                        exit;
                    }
                }
            } else {

                $fileUnlink = Userbackend::model()->findByPk($id);
                $oldFile = $fileUnlink->photo;
                $path = Yii::app()->basePath . "\\www\\images\\" . $oldFile;
                @unlink($path);
                $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
                $model->photo = $fileName;
                if ($model->validate()) {
                    if ($model->save()) {
                        if (!empty($uploadedFile))  // check if uploaded file is set or not
                            $uploadedFile->saveAs(Yii::app()->basePath . '/www/images/' . $fileName);
                        $this->redirect(array('view', 'id' => $model->memberid));
                    }
                    else {
                        echo 'Model Not Validated';
                        exit;
                    }
                }
            }
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
        $dataProvider = new CActiveDataProvider('Userbackend');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Userbackend('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Userbackend']))
            $model->attributes = $_GET['Userbackend'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Userbackend::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
