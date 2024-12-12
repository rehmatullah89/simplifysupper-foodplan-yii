<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm_frontend extends CFormModel {

    public $email;
    public $password;
    public $rememberMe;
    private $_identity;
    /**/

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
            array('email', 'email'),
            // rememberMe needs to be a boolean
            //array('rememberMe', 'boolean'),
            // password needs to be authenticated
            array('password', 'authenticate'),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels()
    {
        return array(
            'rememberMe' => 'Remember me',
        );
    }

    /**
     * Authenticates the password.
     * This is the 'authenticate' validator as declared in rules().
     */
    public function authenticate($attribute, $params)
    {
        if (!$this->hasErrors()) {

            $identity = new UserIdentity_frontend($this->email, $this->password);
            $identity->authenticate();


            switch ($identity->errorCode) {
                case UserIdentity_frontend::ERROR_NONE:
                    Yii::app()->user->login($identity);
                    break;
                case UserIdentity_frontend::ERROR_USERNAME_INVALID:
                    $this->addError('email', 'Email is incorrect.');
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
    public function login()
    {
        if ($this->_identity === null) {
            $this->_identity = new UserIdentity_frontend($this->email, $this->password);
            $this->_identity->authenticate();
        }
        if ($this->_identity->errorCode === UserIdentity_frontend::ERROR_NONE) {
           
            Yii::app()->user->login($this->_identity);
            return true;
        } else
            return false;
    }

}
