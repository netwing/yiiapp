<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php
echo "<?php\n
\$this->title = Yii::t('app', 'Manage') . ' ' . GxHtml::encode(\$model->label(2));\n
\$this->breadcrumbs = array(
	\$model->label(2) => array('index'),
	Yii::t('app', 'Manage'),
);\n";
?>

$this->menu = array(
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
	array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('<?php echo $this->class2id($this->modelClass); ?>-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php echo "<?php echo GxHtml::link(Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button')); ?>"; ?>

<div class="search-form" style="display:none">
<?php echo "<?php \$this->renderPartial('_search', array(
	'model' => \$model,
)); ?>\n"; ?>
</div><!-- search-form -->

<div class="table-responsive">
<?php echo '<?php'; ?> $this->widget('zii.widgets.grid.CGridView', array(
	'id' => '<?php echo $this->class2id($this->modelClass); ?>-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
    'rowCssClass'   => array(),
    'itemsCssClass' => 'table table-hover table-bordered',
	'columns' => array(
<?php
$count = 0;
foreach ($this->tableSchema->columns as $column) {
	if (++$count == 7)
		echo "\t\t/*\n";
	echo "\t\t" . $this->generateGridViewColumn($this->modelClass, $column).",\n";
}
if ($count >= 7)
	echo "\t\t*/\n";
?>
    // Show a column with 3 icons as buttons
    array(
        'class'         => 'zii.widgets.grid.CButtonColumn',
        'htmlOptions'   => array('style' => 'white-space: nowrap'),
        'afterDelete'   => 'function(link,success,data) { if (success && data) alert(data); }',
        'buttons'       => array(
            'view'      => array(
                'options'       => array('class' => 'icon-eye-open', 'rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => Yii::t('app', 'View')),
                'label'         => false,
                'imageUrl'      => false,
            ),
            'update'      => array(
                'options'       => array('class' => 'icon-pencil', 'rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => Yii::t('app', 'Update')),
                'label'         => false,
                'imageUrl'      => false,
            ),
            'delete'      => array(
                'options'       => array('class' => 'icon-remove', 'rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => Yii::t('app', 'Delete')),
                'label'         => false,
                'imageUrl'      => false,
            )
        )
    ),
    /*
    // Show a column with dropdown actions
    array( 'header'=>'Action', 'type'=>'raw',
        'value'=>'\'
            <div class="btn-group">
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                Action <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" role="menu">
                <li><a href="\' . Yii::app()->createUrl("/admin/user/update", array("id" => $data->id)) . \'">Edit \' . $data->id . \'</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
              </ul>
            </div>
            \'', 
        ),    
    */
	),
)); ?>
</div>