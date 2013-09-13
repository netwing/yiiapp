<?php

// Default configuration file
// If you want to override any configuration
// please create a config.php file in the same directory of this file
// and rewrite only what you want to change

// *** DO NOT OVERWRITE THIS FILE!!! ***

// ***************************
// *** COSTANTS DEFINITION ***
// ***************************

define("APPLICATION_NAME", "YIIAPP");
define("APPLICATION_VERSION", "1.0.0");
define("APPLICATION_SOFTWARE_HOUSE", "Netwing SRL");
define("APPLICATION_PATH", dirname(__FILE__) . DIRECTORY_SEPARATOR . '..');

// *********************
// *** CONFIGURATION ***
// *********************
// Config debug and trace level
$yii_debug = false;
$yii_trace_level = 1;

// Config debug and trace level for console
$yiic_debug = false;
$yiic_trace_level = 1;

// Main configuration array
$config = array(
    
    'basePath'  => APPLICATION_PATH,
    'name'      => APPLICATION_NAME,
    'theme'     => 'classic',
    'timeZone'  => 'Europe/London',
    'language'  => 'en',
    
    // path aliases
    'aliases' => array(
        'bootstrap' => realpath(__DIR__ . '/../extensions/yiistrap'),
    ),

    // preloading 'log' component
    'preload'   => array(
        'log',
    ),

    // autoloading model and component classes
    'import'    => array(
        'application.models.*',
        'application.components.*',
        'application.modules.rights.*', 
        'application.modules.rights.components.*',
        'bootstrap.helpers.TbHtml',
    ),

    'modules'   => array(

        'admin',
        'example',
        'rights',

        // Yii code generator
        'gii' => array(
            'class'             => 'system.gii.GiiModule',
            'password'          => 'develop',
            'generatorPaths'    => array(
                'bootstrap.gii',
                'application.gii'
            ),
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            // Default to only local net 192.168.*.* and localhost
            'ipFilters'         => array('192.168.*.*', '127.0.0.1', '::1'),
        ),

    ),

    'components'    => array(

        // *** YII DEFAULT COMPONENTS ***
        // Main log component
        'log' => array(
            'class'=>'CLogRouter',
            // Routes for logging
            'routes'=>array(
                
                // Log errors and warnings in errors.log
                'error' => array(
                    'class'         => 'CFileLogRoute',
                    'levels'        => 'error, warning',
                    'logfile'       => 'error.log',
                    'enabled'       => true,
                    'maxFileSize'   => 20480,
                    'maxLogFiles'   => 10,
                ),
                
                // Log errors, warnings and info in application.log
                'application' => array(
                    'class'     => 'CFileLogRoute',
                    'levels'    => 'error, warning, info',
                    'logfile'   => 'application.log',
                    'enabled'   => true,
                    'maxFileSize'   => 20480,
                    'maxLogFiles'   => 10,
                ),
                
                // Log trace query in query.log
                'query' => array(
                    'class'         => 'CFileLogRoute',
                    'logfile'       => 'query.log',
                    'categories'    => 'system.db.CDbCommand',
                    'levels'        => 'trace, info, warning, error',
                    'enabled'       => true,
                    'maxFileSize'   => 20480,
                    'maxLogFiles'   => 10,
                ),

                // Log trace in debug.log
                'debug' => array(
                    'class'         => 'CFileLogRoute',
                    'logfile'       => 'debug.log',
                    'levels'        => 'trace',
                    'enabled'       => true,
                    'maxFileSize'   => 20480,
                    'maxLogFiles'   => 10,
                ),

                // Debug toolbar
                'toolbar' => array(
                    'class'     => 'ext.yii-debug-toolbar.yii-debug-toolbar.YiiDebugToolbarRoute',
                    'ipFilters' => array('10.*', '192.168.*', '::1'),
                    'enabled'   => false,
                ),
            ),
        ), // end of log route array

        // Database connection
        'db' => array(
            'connectionString'      => 'mysql:host=localhost;dbname=yiiapp',
            'emulatePrepare'        => true,
            'username'              => 'username',
            'password'              => 'password',
            'charset'               => 'utf8',
            'tablePrefix'           => null,
            'enableParamLogging'    => true,
            'enableProfiling'       => true,
            // 'queryCacheID'          => 'redis',
            // 'schemaCacheID'         => 'redis',
            // 'schemaCachingDuration' =>  3600,
        ),

        // User authentication and login
        'user' => array(
            'class'             => 'WebUser',
            'allowAutoLogin'    => true,
        ),

        // Route for error handler
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),

        // Authorization manager for RBAC
        'authManager'=>array(
            'class'=>'CDbAuthManager',
        ),

        // Redis cache
        'cache'=>array(
            'class'     =>'CRedisCache',
            'hostname'  =>'localhost',
            'port'      => 6379,
            'database'  => 0,
        ),

        // *** THIRD PARTY COMPONENTS
        'bootstrap'     => array(
            // 'class'     => 'bootstrap.components.TbApi',
            'class'     => 'ext.netwing.yiistrap.Yiistrap',
        ),

        'swiftMailer'   => array(
            'class'     => 'ext.swiftMailer.SwiftMailer',
        ),

        // *** NETWING COMPONENTS ***

        // Redis component - Actually using Predis for more advanced features
        'redis'         => array(
            'class'     => 'ext.netwing.redis.Redis',
            'servers'   => array(
                'host'  =>  'localhost',
                'port'  =>  6379,
            ),
            'database'  => 1, // 0 is used for caching purpose, see 'cache' component config
            'prefix'    => "",
        ),

        // Font awesome component for publish assets and register link to css
        'fontAwesome'   => array(
            'class'     => 'ext.netwing.font-awesome.FontAwesome',
        ),

        // Timepicker component for publish assets and register link to css
        'timepicker'   => array(
            'class'     => 'ext.netwing.timepicker.Timepicker',
        ),

        // Custom formatter
        'format' => array(
            'class' => 'MyFormatter',
        ),

        // Cron
        'cron'  => array(
            'class' => 'ext.netwing.cron.Cron',
        ),

        // jQuery Full Calendar
        'calendar' => array(
            'class' => 'ext.netwing.calendar.Calendar',
        ),

        // jQuery Select2
        'select2' => array(
            'class' => 'ext.netwing.select2.Select2',
        ),

    ),

    // *** APPLICATION PARAMETER
    // This can be accessed using Yii::app()->params['paramName']
    'params'    => array(
        // this is used in contact page
        'adminEmail'  => 'info@netwing.it',
    ),    

);

