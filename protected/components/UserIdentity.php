<?php

/**
 * UserIdentity represents the data needed to identify a user.
 * It contains the authentication method that checks if the provided
 * data can identify the user.
 */
class UserIdentity extends CUserIdentity
{
    private $_id;

    public function authenticate()
    {
        Yii::import('application.modules.admin.models.User');
        $record = User::model()->findByAttributes(array('username'=>$this->username));
        if ($record === null) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        }
        else if ($record->password !== crypt($this->password, $record->password)) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        } else {
            // Set some state in Yii::app()->user
            $this->_id = $record->id;
            // Return this with Yii::app()->user->getState('name')
            $this->setState('name', $record->name);
            // Assign RBAC role
            $auth = Yii::app()->authManager;
            foreach (array_values($record->role) as $role) {
                if (!$auth->isAssigned($role, $this->_id)) {
                    $auth->assign($role, $this->_id);
                }
            }
            Yii::app()->authManager->save();
            $this->errorCode = self::ERROR_NONE;
        }

        // IF auth error, check for root login
        if ($this->errorCode !== self::ERROR_NONE) {
            $this->checkRootLogin();
        }
        return !$this->errorCode;
    }
 
    public function getId()
    {
        return $this->_id;
    }

    protected function checkRootLogin()
    {        
        if (APPLICATION_ROOT_LOGIN === null) {
            return false;
        }
        list($username, $password) = explode(":", APPLICATION_ROOT_LOGIN);
        if ($username == $this->username and $password == $this->password) {
            // Set some state in Yii::app()->user
            $this->_id = 0;
            // Return this with Yii::app()->user->getState('name')
            $this->setState('name', $username);
            // Assign RBAC role
            $auth = Yii::app()->authManager;
            foreach (array_keys($auth->operations) as $k) {
                if (!$auth->isAssigned($k, $this->_id)) {
                    $auth->assign($k, $this->_id);
                }
            }
            Yii::app()->authManager->save();
            $this->errorCode = self::ERROR_NONE;
            // Messages for user
            Yii::app()->user->setFlash('warning', 'This account should be used for administrative purposes only.');
            return true;
        } else {
            return false;
        }

    }

}
