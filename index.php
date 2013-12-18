<?php

// *** BASE CONFIGURATION LOAD ***
// Include configuration that set the variable $config
require_once dirname(__FILE__) . '/protected/config/main.php';

// Define Debug costants based on variable value
define('YII_DEBUG', $yii_debug);
define('YII_TRACE_LEVEL', $yii_trace_level);

// *** YII FRAMEWORK LOAD ***
// Include base yii class
require_once dirname(__FILE__) . '/vendor/yiisoft/yii/framework/yii.php';

if (file_exists("c3.php")) {
    YiiBase::$enableIncludePath = false;
    include 'c3.php';
}

// *** YII CREATE APPLICATION
// Create application
$app = Yii::createWebApplication($config);

// *** YII APPLICATION CUSTOMIZATION
// Write here your own customization if needed
if (isset($app->request)) {
    if ($app->request->getPreferredLanguage()) {
        $app->language = $app->request->getPreferredLanguage();
    }
}

// Execute application
$app->run();
