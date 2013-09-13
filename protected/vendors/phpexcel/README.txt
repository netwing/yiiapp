In order to work with Yii, you must change:

File: Classes/PHPExcel/Autoloader.php:58

FROM: return spl_autoload_register(array('PHPExcel_Autoloader', 'Load'));
TO    return spl_autoload_register(array('PHPExcel_Autoloader', 'Load'), true, true);
