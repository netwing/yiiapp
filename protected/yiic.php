<?php

// *** BASE CONFIGURATION LOAD ***
require_once dirname(__FILE__) . '/config/console.php';

// Define Debug costants based on variable value
define('YII_DEBUG', $yiic_debug);
define('YII_TRACE_LEVEL', $yiic_trace_level);

// *** YII FRAMEWORK LOAD ***
// Include base yii class
require_once dirname(__FILE__) . '/../vendor/yiisoft/yii/framework/yii.php';

$yiic=dirname(__FILE__).'/../vendor/yiisoft/yii/framework/yiic.php';
require_once($yiic);
