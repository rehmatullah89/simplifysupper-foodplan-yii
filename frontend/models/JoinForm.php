<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class JoinForm extends CFormModel {

    public $email;
    public $password;
    public $cpassword;

    /**
     * Declares the validation rules.
     * The rules state that email and password are required,
     * and password needs to be authenticated.
     */
    public function rules()
    {
        return array(
            // email and password are required
            array('email, password', 'required'),
            array('cpassword', 'required'),
            array('email', 'email'),
            array('email', 'checkUniqueEmail'),
            // rememberMe needs to be a boolean
            //array('rememberMe', 'boolean'),
            // password needs to be authenticated
            //  array('password', 'authenticate'),
            array('password', 'compare', 'compareAttribute' => 'cpassword')
            
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels()
    {
        return array(
            'cpassword' => 'Confirm Password',
        );
    }

    public function checkUniqueEmail()
    {

        $user = Member::model()->findByAttributes(array('email' => $this->email));

        if ($user != null) 
            $this->addError('email','This email address has already been taken');
       
    }

    /**
     * Authenticates the password.
     * This is the 'authenticate' validator as declared in rules().
     */
    public function authenticate($attribute, $params)
    {
        if (!$this->hasErrors()) {

            $identity = new UserIdentity($this->email, $this->password);
            $identity->authenticate();


            switch ($identity->errorCode) {
                case UserIdentity::ERROR_NONE:
                    Yii::app()->user->login($identity);
                    break;
                case UserIdentity::ERROR_USERNAME_INVALID:
                    $this->addError('username', 'Username is incorrect.');
                    break;
                default: // UserIdentity::ERROR_PASSWORD_INVALID
                    $this->addError('password', 'Password is incorrect.');
                    break;
            }
        }
    }

    /**
     * Logs in the user using the given email and password in the model.
     * @return boolean whether login is successful
     */
    public function login() {
        if ($this->_identity === null) {
            $this->_identity = new UserIdentity($this->email, $this->password);
            $this->_identity->authenticate();
        }
        if ($this->_identity->errorCode === UserIdentity::ERROR_NONE) {

            Yii::app()->user->login($this->_identity);
            return true;
        } else
            return false;
    }

}