if (!file_exists(dirname(__FILE__) . '/config.php')) {
    if (PHP_SAPI == 'cli') {
        echo "*** Configuration not found! ***" . PHP_EOL;
        echo "Please copy ./protected/config/config-example.php in ./protected/config/config.php and set the correct configuration parameters." . PHP_EOL . PHP_EOL;
    } else {
        echo "<html><head></head><body>";
        echo "<h1>Configuration not found!</h1>";
        echo "<p>Please copy <strong>./protected/config/config-example.php</strong> to <strong>./protected/config/config.php</strong> and set the correct configuration parameters.</p>";
        echo "</body></html>";
    }
    exit;
}

// Load user configuration
// in this file, you can overwrite any configuration
require_once "config.php";

$config['timeZone'] = APPLICATION_TIMEZONE;

$config['components']['log']['routes']['error']['maxFileSize']       = LOG_MAX_FILE_SIZE;
$config['components']['log']['routes']['error']['maxLogFiles']       = LOG_MAX_LOG_FILES;
$config['components']['log']['routes']['error']['enabled']           = LOG_ERROR_ENABLED;
$config['components']['log']['routes']['application']['maxFileSize'] = LOG_MAX_FILE_SIZE;
$config['components']['log']['routes']['application']['maxLogFiles'] = LOG_MAX_LOG_FILES;
$config['components']['log']['routes']['application']['enabled']     = LOG_APPLICATION_ENABLED;
$config['components']['log']['routes']['query']['maxFileSize']       = LOG_MAX_FILE_SIZE;
$config['components']['log']['routes']['query']['maxLogFiles']       = LOG_MAX_LOG_FILES;
$config['components']['log']['routes']['query']['enabled']           = LOG_QUERY_ENABLED;
$config['components']['log']['routes']['debug']['maxFileSize']       = LOG_MAX_FILE_SIZE;
$config['components']['log']['routes']['debug']['maxLogFiles']       = LOG_MAX_LOG_FILES;
$config['components']['log']['routes']['debug']['enabled']           = LOG_DEBUG_ENABLED;
$config['components']['log']['routes']['toolbar']['enabled']         = LOG_TOOLBAR_ENABLED;

if (DB_HOST === null) {
    unset($config['components']['db']);
} else {
    $config['components']['db']['connectionString'] = 'mysql:host=' . DB_HOST . ';dbname=' . DB_DATABASE_NAME;
    $config['components']['db']['emulatePrepare'] = DB_EMULATE_PREPARE;
    $config['components']['db']['username'] = DB_USERNAME;
    $config['components']['db']['password'] = DB_PASSWORD;
    $config['components']['db']['charset'] = DB_CHARSET;
    $config['components']['db']['tablePrefix'] = DB_TABLE_PREFIX;
    $config['components']['db']['enableParamLogging'] = DB_ENABLE_PARAM_LOGGING;
    $config['components']['db']['enableProfiling'] = DB_ENABLE_PROFILING;

    $config['components']['authManager']['itemTable'] = DB_TABLE_PREFIX . "auth_item";
    $config['components']['authManager']['itemChildTable'] = DB_TABLE_PREFIX . "auth_item_child";
    $config['components']['authManager']['assignmentTable'] = DB_TABLE_PREFIX . "auth_assignment";

}

if (REDIS_HOST === null) {
    unset($config['components']['redis']);
} else {
    $config['components']['redis']['servers']['host'] = REDIS_HOST;
    $config['components']['redis']['servers']['port'] = REDIS_PORT;
    $config['components']['redis']['database']        = REDIS_DATABASE;
    $config['components']['redis']['prefix']          = REDIS_KEY_PREFIX;    
}
