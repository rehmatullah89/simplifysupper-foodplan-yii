<?php

/**
 * SiteController.php
 *
 * @author: antonio ramirez <antonio@clevertech.biz>
 * Date: 7/23/12
 * Time: 12:25 AM
 */
class DashboardController extends Controller
{

    public function accessRules()
    {
        return array(
            // not logged in users should be able to login and view captcha images as well as errors
            array('allow', 'actions' => array()),
            // logged in users can do whatever they want to
            // array('allow', 'users' => array('@')),
            array('allow', 'users' => array('index', 'useraccountdetail', 'setuserrecipe', 'recipesaveondetail', 'useraddrecipe', 'getcategories', 'listuserrecipes')),
            // not logged in users can't do anything except above
            array('deny'),
        );
    }

    /**
     * Declares class-based actions.
     * @return array
     */
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
        );
    }
    
   

    public function actionuseraccountDetail()
    {
        $this->layout='user';
        $userDetails = User::model()->findByAttributes(array('memberid' => Yii::app()->user->id));
        $this->render('useraccountdetail', array('userdetails' => $userDetails));
    }

    public function actionlistuserrecipes()
    {
        $this->layout = 'user';
        //pagination
        $criteria = new CDbCriteria();
        $criteria->select = "*";
        $criteria->addCondition('created_by=:userid');
        $criteria->params = array(':userid' => Yii::app()->user->id);
        $count = Recipe::model()->count($criteria);
        $item_count = $count;
        $pages = new CPagination($count);
        $pages->pageSize = 10;
        $pages->applyLimit($criteria);
        //endpagination
        $models = Recipe::model()->findAll($criteria);
        //$findUserRecipes = Recipe::model()->findAllByAttributes(array('created_by' => Yii::app()->user->id));
        $this->render('listuserrecipes', array(
            'models' => $models,
            'pages' => $pages,
            'item_count' => $item_count,
        ));
    }

    /* open on startup */

    public function actionIndex()
    {
        if (Yii::app()->user->isGuest)
            $this->redirect('site/index');

        $today = date("Y-m-d");
        $weeklyrecipes = UserMeal::model()->findAll(array(
            'condition' => 'recipe_date >= :date and member_id=:member',
            'params' => array(':date' => $today, ':member' => Yii::app()->user->id),
        ));
        $this->layout = 'user';
        $this->render('dashboard', array('weeklyrecipes' => $weeklyrecipes));
    }

    public function actionGetCategories()
    {
        $match = $_POST['query'];
        $categories = Category::model()->findAll(
                'cat_name LIKE :match', array(':match' => "%$match%")
        );
        $recipe_categories = array();

        foreach ($categories as $category)
        {
            $category_info = array(
                'id' => $category['id'],
                'name' => $category['cat_name']
            );
            array_push($recipe_categories, $category_info);
        }

        echo $this->renderPartial('_categories', array('categories' => $recipe_categories));
    }

    public function actionsetuserrecipe()
    {
        $setRecipes = UserMeal::model()->findAll(array(
            'condition' => 'recipe_date = :date and member_id=:member',
            'params' => array(':date' => $_POST['date'], ':member' => Yii::app()->user->id),
        ));
//        CVarDumper::dump($setRecipes, 10, TRUE);exit;

        echo $this->renderPartial('_selected_rod', array('meals' => $setRecipes));
    }

    public function actionuseraddrecipe()
    {
        $this->layout = 'user';
        $model = new Recipe;
        $recipeIng = new RecipeIngredient;
        $this->render('useraddrecipe', array('model' => $model, 'recipeIng' => $recipeIng));
    }

    public function actionrecipesaveondetail()
    {
        $getDate = $_POST['recipeDate'];
        $getDate = explode('/', $getDate);
        $month = $getDate[0]; //month
        $date = $getDate[1]; //date
        $year = $getDate[2];
        $date = $year . '-' . $month . '-' . $date;


        $recipe_exists = UserMeal::model()->findByAttributes(array('member_id' => Yii::app()->user->id, 'recipe_date' => $date, 'recipe_id' => $_POST['recipeid']));
        if ($recipe_exists == null)
        {
            $userMeal = new UserMeal();
            $userMeal->recipe_id = $_POST['recipeid'];
            $userMeal->serving_size = $_POST['servingSize'];
            $userMeal->recipe_date = $date;
            $userMeal->member_id = Yii::app()->user->id;
            if ($userMeal->save())
                echo '99';
            else
                echo '33';
        }
        else
        {
            echo '77';
        }
    }

}
