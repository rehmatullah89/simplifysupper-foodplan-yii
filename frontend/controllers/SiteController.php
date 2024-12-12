<?php

/**
 * SiteController.php
 *
 * @author: antonio ramirez <antonio@clevertech.biz>
 * Date: 7/23/12
 * Time: 12:25 AM
 */
class SiteController extends Controller
{

    public function accessRules()
    {
        return array(
            // not logged in users should be able to login and view captcha images as well as errors
            array('allow', 'actions' => array('index', 'allcategories','captcha', 'login', 'error', 'feedback', 'blog', 'recipe', 'join', 'aboutus', 'validatelogin', 'contactus', 'logout', 'categories', 'activate', 'activateuser', 'resendmail', 'showpopup', 'deleteselected', 'searchresults', 'setrecipe', 'setuserrecipe', 'recipedetail')),
            // logged in users can do whatever they want to
            array('allow', 'users' => array('@')),
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

    public function actionallcategories()
    {
        $data = Category::model()->findAllByAttributes(array('cat_type'=>'Recipe','parent'=>0));
        $this->render('allcategories', array("data" => $data));
    }

    public function actioncategorydetails($id)
    {
        $categoryDetails = Category::model()->findByAttributes(array('id' => $id));
        $this->render('categorydetails', array('categoryDetails' => $categoryDetails));
    }

    public function actionrecipedetail($id)
    {
        if (Yii::app()->user->isGuest)
            $this->layout = 'main';
        else
            $this->layout = 'user';
        $recipeDetails = Recipe::model()->findByAttributes(array('id' => $id));
        $this->render('recipedetail', array('recipeDetails' => $recipeDetails));
    }

    /* open modal on calendar click */

    public function actionshowpopup()
    {
        $date = $_POST['date'];
        $recipe_id = $_POST['recipeid'];
        $recipe_exists = UserMeal::model()->findByAttributes(array('member_id' => Yii::app()->user->id, 'recipe_date' => $date, 'recipe_id' => $recipe_id));
        if ($recipe_exists == null)
        {
            $user_recipe = new UserMeal();
            $user_recipe->recipe_id = $recipe_id;
            $getRecId = Recipe::model()->findByPk($recipe_id);
            $user_recipe->serving_size = $getRecId->serving_size;
            $user_recipe->member_id = Yii::app()->user->id;
            $user_recipe->recipe_date = $date;
            $user_recipe->save();
        }
        $userMeals = UserMeal::model()->findAllByAttributes(array('recipe_date' => $date, 'member_id' => Yii::app()->user->id));
        echo $this->renderPartial('_selected_rod', array('meals' => $userMeals));
    }

    public function actionSetUserRecipe()
    {
        $date = $_POST['date'];
//        $recipe_exists = UserMeal::model()->findByAttributes(array('member_id' => Yii::app()->user->id, 'recipe_date' => $date, 'recipe_id' => $recipe_id));
//        if ($recipe_exists == null) {
//            $user_recipe = new UserMeal();
//            $user_recipe->recipe_id = $recipe_id;
//            $getRecId = Recipe::model()->findByPk($recipe_id);
//            $user_recipe->serving_size = $getRecId->serving_size;
//            $user_recipe->member_id = Yii::app()->user->id;
//            $user_recipe->recipe_date = $date;
//            $user_recipe->save();
//        }
        $userMeals = UserMeal::model()->findAllByAttributes(array('recipe_date' => $date, 'member_id' => Yii::app()->user->id));
        echo $this->renderPartial('_selected_rod', array('meals' => $userMeals));
    }

    //ajax delete recipe
    public function actiondeleteselected()
    {
        $id = $_POST['id'];

        $meal = UserMeal::model()->findByPk($id);
        if ($meal->delete())
        {
            echo "1";
        } else
        {
            echo "2";
        }
    }

    public function actionSearchResults()
    {
        $query = $_POST['q'];
        $recipes = Recipe::model()->findAll(
                'title LIKE :match', array(':match' => "%$query%")
        );
        echo $this->renderPartial('search_results', array('recipes' => $recipes));
    }

    public function actionSetRecipe()
    {
        $recipe_id = $_POST['recipe_id'];
        $serving_size = $_POST['serving_size'];
        $date = $_POST['date'];

        //Check if this recipe is already set by the user

        $already_selected = UserMeal::model()->findAllByAttributes(array('recipe_id' => $recipe_id, 'recipe_date' => $date, 'member_id' => Yii::app()->user->id));

        if ($already_selected == null)
        {

            $userMeal = new UserMeal();
            $userMeal->recipe_id = $recipe_id;
            $userMeal->serving_size = $serving_size;
            $userMeal->member_id = Yii::app()->user->id;
            $userMeal->recipe_date = $date;

            if ($userMeal->save())
            {
                $recipe_details = Recipe::model()->findByPk($recipe_id);
                echo $this->renderPartial('set_recipe', array('recipe_details' => $recipe_details));
            }
        } else
        {

            echo "false";
        }
    }

    /* open on startup */

    public function actionIndex()
    {
        $shopping_list = array();
        //check if user is guest
        if (Yii::app()->user->isGuest)
        {
            $currentDate = date('y-m-d');
            $recipeOfDay = RecipesOfDay::model()->findAll(array(
                'condition' => 'rod_day >= :date',
                'params' => array(':date' => $currentDate),
                    ), array('limit' => 7));
        } else
        {
            $currentDate = date('y-m-d');
            $recipeOfDay = UserMeal::model()->findAll(array(
                'condition' => 'recipe_date >= :date',
                'condition' => 'member_id = ' . Yii::app()->user->id,
                'params' => array(':date' => $currentDate),
                    ), array('limit' => 7));
        }
        // display the login form
        $this->render('index', array('recipeOfDay' => $recipeOfDay));
    }

    public function actionvalidatelogin()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];


        $model = new LoginForm_frontend();

        $model->email = $email;
        $model->password = $password;

        if ($model->validate() && $model->login())
        {

            echo "1";
        } else
        {
            $response = $model->getErrors();
            header('Content-type: application/json');
            echo json_encode($response);
        }
    }

