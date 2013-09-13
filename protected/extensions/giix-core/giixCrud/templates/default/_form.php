<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>

<?php $ajax = ($this->enable_ajax_validation) ? 'true' : 'false'; ?>

<div class="form">
<?php echo '<?php '; ?>
$form = $this->beginWidget('GxActiveForm', array(
	'id' => '<?php echo $this->class2id($this->modelClass); ?>-form',
	'enableAjaxValidation' => <?php echo $ajax; ?>,
    'htmlOptions'=>array('class'=>'form-horizontal well'),
    'errorMessageCssClass' => 'text-danger'
));
<?php echo '?>'; ?>

	<p class="note">
		<?php echo "<?php echo Yii::t('app', 'Fields with'); ?> <span class=\"required\">*</span> <?php echo Yii::t('app', 'are required'); ?>"; ?>.
	</p>

	<?php echo "<?php echo \$form->errorSummary(\$model, null, null, array('class' => 'text-danger')); ?>\n"; ?>

<?php foreach ($this->tableSchema->columns as $column): ?>
<?php if (!$column->autoIncrement): ?>
    <div class="form-group">
        <?php echo "<?php echo \$form->labelEx(\$model, '" . $column->name . "', array('class' => 'col-lg-2 control-label')); ?>\n"; ?>
        <div class="col-lg-10">
        <?php echo "<?php echo \$form->textField(\$model, '" . $column->name . "', array('class' => 'form-control')); ?>\n"; ?>
        <?php echo "<?php echo \$form->error(\$model, '" . $column->name . "'); ?>\n"; ?>
        <p class="help-block"><?php echo "<?php echo Yii::t('form', '" . $column->comment . "'); ?>"; ?></p>
        </div>
    </div>
<?php endif; ?>
<?php endforeach; ?>

<?php /*
<?php foreach ($this->getRelations($this->modelClass) as $relation): ?>
<?php if ($relation[1] == GxActiveRecord::HAS_MANY || $relation[1] == GxActiveRecord::MANY_MANY): ?>
		<label><?php echo '<?php'; ?> echo GxHtml::encode($model->getRelationLabel('<?php echo $relation[0]; ?>')); ?></label>
		<?php echo '<?php ' . $this->generateActiveRelationField($this->modelClass, $relation) . "; ?>\n"; ?>
<?php endif; ?>
<?php endforeach; ?>
*/ ?>

    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <button type="reset" class="btn btn-warning"><?php echo "<?php echo Yii::t('form', 'Reset'); ?>"; ?></button>
            <button type="submit" class="btn btn-primary"><?php echo "<?php echo Yii::t('form', 'Submit'); ?>"; ?></button>
        </div>
    </div>

<?php echo "<?php \$this->endWidget(); ?>\n"; ?>

</div>