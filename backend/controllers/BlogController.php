<?php

/*
 *  @author   :  Muhammad Fahad Akram
 *  @Project  :  simpllfysupper
 *  Dated     :  2nd May 2014
 *  Controller:  Blog Controller 
 */

class BlogController extends Controller {

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
                'actions' => array('index', 'view', 'ajaxupdate'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'admin', 'delete'),
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
     * Save Model Field with relational attributes like
     * categories and subcategories but they are not mandatory
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Blog;
        $criteria = new CDbCriteria();
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['Blog'])) {
            //start code to save blog first and after saving blog
            //save categories and subcategories
            //becuase they are using model->id as blog_id
            $model->attributes = $_POST['Blog'];
            $model->created_at = new CDbExpression('NOW()');
            $model->created_by = Yii::app()->user->id;
            if ($model->save()) {
                //after saving blog now save cats and subcats
                if (isset($_POST['cat_names'])) {
                    $mainCats = $_POST['cat_names'];
                    foreach ($mainCats as $value) {
                        $criteria->select = 'id , cat_name'; // select fields which you want in output
                        $criteria->condition = 'cat_name = "' . $value . '"';
                        $categories = Category::model()->findAll($criteria);
//                    CVarDumper::dump($categories[0]->id, 10, true);exit;
                        if (!empty($categories)) {
                            $model_BlogCategory = new BlogCategory();
                            $model_BlogCategory->blog_id = $model->id;
                            $model_BlogCategory->cat_id = $categories[0]->id;
                            $model_BlogCategory->save();
                        }
                    }
                    //end of loop saving categories 
                    //here we save subcategoreis if any bcz they are not mandatory
                    if (isset($_POST['subcategories']) && ($_POST['subcategories'] != '' )) {
                        foreach ($_POST['subcategories'] as $values) {
                            $criteria->condition = 'parent!=0';
                            $criteria->condition = 'cat_name=:cat_name';
                            $criteria->params = array(':cat_name' => $values);
                            $category_info = Category::model()->find($criteria);
                            $recipe_categories = new BlogCategory();
                            $recipe_categories->blog_id = $model->id;
                            $recipe_categories->cat_id = $category_info->id;
                            $recipe_categories->save();
                        }
                    }
                    //end of subcatogries code
                }
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

        if (isset($_POST['Blog'])) {
            $model->attributes = $_POST['Blog'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }
//        $obj = BlogCategory::model()->with(array(
//                    'cat' => array('condition' => 'blog_id=:param',
//                        'params' => array(':param' => $id))
//                ))->findAll();



        $this->render('update', array(
            'model' => $model,
            'subcats' => $subcats,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        //delete blog categories related to that blog on blog deletion
        foreach ($this->loadModel($id)->blogCategories as $c)
            $c->delete();
        //delete blog media on deletion of blog blogMedias
        foreach ($this->loadModel($id)->blogMedias as $c)
            $c->delete();
        $this->loadModel($id)->delete();
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Blog');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     * Filter to show InActive on first call
     * and filter grid on change according to status id
     */
    public function actionAdmin() {
        $model = new Blog('search');
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
        //
        if (isset($_GET['Blog']))
            $model->attributes = $_GET['Blog'];

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
        $model = new Blog();
        $act = $_GET['act'];

        if ($act == 'doDelete') {
            //delete blog category and blog media relations before blog deletion
            foreach ($_POST['autoId'] as $id) {
                foreach ($this->loadModel($id)->blogCategories as $c)
                    $c->delete();
                foreach ($this->loadModel($id)->blogMedias as $c)
                    $c->delete();
                $this->loadModel($id)->delete();
            }
            exit;
        }
        //testimonialAccept
        if ($act == 'Active') {
            foreach ($_POST['autoId'] as $value) {
                $model = Blog::model()->findByPk($value);
                $model->status = 'Active';
                $model->save();
            }
            exit;
        }
        //testimonialAccept
        if ($act == 'InActive') {
            foreach ($_POST['autoId'] as $value) {
                $model = Blog::model()->findByPk($value);
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
        $model = Blog::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'blog-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
