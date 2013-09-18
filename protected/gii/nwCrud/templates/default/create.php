<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */

<?php echo "\$this->pageTitle = Yii::t('app', 'Create " . $this->pluralize($this->class2name($this->modelClass)) . "');\n"; ?>

<?php
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	'Create',
);\n";
?>

$this->menu=array(
    array('label'=>'Manage <?php echo $this->modelClass; ?>', 'url'=>array('admin')),
    array('label'=>'Create <?php echo $this->modelClass; ?>', 'url'=>array('create')),
);
?>

<?php echo "<?php \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>
