<?php

// Example of custom configuration files
// If you want to override any configuration
// rewrite only what you want to change and put in $config

// ***************************
// *** COSTANTS DEFINITION ***
// ***************************

// Application timezone
define('APPLICATION_TIMEZONE', 'Europe/London');

// LOG rotation
// Define how much big a log file can become before rotate
define('LOG_MAX_FILE_SIZE', 20480);
// Define how much rotated log files you want to keep
define('LOG_MAX_LOG_FILES', 10);
// Enable/Disable specific log routes
define('LOG_ERROR_ENABLED', true);
define('LOG_APPLICATION_ENABLED', false);
define('LOG_QUERY_ENABLED', false);
define('LOG_DEBUG_ENABLED', false);
define('LOG_TOOLBAR_ENABLED', false);

// Database connection
// This user must be created on MySQL 
// and granted all privileges on database
define('DB_HOST', "localhost"); // Set this to NULL to disable database connection
define('DB_DATABASE_NAME', "dbname");
define('DB_USERNAME', "username");
define('DB_PASSWORD', "password");
define('DB_TABLE_PREFIX', "prefix_");
define('DB_EMULATE_PREPARE', true);
define('DB_CHARSET', "utf8");
define('DB_ENABLE_PARAM_LOGGING', true);
define('DB_ENABLE_PROFILING', true);

// Email sending parameters
define("EMAIL_SMTP_SERVER", null);
define("EMAIL_SMTP_PORT", 25);
define("EMAIL_SMTP_USERNAME", null);
define("EMAIL_SMTP_PASSWORD", null);

// REDIS Key-Value caching engine 
// You need a running Redis server on host and port
// you also need to know which database ID use
define('REDIS_HOST', 'localhost'); // Set this to NULL to disable redis connection
define('REDIS_PORT', 6379);
define('REDIS_DATABASE', 0);
define('REDIS_KEY_PREFIX', 'YIIAPP:');

// Node.js socket.io configuration
// URL of node server at which the browser must connect
define("NODE_SERVER", null);
// Port of node server at which the browser must connect
define("NODE_PORT", null);

// APPLICATION settings
define("APPLICATION_ALARM_EMAIL", "info@netwing.it");
// Username:password for root login (Superadministrator without limit) set to null to disable
define("APPLICATION_ROOT_LOGIN", null);

// *********************
// *** CONFIGURATION ***
// *********************
// Config debug and trace level FOR WEBAPP
$yii_debug = true;
$yii_trace_level = 1;

// Config debug and trace level FOR CONSOLE
$yiic_debug = true;
$yiic_trace_level = 0;
