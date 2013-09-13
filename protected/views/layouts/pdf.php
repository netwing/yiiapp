<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
    <?php // Yii::app()->bootstrap->register(); // Yiistrap  ?>
    <?php // Yii::app()->fontAwesome->register();  // Netwing Font Awesome ?>
    
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">       
    <?php echo $content; ?>
</div>

</body>
</html>
