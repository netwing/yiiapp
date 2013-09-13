<?php

// Custom configuration files for console
// If you want to override any configuration
// rewrite only what you want to change and put in $config

// Require main and custom configuration
require_once 'main.php';

$config['commandMap'] = array(
    'migrate' => array(
        'class'             => 'system.cli.commands.MigrateCommand',
        'migrationTable'    => DB_TABLE_PREFIX . 'migration',
    ),
);

// ***************************
// *** COSTANTS DEFINITION ***
// ***************************
define("APPLICATION_CONSOLE", true);

// *********************
// *** CONFIGURATION ***
// *********************
// Config debug and trace level
$yii_debug = $yiic_debug;
$yii_trace_level = $yiic_trace_level;

$config['params']['console'] = true;
$config['import'][] = 'ext.EConsoleCommand.EConsoleCommand';

if (isset($config['theme'])) {
    unset($config['theme']);    
}
