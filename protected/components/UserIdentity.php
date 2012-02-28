<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

    private $_id;
    private $record;

    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {
//        $users=array(
//                // username => password
//                'demo'=>'demo',
//                'admin'=>'admin',
//                'nope'=>'nope',
//        );
//        if (!isset($users[$this->username]))
//            $this->errorCode = self::ERROR_USERNAME_INVALID;
//        else if ($users[$this->username] !== $this->password)
//            $this->errorCode = self::ERROR_PASSWORD_INVALID;
//        else
//            $this->errorCode = self::ERROR_NONE;
//        return!$this->errorCode;
        
        $this->record = User::model()->findByAttributes(array('username'=>$this->username));
        if($this->record===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if($this->record->password !== $this->password)
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        else {
            $this->_id = $this->record->id;
            $this->setState('title', $this->record->title);
            $this->setState('prefix', $this->record->prefix);
            $this->errorCode = self::ERROR_NONE;
        }
        return !$this->errorCode;
    }

}