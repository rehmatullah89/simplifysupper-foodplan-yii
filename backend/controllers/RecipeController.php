<?php

class RecipeController extends Controller {

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
                'actions' => array('create', 'update', 'admin', 'delete', 'filterdropdown', 'ajaxupdate', 'calendar', 'recipeofdayadmin', 'getsubcats', 'getrecipesbycat', 'setrecipeoftheday', 'getmodalrecipes', 'getsearchrecipes', 'getrecipesofday', 'getsubcategories', 'deleterecipeoftheday'),
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

    public function actiongetmodalrecipes() {

        print_r($_POST);
        exit;
    }

    public function actiondeleterecipeoftheday() {
        $recipe_id = $_POST['recipe_id'];
        $recipe_date = $_POST['recipe_date'];

        //RecipesOfDay::model()->deleteAll('rod_day=' . $recipe_date . ' AND recipeid=' . $recipe_id);

        RecipesOfDay::model()->deleteAll(
                array(
                    'condition' => 'rod_day=' . $recipe_date,
                    'condition' => 'recipeid=' . $recipe_id
                )
        );
    }

    public function actionsetrecipeoftheday() {

        $recipe_date = $_POST['recipe_date'];
        $recipes = $_POST['recipe_selections'];
        $recipe_selections = explode(":", $recipes);
        for ($i = 0; $i < count($recipe_selections) - 1; $i+=2) {

            $model = new RecipesOfDay();
            $model->rod_day = $recipe_date;
            $model->recipeid = $recipe_selections[$i];
            $model->servingsize = $recipe_selections[$i + 1];
            $model->save();
        }
    }

    public function actiongetsubcategories() {
        $category = $_POST['categories'];

        $category_info = Category::model()->findbyAttributes(array('cat_name' => $category));
        $category_id = $category_info->id;

        $sub_categories = Category::model()->findAllbyAttributes(array('parent' => $category_id));


        $subcats = array();

        foreach ($sub_categories as $values) {
            array_push($subcats, $values['cat_name']);
        }

        echo json_encode($subcats);
    }

    public function actiongetrecipesofday() {

        $recipe_date = $_POST['date_recipes'];
        $recipes = RecipesOfDay::model()->findAllbyAttributes(array('rod_day' => $recipe_date));

        foreach ($recipes as $values) {
            $recipe_title = Recipe::model()->findByPk($values['recipeid']);
            echo "<li id='delete'" . $values['recipeid'] . " onClick=removeRecipe(" . $values['recipeid'] . ")><a href=" . Yii::app()->request->baseUrl . "/recipe/" . $values['recipeid'] . ">" . $recipe_title->title . "</a></li><br/>";
        }
    }

    public function actiongetsearchrecipes() {
        $request = trim($_GET['term']);
        if ($request != '') {
            // $model = Recipe::model()->findAll(array("condition" => "title like '$request%'"));

            $model = Recipe::model()->findAll(array("condition" => "title like '$request%' and status = 'Approved'"));

            $data = array();
            foreach ($model as $get) {
                $data[] = $get->title;
            }
            // $this->layout = 'empty';
            echo json_encode($data);
        }
    }

    public function actiongetrecipesbycat() {


        $selected_recipies = $_POST['selected_recipes'];


        $recipe_title = $_POST['recipe_title'];
        $recipies = Recipe::model()->findAll(array("condition" => "title like '$recipe_title%' and status = 'Approved'"));
//        $getID = $rec_info->id;
//        $recipies = RecipeCategory::model()->findAll("cat_id=" . $getID);
        $this->renderPartial('ajaxloadpage', array('recipies' => $recipies, 'selected_recipes' => $selected_recipies));
//        foreach ($recipies as $vals) {
//            $recipe_data = Recipe::model()->findByPk($vals['recipe_id']);
//            echo $recipe_data->title  ;
//           // echo CHtml::image(Yii::app()->baseUrl . "/images/" . $data->photo);
//        }
        // CVarDumper::dump($recipies,10,true);
    }

