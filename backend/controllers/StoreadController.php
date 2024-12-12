<?php

class StoreadController extends Controller {
    

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
                'actions' => array('admin','create', 'update', 'admin', 'delete', 'ajaxupdate'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array(),
                'users' => array(),
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
        $model = new StoreAd;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['StoreAd'])) {
            //check file posted
            $rnd = rand(0, 9999);  // generate random number between 0-9999
            $uploadedFile = CUploadedFile::getInstance($model, 'store_logo');
            $fileName = "{$rnd}-00-{$uploadedFile}";  // random number + file name
            $model->attributes = $_POST['StoreAd'];
            $model->store_logo = $fileName;
            $model->created_at = new CDbExpression("NOW()");
            $model->created_by = Yii::app()->user->id;
            if ($model->validate()) {
                if (!empty($uploadedFile))
                    $uploadedFile->saveAs(Yii::app()->basePath . '/www/images/' . $fileName);
                if ($model->save()) {
                    if (isset($_POST['cat_names'])) {
                        foreach ($_POST['cat_names'] as $c_name) {
                            $criteria = new CDbCriteria();
                            $criteria->select = 'id , cat_name'; // select fields which you want in output
                            $criteria->condition = 'cat_name = "' . $c_name . '"';
                            $category = Category::model()->findAll($criteria);
                            if (!empty($category)) {
                                $storeAdCat = new StoreadCategory();
                                $storeAdCat->storad_id = $model->id;
                                $storeAdCat->cat_id = $category[0]->id;
                                $storeAdCat->save();
                            }
                        }
                    }
                    $this->redirect(array('view', 'id' => $model->id));
                }
            }
        }
        $this->render('create', array(
            'model' => $model,
            'chkrequest' => 'create',
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

        if (isset($_POST['StoreAd'])) {
            $model->attributes = $_POST['StoreAd'];

            if ($model->validate()) {

                $rnd = rand(0, 9999);  // generate random number between 0-9999
                $uploadedFile = CUploadedFile::getInstance($model, 'store_logo');
                if (!empty($uploadedFile)) {
                    $fileName = "{$rnd}-00-{$uploadedFile}";  // random number + file name
                    $model->store_logo = $fileName;
                }
                
                $model->modified_at = new CDbExpression("NOW()");
                $model->modified_by = Yii::app()->user->id;
                $model->update();
                
                StoreadCategory::model()->deleteAll("storad_id ='" . $id . "'");
               
                if (isset($_POST['cat_names'])) {
                    $categories = explode(",", $_POST['cat_names']);
                   
                    foreach ($categories as $cat) {
                        $category = Category::model()->findByAttributes(array('cat_name' => $cat));
                        $storadCategory = new StoreadCategory();
                        $storadCategory->cat_id = $category->id;
                        $storadCategory->storad_id = $id;
                        $storadCategory->save();
                    }
                    $this->redirect(array('view', 'id' => $model->id));
                }
                
            }
        }

        $this->render('update', array(
            'model' => $model,
            'chkrequest' => 'update',
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {

        foreach ($this->loadModel($id)->storeadCategories as $c)
            $c->delete();

        $delImage = StoreAd::model()->findbyPk($id);
        $path = Yii::app()->basePath . "\\www\\images\\" . $delImage->store_logo;
        unlink($path);

        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
//        echo 'control in index of store ad'; exit;
        $dataProvider = new CActiveDataProvider('StoreAd');
        
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new StoreAd('search');
        $model->unsetAttributes();  // clear any default values

        $model->status = 'InActive';
        if (isset($_GET['staticid'])) {
            $getStatus = $_GET['staticid'];
            if ($getStatus == 0)
                $status = 'InActive';
            if ($getStatus == 1)
                $status = 'Active';
            $model->status = $status;
        }


        if (isset($_GET['StoreAd']))
            $model->attributes = $_GET['StoreAd'];

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
        $model = new StoreAd();
        $act = $_GET['act'];

        if ($act == 'doDelete') {
            //delete blog category and blog media relations before blog deletion
            foreach ($_POST['autoId'] as $id) {
                $delImage = StoreAd::model()->findbyPk($id);
                $path = Yii::app()->basePath . "\\www\\images\\" . $delImage->store_logo;
                @unlink($path);

                foreach ($this->loadModel($id)->storeadCategories as $c)
                    $c->delete();
                $this->loadModel($id)->delete();
            }
            exit;
        }
        //testimonialAccept
        if ($act == 'Active') {
            foreach ($_POST['autoId'] as $value) {
                $model = StoreAd::model()->findByPk($value);
                $model->status = 'Active';
                $model->save();
            }
            exit;
        }
        //testimonialAccept
        if ($act == 'InActive') {
            foreach ($_POST['autoId'] as $value) {
                $model = StoreAd::model()->findByPk($value);
                $model->status = 'InActive';
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
        $model = StoreAd::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'store-ad-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
