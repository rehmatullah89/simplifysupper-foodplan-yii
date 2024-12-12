<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity_frontend extends CUserIdentity {

    private $_id;

    /**
     * Authenticates a user.
     * The example implementation makes sure if the email and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {

        $user = Member::model()->findByAttributes(array('email' => $this->username));
        
        if ($user === null) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } else if ($user->password != md5($this->password)) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        } else { // Okay!
            $this->_id = $user->memberid;
            $this->errorCode = self::ERROR_NONE;
        }
        return $this->errorCode;
    }

    public function authenticatesignup($email, $password) {
        $user = Member::model()->findByAttributes(array("email" => $email, "password" => $password));
        if ($user) {
            $this->_id = $user->id;
            $this->errorCode = self::ERROR_NONE;
        } else
            $this->errorCode = self::ERROR_USERNAME_INVALID;

        return !$this->errorCode;
    }

    public function getId() {
        return $this->_id;
    }

}
