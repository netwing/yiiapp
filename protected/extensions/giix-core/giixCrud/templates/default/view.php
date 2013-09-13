<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php
echo "<?php\n
\$this->title = Yii::t('app', 'View') . ' ' . GxHtml::encode(\$model->label(1));\n
\$this->breadcrumbs = array(
	\$model->label(2) => array('index'),
	GxHtml::valueEx(\$model),
);\n";
?>

$this->menu = array(
    array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
    array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
);
?>

<?php echo '<?php'; ?> $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
    'htmlOptions' => array(
        'class' => 'table table-bordered table-hover table-condensed'
    ),
	'attributes' => array(
<?php
foreach ($this->tableSchema->columns as $column)
		echo $this->generateDetailViewAttribute($this->modelClass, $column) . ",\n";
?>
	),
)); ?>

<?php foreach (GxActiveRecord::model($this->modelClass)->relations() as $relationName => $relation): ?>
<?php if ($relation[0] == GxActiveRecord::HAS_MANY || $relation[0] == GxActiveRecord::MANY_MANY): ?>
<h2><?php echo '<?php'; ?> echo GxHtml::encode($model->getRelationLabel('<?php echo $relationName; ?>')); ?></h2>
<?php echo "<?php\n"; ?>
	echo GxHtml::openTag('ul');
	foreach($model-><?php echo $relationName; ?> as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('<?php echo strtolower($relation[1][0]) . substr($relation[1], 1); ?>/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
<?php echo '?>'; ?>
<?php endif; ?>
<?php endforeach; ?>