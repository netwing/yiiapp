<?php
// This is global bootstrap for autoloading 
// Create app only first run
if (!defined("APPLICATION_NAME")) {
    require_once __DIR__ . "/../../protected/config/console.php";
    require_once __DIR__ . "/../../vendor/yiisoft/yii/framework/yiit.php";
    YiiBase::$enableIncludePath=false;
    $app = Yii::createConsoleApplication($config);
}
