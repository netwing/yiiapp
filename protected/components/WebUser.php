<?php

class WebUser extends CWebUser
{
    public function isAdmin()
    {
        return ($this->getState('role') == 'admin');
    }

    public function logout($destroySession = true)
    {
        $assigned_roles = Yii::app()->authManager->getRoles(Yii::app()->user->id); //obtains all assigned roles for this user id
        if(!empty($assigned_roles)) { //checks that there are assigned roles
            $auth = Yii::app()->authManager; //initializes the authManager
            foreach($assigned_roles as $n=>$role) {
                $auth->revoke($n,Yii::app()->user->id);
            }
            Yii::app()->authManager->save(); //again always save the result
        }
        // If root login
        if (Yii::app()->user->id == 0) {
            $assigned_operations = Yii::app()->authManager->getOperations(Yii::app()->user->id);
            $auth = Yii::app()->authManager; //initializes the authManager
            foreach($assigned_operations as $n => $o) {
                $auth->revoke($n,Yii::app()->user->id);            
            }
            Yii::app()->authManager->save(); //again always save the result
        }
        parent::logout();
    }
}
