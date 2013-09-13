<?php

// *** BASE CONFIGURATION LOAD ***
// Include configuration that set the variable $config
require_once dirname(__FILE__) . '/protected/config/main.php';

// Define Debug costants based on variable value
define('YII_DEBUG', $yii_debug);
define('YII_TRACE_LEVEL', $yii_trace_level);

// *** YII FRAMEWORK LOAD ***
// Include base yii class
require_once dirname(__FILE__) . '/yii/framework/yii.php';

// *** YII AWARE CUSTOMIZATION
// Path for bootstrap extensions
Yii::setPathOfAlias('bootstrap', dirname(__FILE__) . '/protected/extensions/yiistrap');

// *** YII CREATE APPLICATION
// Create application
$app = Yii::createWebApplication($config);

// *** YII APPLICATION CUSTOMIZATION
// Write here your own customization if needed

// Execute application
$app->run();