    public function actioncalendar() {

        $this->render('calendar');
    }

    public function actiongetsubcats() {
        $rs = Recipe::model()->findallbyAttributes(array('id' => $_POST['title']));
        print_r($rs);
        exit;
    }

    public function actionrecipeofdayadmin() {
        $model = new RecipesOfDay('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['RecipesOfDay']))
            $model->attributes = $_GET['RecipesOfDay'];

        $this->render('recipeofdayadmin', array(
            'model' => $model,
        ));
    }

    public function actionfilterDropdown() {

        $model = new Recipe;
        if (isset($_POST['staticid'])) {
            $savedStatus = $_POST['staticid'];
            //New Case
            if ($savedStatus == 0) {
                $status = 'New';
                $this->actionAdmin($status);
                exit;
            }
            if ($savedStatus == 1) {
                $status = 'Approved';
                $this->actionAdmin($status);
                exit;
            }
            if ($savedStatus == 2) {
                $status = 'Declined';
                $this->actionAdmin($status);
                exit;
            }
            $this->render('admin', array(
                'model' => $model,
                'status' => 'New',
            ));
        }
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Recipe('search');
        $model->unsetAttributes();  // clear any default values
        $model->status = 'New';

        if (isset($_GET['staticid'])) {

            $getStatus = $_GET['staticid'];
            if ($getStatus == 0)
                $status = 'New';
            if ($getStatus == 1)
                $status = 'Approved';
            if ($getStatus == 2)
                $status = 'Declined';
            $model->status = $status;
        }

        if (isset($_GET['Recipe']))
            $model->attributes = $_GET['Recipe'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionAjaxupdate() {

        $act = $_GET['act'];
        if ($act == 'doDelete') {
            foreach ($_POST['autoId'] as $id) {
                //delete memberCalendars relation
                foreach ($this->loadModel($id)->memberCalendars as $c)
                    $c->delete();
                //delete myfavorites relation
                foreach ($this->loadModel($id)->myfavorites as $c)
                    $c->delete();
                //delete recipe category relation
                foreach ($this->loadModel($id)->recipeCategories as $c)
                    $c->delete();
                //delete recipeNutritions relation
                foreach ($this->loadModel($id)->recipeNutritions as $c)
                    $c->delete();
                //delete recipe ingredient relation
                foreach ($this->loadModel($id)->recipeingredients as $c)
                    $c->delete();
                //delete recipesOfDays relation
                foreach ($this->loadModel($id)->recipesOfDays as $c)
                    $c->delete();
                //delete usermeal relation
                foreach ($this->loadModel($id)->userMeals as $c)
                    $c->delete();
                //unlink image
                $delImage = Recipe::model()->findbyPk($id);
                $path = Yii::app()->basePath . "\\www\\images\\" . $delImage->photo;
                @unlink($path);
                //delete model 
                $this->loadModel($id)->delete();
            }
            exit;
        }
        //recipe Accept
        if ($act == 'testimonialAccept') {
            foreach ($_POST['autoId'] as $value) {
                $model = Recipe::model()->findByPk($value);
                $model->status = 'Approved';
                $model->save();
            }
            exit;
        }
        //recipe decline Accept
        if ($act == 'testimonialDelete') {
            foreach ($_POST['autoId'] as $value) {
                $model = Recipe::model()->findByPk($value);
                $model->status = 'Declined';
                $model->save();
            }
            exit;
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

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionRod() {
        $model_rod = new RecipeOfDay;
        if (isset($_POST)) {
            print_r($_POST);
            exit;
        } $this->render('rod', array(
            'model_rod' => $model_rod,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        // CVarDumper::dump($_POST, 10, true);exit;
        $model = new Recipe;
        $recipeIng = new RecipeIngredient;
        $criteria = new CDbCriteria();



        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Recipe'])) {

//            print_r($_POST);
//            exit;
            $rnd = rand(0, 9999);  // generate random number between 0-9999
            $model->attributes = $_POST['Recipe'];
            $uploadedFile = CUploadedFile::getInstance($model, 'photo');
            $fileName = "{$rnd}-01-{$uploadedFile}";  // random number + file name
            $model->photo = $fileName;
            $model->created_by = Yii::app()->user->getId();

            if ($model->save()) {

                if (!empty($uploadedFile))
                    $uploadedFile->saveAs(Yii::app()->basePath . '/www/images/' . $fileName);

                // get cat ids	and save multiple
                //$cats = explode(",", $_POST['cat_names']);
                $cats = $_POST['cat_names'];
                foreach ($cats as $c_name) {

                    $criteria->select = 'id,cat_name'; // select fields which you want in output
                    $criteria->condition = 'cat_name = "' . $c_name . '"';
                    $categories = Category::model()->findAll($criteria);
//                     CVarDumper::dump($categories[0]->id, 10, true);exit;
                    if (!empty($categories)) {
                        $model_rc = new RecipeCategory;
                        $model_rc->recipe_id = $model->id;
                        $model_rc->cat_id = $categories[0]->id;
                        $model_rc->save();
                    }
                }
                //Subcategories save code

                if (isset($_POST['subcategories']) && ($_POST['subcategories'] != '' )) {
                    foreach ($_POST['subcategories'] as $values) {
                        $criteria = new CDbCriteria();
                        $criteria->condition = 'parent!=0';
                        $criteria->condition = 'cat_name=:cat_name';
                        $criteria->params = array(':cat_name' => $values);
                        $category_info = Category::model()->find($criteria);
                        $recipe_categories = new RecipeCategory;
                        $recipe_categories->recipe_id = $model->id;
                        $recipe_categories->cat_id = $category_info->id;
                        $recipe_categories->save();
                    }
                }
                $amount_t = array();
                $amount_t = $_POST['amount'];

                foreach ($amount_t as $key => $amount) {

//                           echo 'Amount is --'. $amount . '-- and key is --' . $key; echo '<br>';

                    $recipeIng->setIsNewRecord(true);
                    if ($key != '0') {
                        $recipeIng = new RecipeIngredient;
                        $recipeIng->amount = $amount;
                        $recipeIng->measure_id = $_POST['RecipeIngredient']['measure_id'][$key];
                        $recipeIng->weight = $_POST['weight'][$key];
                        $recipeIng->weight_unit = $_POST['RecipeIngredient']['weight_unit'][$key];
                        $recipeIng->ingredient_id = $_POST['RecipeIngredient']['ingredient_id'][$key];
                        $recipeIng->ingdesc = $_POST['RecipeIngredient']['ingdesc'][$key];
                        $criteria->select = 'id,catid'; // select fields which you want in output
                        $criteria->condition = 'id = ' . $recipeIng->ingredient_id . '';
                        $categories = Ingredient::model()->findAll($criteria);
                        $recipeIng->ingcat = $categories[0]->catid;
                        $recipeIng->recipe_id = $model->id;
//                        CVarDumper::dump($recipeIng,10,1);
//                        exit;
                        $recipeIng->save();
                    }
                }
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('create', array(
            'model' => $model,
            //'category' => $category,
            'recipeIng' => $recipeIng,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $criteria = new CDbCriteria();
        $recipeIng = new RecipeIngredient;

        $criteria->select = 'ingredient_id,measure_id,amount,weight,weight_unit,recipe_id,ingdesc'; // select fields which you want in output
        $criteria->condition = 'recipe_id = ' . $id . '';
        $rec_ing = RecipeIngredient::model()->findAll($criteria);
        $count = RecipeIngredient::model()->count($criteria);
        Yii::app()->session['count'] = $count;
//       echo "<pre>"; print_r($rec_ing); exit;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['Recipe'])) {
            $rnd = rand(0, 9999);  // generate random number between 0-9999
            $_POST['Recipe']['photo'] = $model->photo;
            $model->attributes = $_POST['Recipe'];
            $uploadedFile = CUploadedFile::getInstance($model, 'photo');
            $model->modified_by = Yii::app()->user->getId();
            if (!empty($uploadedFile)) {  // check if uploaded file is set or not
               
                //-------------------------
                $fileUnlink = Recipe::model()->findByPk($id);
                $oldFile = $fileUnlink->photo;
                $path = Yii::app()->basePath . "\\www\\images\\" . $oldFile;
                @unlink($path);
                $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
                $uploadedFile->saveAs(Yii::app()->basePath . '/www/images/' . $fileName);
                $model->photo = $fileName;
                //-------------------------
            }
            if ($model->save()) {
                // get cat ids	and save multiple
                RecipeCategory::model()->deleteAll('recipe_id =' . $id);
                $cats = explode(",", $_POST['cat_names']);
                foreach ($cats as $c_name) {
                    $criteria->select = 'id,cat_name'; // select fields which you want in output
                    $criteria->condition = 'cat_name = "' . $c_name . '"';
                    $categories = Category::model()->findAll($criteria);
                    // CVarDumper::dump($categories[0]->id, 10, true);exit;
                    if (!empty($categories)) {
                        $model_rc = new RecipeCategory;
                        $model_rc->recipe_id = $id;
                        $model_rc->cat_id = $categories[0]->id;
                        $model_rc->save();
                    }
                }
                RecipeIngredient::model()->deleteAll('recipe_id =' . $id);
                $amount_t = array();
                $amount_t = $_POST['RecipeIngredient']['amount'];
                foreach ($amount_t as $key => $amount) {
                    //$recipeIng->setIsNewRecord(true);
                    if ($key != '0') {
                        $recipeIng = new RecipeIngredient;
                        $recipeIng->amount = $amount;
                        $recipeIng->measure_id = $_POST['RecipeIngredient']['measure_id'][$key];
                        $recipeIng->weight = $_POST['RecipeIngredient']['weight'][$key];
                        $recipeIng->weight_unit = $_POST['RecipeIngredient']['weight_unit'][$key];
                        $recipeIng->ingredient_id = $_POST['RecipeIngredient']['ingredient_id'][$key];
                        $recipeIng->ingdesc = $_POST['RecipeIngredient']['ingdesc'][$key];
                        $criteria->select = 'id,catid'; // select fields which you want in output
                        $criteria->condition = 'id = ' . $recipeIng->ingredient_id . '';
                        $categories = Ingredient::model()->findAll($criteria);
                        $recipeIng->ingcat = $categories[0]->catid;
                        $recipeIng->recipe_id = $model->id;
                        $recipeIng->save();
                    }
                }
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('update', array(
            'model' => $model,
            'id' => $id,
            'recipeIng' => $recipeIng,
            'rec_ing' => $rec_ing,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        //delete memberCalendars relation
        foreach ($this->loadModel($id)->memberCalendars as $c)
            $c->delete();
        //delete myfavorites relation
        foreach ($this->loadModel($id)->myfavorites as $c)
            $c->delete();
        //delete recipe category relation
        foreach ($this->loadModel($id)->recipeCategories as $c)
            $c->delete();
        //delete recipeNutritions relation
        foreach ($this->loadModel($id)->recipeNutritions as $c)
            $c->delete();
        //delete recipe ingredient relation
        foreach ($this->loadModel($id)->recipeingredients as $c)
            $c->delete();
        //delete recipesOfDays relation
        foreach ($this->loadModel($id)->recipesOfDays as $c)
            $c->delete();
        //delete usermeal relation
        foreach ($this->loadModel($id)->userMeals as $c)
            $c->delete();
        //unlink image
        $delImage = Recipe::model()->findbyPk($id);
        $path = Yii::app()->basePath . "\\www\\images\\" . $delImage->photo;
        unlink($path);
        //delete model 
        $this->loadModel($id)->delete();
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Recipe');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Recipe::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'recipe-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
