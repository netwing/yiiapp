<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */
/* @var $form CActiveForm */
?>

<div class="form">

<?php echo "<?php \$form=\$this->beginWidget('CActiveForm', array(
	'id'=>'".$this->class2id($this->modelClass)."-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
    'enableClientValidation'=>false,
    'enableAjaxValidation'=>true,
    'htmlOptions'=>array('class'=>'form-horizontal well'),
    'errorMessageCssClass' => 'text-danger'
)); ?>\n"; ?>

	<p class="help-block"><?php echo "<?php echo Yii::t('app', 'Fields with <span class=\"required\">*</span> are required.'); ?>\n"; ?></p>

	<?php echo "<?php echo \$form->errorSummary(\$model, null, null, array('class' => 'text-danger')); ?>\n"; ?>

<?php
foreach($this->tableSchema->columns as $column)
{
	if($column->autoIncrement)
		continue;
?>
    <div class="form-group">
        <?php echo "<?php echo \$form->labelEx(\$model, '" . $column->name . "', array('class' => 'col-lg-2 control-label')); ?>\n"; ?>
        <div class="col-lg-10">
        <?php echo "<?php echo \$form->textField(\$model, '" . $column->name . "', array('class' => 'form-control')); ?>\n"; ?>
        <?php echo "<?php echo \$form->error(\$model,'" . $column->name . "'); ?>\n"; ?>
        <p class="help-block"><?php echo "<?php echo Yii::t('app', '" . $column->comment . "'); ?>"; ?></p>
        </div>
    </div>

<?php
}
?>
    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <button type="reset" class="btn btn-warning"><?php echo Yii::t('app', 'Reset'); ?></button>
            <button type="submit" class="btn btn-primary"><?php echo "<?php echo (\$model->isNewRecord) ? Yii::t('app', 'Create') : Yii::t('app', 'Save'); ?>"; ?></button>
        </div>
    </div>

<?php echo "<?php \$this->endWidget(); ?>\n"; ?>

</div><!-- form -->
