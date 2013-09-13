<?php
require_once __DIR__ . "/../../protected/config/console.php";
require_once __DIR__ . "/../../vendor/yiisoft/yii/framework/yiit.php";
$app = Yii::createConsoleApplication($config);

require_once "PHPUnit/Autoload.php";
