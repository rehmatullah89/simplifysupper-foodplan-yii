<?php

class CategoryController extends Controller {

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
                'actions' => array('admin', 'delete', 'addsubcat', 'viewsubcat', 'ajaxupdate', 'deletesubcat', 'getsearchcats'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

//    public function actiongetsearchcats() {
//        $request = trim($_GET['term']);
//        if ($request != '') {
//            $model = Category::model()->findAll(array("condition" => "cat_name like '$request%'"));
//            $data = array();
//            foreach ($model as $get) {
//                $data[] = $get->cat_name;
//            }
//           // $this->layout = 'empty';
//            echo json_encode($data);
//        }
//    }

    public function actionAjaxupdate() {

        $act = $_GET['act'];
//        print_r($_POST['autoId']);exit;

        if ($act == 'doDelete') {
            foreach ($_POST['autoId'] as $value) {
                $delCat = Category::model()->findByPk($value); // assuming there is a post whose ID is 10
                $delCat->delete(); // delete the row from the database table
            }
            exit;
        }


        $act = $_GET['act'];
        if ($act == 'doSortOrder') {
            $sortOrderAll = $_POST['sortOrder'];
            if (count($sortOrderAll) > 0) {
                foreach ($sortOrderAll as $menuId => $sortOrder) {
                    $model = $this->loadModel($menuId);
                    $model->sortOrder = $sortOrder;
                    $model->save();
                }
            }
        } else {
            $autoIdAll = $_POST['autoId'];
            if (count($autoIdAll) > 0) {
                foreach ($autoIdAll as $autoId) {
                    $model = $this->loadModel($autoId);
                    if ($act == 'doDelete')
                        $model->isDeleted = '1';
                    if ($act == 'doActive')
                        $model->isActive = '1';
                    if ($act == 'doInactive')
                        $model->isActive = '0';
                    if ($model->save())
                        echo 'ok';
                    else
                        throw new Exception("Sorry", 500);
                }
            }
        }
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

    public function actionviewSubCat($id) {
        $model = new Category();
        $mainCat = Category::model()->findByAttributes(array('id' => $id));
        $cat_name = $mainCat->cat_name;
        $this->render('viewsubcat', array(
            'cat_name' => $cat_name,
            'model' => $model,
            'id' => $id
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Category;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Category'])) {

            // CVarDumper::dump($_POST, 10, TRUE);exit;

            $rnd = rand(0, 9999);  // generate random number between 0-9999
            $model->attributes = $_POST['Category'];
            $uploadedFile = CUploadedFile::getInstance($model, 'photo');
            $fileName = "{$rnd}-00-{$uploadedFile}";  // random number + file name
            $model->photo = $fileName;
            $model->created_by = Yii::app()->user->getId();

            if ($model->save()) {
                if (!empty($uploadedFile))
                    $uploadedFile->saveAs(Yii::app()->basePath . '/www/images/' . $fileName);
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionaddSubCat($id) {

        $model = new Category;
        $criteria = new CDbCriteria;
        $criteria->select = 'id , cat_type, cat_name '; // select fields which you want in output
        $criteria->condition = 'id = "' . $id . '"';
        $subcategory = Category::model()->findAll($criteria);
        // CVarDumper::dump($subcategory, 2, true); exit;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Category'])) {

            // CVarDumper::dump($_POST, 10, TRUE);exit;

            $rnd = rand(0, 9999);  // generate random number between 0-9999
            $model->attributes = $_POST['Category'];
            $uploadedFile = CUploadedFile::getInstance($model, 'photo');
            $fileName = "{$rnd}-00-{$uploadedFile}";  // random number + file name
            $model->photo = $fileName;
            $model->created_by = Yii::app()->user->getId();
            $model->parent = $id;
            if ($model->save()) {
                if (!empty($uploadedFile))
                    $uploadedFile->saveAs(Yii::app()->basePath . '/www/images/' . $fileName);
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('csubcat', array(
            'model' => $model,
            'subcategory' => $subcategory,
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

        if (isset($_POST['Category'])) {
            
            $rnd = rand(0, 9999);  // generate random number between 0-999
            $_POST['Category']['photo'] = $model->photo;
            $model->attributes = $_POST['Category'];
            //==============================
            $uploadedFile = CUploadedFile::getInstance($model, 'photo');
            if (empty($uploadedFile)) {
                if ($model->validate()) {
                    if ($model->save()) {
                        if (!empty($uploadedFile))  // check if uploaded file is set or not
                            $uploadedFile->saveAs(Yii::app()->basePath . '/www/images/' . $fileName);
                        $this->redirect(array('view', 'id' => $model->id));
                    }
                    else {
                        echo 'Model Not Validated';
                        exit;
                    }
                }
            } else {

                $fileUnlink = Category::model()->findByPk($id);
                $oldFile = $fileUnlink->photo;
                $path = Yii::app()->basePath . "\\www\\images\\" . $oldFile;
                @unlink($path);
                $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
                $model->photo = $fileName;
                if ($model->validate()) {
                    if ($model->save()) {
                        if (!empty($uploadedFile))  // check if uploaded file is set or not
                            $uploadedFile->saveAs(Yii::app()->basePath . '/www/images/' . $fileName);
                        $this->redirect(array('view', 'id' => $model->id));
                    }
                    else {
                        echo 'Model Not Validated';
                        exit;
                    }
                }
            }



            //=============================




//            $model->modified_by = Yii::app()->user->getId();
//            if ($model->save()) {
//
//                if (!empty($uploadedFile))  // check if uploaded file is set or not
//                    $uploadedFile->saveAs(Yii::app()->basePath . '/www/images/' . $uploadedFile);
//
//                $this->redirect(array('view', 'id' => $model->id));
//            }
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
    public function actiondeletesubcat($id) {
        $this->loadModel($id)->delete();
        exit;
    }

    public function actionDelete($id) {

//        $recipeCat = RecipeCategory::model()->findAll('cat_id =' . $id);
//        if (!empty($recipeCat)) {
//            foreach ($recipeCat as $value) {
//                $subCat = Category::model()->findAll('cat_id =' . $id);
//                $subCat->delete(); // delete the row from the database table           
//            }
//        }
        // $subCat = Category::model()->findAll('parent =' . $id);


        $subCat = Category::model()->findByAttributes(array('parent' => $id));
        foreach ($subCat as $value) {
            $subCat->delete($value);
        }

        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $model = new Category('searchmainCategories');
        $model->unsetAttributes();  // clear any default values
        //$dataProvider=new CActiveDataProvider('Category');
        $this->render('index', array(
            'model' => $model,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Category('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Category']))
            $model->attributes = $_GET['Category'];

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
        $model = Category::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'category-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
