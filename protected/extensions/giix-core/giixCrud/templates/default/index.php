<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php
echo "<?php\n
\$this->title = Yii::t('app', 'Manage') . ' ' . GxHtml::encode(" . $this->modelClass . "::label(2));\n
\$this->breadcrumbs = array(
	{$this->modelClass}::label(2),
	Yii::t('app', 'Index'),
);\n";
?>

$this->menu = array(
    array('label'=>Yii::t('app', 'Manage') . ' ' . <?php echo $this->modelClass; ?>::label(2), 'url' => array('admin')),
	array('label'=>Yii::t('app', 'Create') . ' ' . <?php echo $this->modelClass; ?>::label(), 'url' => array('create')),
);
?>

<?php echo "<?php"; ?> $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); <?php '?>'; ?>