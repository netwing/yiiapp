<?php $form=$this->beginWidget('CActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
    'htmlOptions'=>array('class'=>'form-horizontal well'),
)); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model,'name', array('class' => 'col-lg-2 control-label')); ?>
        <div class="col-lg-4">
        <?php echo $form->textField($model,'name', array('class' => 'form-control')); ?>
        <?php echo $form->error($model,'name'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'username', array('class' => 'col-lg-2 control-label')); ?>
        <div class="col-lg-4">
        <?php echo $form->textField($model,'username', array('class' => 'form-control')); ?>
        <?php echo $form->error($model,'username'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-4">
            <button type="submit" class="btn btn-primary"><?php echo Yii::t('app', 'Search');?></button>
        </div>
    </div>

<?php $this->endWidget(); ?>