    public function actioncategories()
    {
        $this->layout = 'main';

        $model = Category::model()->findAll();

        $this->render("categories", array('model' => $model));
    }

    public function actionLogin()
    {

        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm']))
        {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /*
     * If user is not getting email 
     * than popup have functionality to resend mail
     * it get user entered email in parameter and proceed same process of sending email in join or register 
     */

    public function actionresendmail($email)
    {
        $model = new JoinForm();
        //Yii app component(myfuncitons)->functionfromcomponent(mystring)
        $secretKey = Yii::app()->myfunctions->generateRandomString(40);
        $subject = 'Confirm Your Account';
        $body = 'Thank you for signup with Simplify Supper. Please click the link below to activte your account.<br/>';
        $body.=Yii::app()->request->getBaseUrl(true) . '/site/activateuser?key=' . $secretKey;
        //=====================
        Yii::import('application.extensions.phpmailer.JPhpMailer');
        $mail = new JPhpMailer(true);
        $mail->IsSMTP();
        try {
            // $mail->SMTPDebug = 2;           // enables SMTP debug information (for testing)
            $mail->SMTPDebug = FALSE;           // hide success message for dev
            $mail->SMTPAuth = true;         // enable SMTP authentication
            $mail->SMTPSecure = "tls";      // sets the prefix to the servier
            $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
            $mail->Port = 587;              // set the SMTP port for the GMAIL server
            $mail->Username = "nextbridgebabylon@gmail.com";  // GMAIL username
            $mail->Password = "next123456";  // USER GMAIL password
            $mail->AddAddress($email);
            $mail->SetFrom('nextbridgebabylon@gmail.com', 'Simplify Supper');
            $mail->Subject = $subject;
            $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
            $mail->MsgHTML("$body");
            if ($mail->Send())
            {
                
            }
        } catch (phpmailerException $e) {
            $e->errorMessage(); //Pretty error messages from PHPMailer
        } catch (Exception $e) {
            $e->getMessage(); //Boring error messages from anything else!
        }
        ///=================
        $this->render('join', array('model' => $model));
    }

    /*
     * Action Join have Functionality of User signup
     * Send Mail Using PHPMailer Extension imported in action\
     * Add same Mail to Mailchimp List After Sucessfull Save In DB and Email Send
     * Send Message to View Via Flash and show popup of this message
     */

    public function actionjoin()
    {
        $this->layout = 'main';
        if (isset($_GET['code']))
        {
            $code = $_GET['code'];
            $access_token_url = 'https://graph.facebook.com/oauth/access_token?client_id=716978615033533&redirect_uri=http://localhost/simplifysupper/frontend/www/site/join/&client_secret=c9ab6a687e64e38c058666a8fdd9e2e5&code=' . $code;
            $access_token = file_get_contents($access_token_url);
            $at = explode("&expires", $access_token);
            $test = explode("=", $at[0]);
            $user_acess_token = $test[1];
            $user_info_url = "https://graph.facebook.com/me?access_token=" . $user_acess_token;
            $user_information = file_get_contents($user_info_url);
            $user_info_php = json_decode($user_information, true);
            $user_email = $user_info_php['email'];
            $facebook_id = $user_info_php['id'];
            $user_detail = Member::model()->findByAttributes(array('facebook_id' => $facebook_id));
            if ($user_detail == null)
            {
                $member = new Member();
                $member->email = $user_email;
                $member->facebook_id = $facebook_id;
                $member->password = md5('123456');
                if ($member->save())
                {
                    $logged_user = new LoginForm_frontend();
                    $logged_user->email = $user_email;
                    $logged_user->password = '123456';

                    if ($logged_user->login())
                    {
                        $this->redirect(array('dashboard/index'));
                    }
                }
            } else
            {

                $member = Member::model()->findByAttributes(array('facebook_id' => $facebook_id));
                $logged_user = new LoginForm_frontend();
                $logged_user->email = $member->email;
                $logged_user->password = '123456';
                if ($logged_user->login())
                {
                    $this->redirect(array('dashboard/index'));
                }
            }
//            print_r(json_decode($user_information));
        }
        $model = new JoinForm();
        if (isset($_POST['JoinForm']))
        {
            $model->attributes = $_POST['JoinForm'];
            if ($model->validate())
            {
                $modelUser = new Member();
                $modelUser->attributes = $_POST['JoinForm'];
                $modelUser->password = md5($_POST['JoinForm']['password']);
                $secretKey = Yii::app()->myfunctions->generateRandomString(40);
                $modelUser->secret_key = $secretKey;
                if ($modelUser->save())
                {
                    Yii::app()->user->setFlash('popup', '1');
                    Yii::app()->user->setFlash('useremail', $_POST['JoinForm']['email']);
                    $subject = 'Confirm Your Account';
                    $body = 'Thank you for signup with Simplify Supper. Please click the link below to activte your account.<br/>';
                    $body.="<a href='" . Yii::app()->request->getBaseUrl(true) . '/site/activateuser?key=' . $secretKey . "'  >Click Here to Activate</a>";
                    //=====================
                    Yii::import('application.extensions.phpmailer.JPhpMailer');
                    $mail = new JPhpMailer(true);
                    $mail->IsSMTP();
                    try {
                        // $mail->SMTPDebug = 2;           // enables SMTP debug information (for testing)
                        $mail->SMTPDebug = FALSE;           // hide success message for dev
                        $mail->SMTPAuth = true;         // enable SMTP authentication
                        $mail->SMTPSecure = "tls";      // sets the prefix to the servier
                        $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
                        $mail->Port = 587;              // set the SMTP port for the GMAIL server
                        $mail->Username = "nextbridgebabylon@gmail.com";  // GMAIL username
                        $mail->Password = "next123456";  // USER GMAIL password
                        $mail->AddAddress($_POST['JoinForm']['email']);
                        $mail->SetFrom('nextbridgebabylon@gmail.com', 'Simplify Supper');
                        $mail->Subject = $subject;
                        $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
                        $mail->MsgHTML("$body");
                        //$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
                        // optional - MsgHTML will create an alternate automatically
                        //$mail->MsgHTML(file_get_contents('contents.html'));
                        //$mail->AddAttachment('images/phpmailer.gif');
                        //$mail->AddAttachment('images/phpmailer_mini.gif'); 
                        if ($mail->Send())
                        {
                            Yii::import('application.extensions.mailchimp.MailChimp');
                            $MailChimp = new MailChimp('9445f7a54e4559a6d78096b589aa9719-us6');
//                            $result = $MailChimp->call('lists/subscribe', array(
//                                'id' => 'ee6a655319',
//                                'email' => array('email' => $_POST['JoinForm']['email']),
//                                'merge_vars' => array('FNAME' => 'Simplify', 'LNAME' => 'Supper'),
//                                'double_optin' => false,
//                                'update_existing' => true,
//                                'replace_interests' => false,
//                                'send_welcome' => false,
//                            ));
                        }
                    } catch (phpmailerException $e) {
                        $e->errorMessage(); //Pretty error messages from PHPMailer
                    } catch (Exception $e) {
                        $e->getMessage(); //Boring error messages from anything else!
                    }
                    ///=================
                }
            }
        }
        $this->render('join', array('model' => $model));
    }

    /*
     * Activate User by Getting His secret key as parameter
     * Change Status to Activate 
     * Putt Null value in database in key field
     */

    public function actionActivateUser($key)
    {
        /* render key with messages */
        $msg = '';
        $secret_key = $_GET['key'];
        $user = Member::model()->findbyAttributes(array('secret_key' => $secret_key));
        if ($user === null)
        {
            $msg = "Your key is invalid";
            $this->render('registration_success', array(
                'msg' => $msg
            ));
        } else
        {
            $user->status = "Active";
            $user->secret_key = null;

            if ($user->update())
            {
                $msg = "Congratulations! Your account has been activated, you are now being redirected to your dashboard";
            } else
            {
                $msg = "Soory ! But there is problem in activation";
            }
            $this->render('registration_success', array(
                'msg' => $msg
            ));
        }
    }

    public function actionfeedback()
    {
        
    }

    public function actionEmailShoppingList()
    {
        $email = $_POST['email'];

        $subject = 'Shopping List';
        $body = $this->renderPartial('_shoppinglist', true);

        //=====================
        Yii::import('application.extensions.phpmailer.JPhpMailer');
        $mail = new JPhpMailer(true);
        $mail->IsSMTP();
        try {
            // $mail->SMTPDebug = 2;           // enables SMTP debug information (for testing)
            $mail->SMTPDebug = FALSE;           // hide success message for dev
            $mail->SMTPAuth = true;         // enable SMTP authentication
            $mail->SMTPSecure = "tls";      // sets the prefix to the servier
            $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
            $mail->Port = 587;              // set the SMTP port for the GMAIL server
            $mail->Username = "nextbridgebabylon@gmail.com";  // GMAIL username
            $mail->Password = "next123456";  // USER GMAIL password
            $mail->AddAddress($email);
            $mail->SetFrom('nextbridgebabylon@gmail.com', 'Simplify Supper');
            $mail->Subject = $subject;
            $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
            $mail->MsgHTML("$body");
            if ($mail->Send())
            {
                echo "Email sent to " . $email;
            }
        } catch (phpmailerException $e) {
            echo $e->errorMessage(); //Pretty error messages from PHPMailer
        } catch (Exception $e) {
            echo $e->getMessage(); //Boring error messages from anything else!
        }
    }

    public function actionblog()
    {
        $getBlog = Blog::model()->findAll();
        $this->render('blog', array('getBlog' => $getBlog));
    }

    public function actionrecipe()
    {
        
    }

    public function actionaboutus()
    {
        $this->layout = 'main';
        $this->render('about');
    }

    public function actioncontactus()
    {
        $this->layout = 'main';
        $this->render('contactus');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error)
        {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the login page
     */

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

}
