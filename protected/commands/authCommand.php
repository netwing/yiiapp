<?php

class authCommand extends EConsoleCommand
{
    public function actionInitialize() 
    {
        
        $this->printlnColor("********************************************************************************", self::FGB_WHITE);
        $this->printlnColor("*                                                                              *", self::FGB_WHITE);
        $this->printlnColor("*                         WRITING AUTHORIZATION RULES                          *", self::FGB_WHITE);
        $this->printlnColor("*                                                                              *", self::FGB_WHITE);
        $this->printlnColor("********************************************************************************", self::FGB_WHITE);        
        $this->printlnColor("", self::FGB_WHITE);        
        
        $auth = Yii::app()->authManager;

        // Create some roles
        $admin = $auth->createRole('admin');
        $staff = $auth->createRole('staff');
        $user = $auth->createRole('user');
        
        // Create some tasks
        $task1 = $auth->createTask('task1', "Un task");
        $task2 = $auth->createTask('task2', "Un task");
        $task3 = $auth->createTask('task3', "Un task");

        // Create some operations
        $auth->createOperation('task1_create');
        $auth->createOperation('task1_read');
        $auth->createOperation('task1_update');
        $auth->createOperation('task1_delete');
        $auth->createOperation('task2_create');
        $auth->createOperation('task2_read');
        $auth->createOperation('task2_update');
        $auth->createOperation('task2_delete');
        $auth->createOperation('task3_create');
        $auth->createOperation('task3_read');
        $auth->createOperation('task3_update');
        $auth->createOperation('task3_delete');

        $task1->addChild('task1_create');
        $task1->addChild('task1_read');
        $task1->addChild('task1_update');
        $task1->addChild('task1_delete');

        $task2->addChild('task2_create');
        $task2->addChild('task2_read');
        $task2->addChild('task2_update');
        $task2->addChild('task2_delete');

        $task3->addChild('task3_create');
        $task3->addChild('task3_read');
        $task3->addChild('task3_update');
        $task3->addChild('task3_delete');

        $user->addChild('task1');
        $staff->addChild('task2');
        $staff->addChild('task3');
        $admin->addChild('user');
        $admin->addChild('staff');

        $auth->save();
    }
}

?>
