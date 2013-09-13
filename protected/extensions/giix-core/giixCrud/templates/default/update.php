<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php
echo "<?php\n
\$this->title = Yii::t('app', 'Update') . ' ' . GxHtml::encode(\$model->label(1));\n
\$this->breadcrumbs = array(
	\$model->label(2) => array('index'),
	GxHtml::valueEx(\$model) => array('view', 'id' => GxActiveRecord::extractPkValue(\$model, true)),
	Yii::t('app', 'Update'),
);\n";
?>

$this->menu = array(
    array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('index')),
    array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
);
?>

<?php echo "<?php\n"; ?>
$this->renderPartial('_form', array(
		'model' => $model));
?>