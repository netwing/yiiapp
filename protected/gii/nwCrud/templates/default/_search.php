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

<div class="wide form">

<?php echo "<?php \$form=\$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl(\$this->route),
	'method'=>'get',
    'htmlOptions'=>array('class'=>'form-horizontal well'),
)); ?>\n"; ?>

<?php foreach($this->tableSchema->columns as $column): ?>
<?php
	$field=$this->generateInputField($this->modelClass,$column);
	if(strpos($field,'password')!==false)
		continue;
?>
    <div class="form-group">
        <?php echo "<?php echo \$form->labelEx(\$model, '" . $column->name . "', array('class' => 'col-lg-2 control-label')); ?>"; ?>
        <div class="col-lg-4">
        <?php echo "<?php echo \$form->textField(\$model, '" . $column->name . "', array('class' => 'form-control')); ?>"; ?>
        </div>
    </div>

<?php endforeach; ?>

    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-4">
            <button type="submit" class="btn btn-primary"><?php echo "<?php echo Yii::t('app', 'Search'); ?>"; ?></button>
        </div>
    </div>

<?php echo "<?php \$this->endWidget(); ?>\n"; ?>

</div><!-- search-form -->