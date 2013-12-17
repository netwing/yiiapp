<?php $form = $this->beginWidget('CActiveForm', array(
    'id'=>'auth-item-form',
    'enableClientValidation'=>true,
    'enableAjaxValidation'=>true,
    'htmlOptions'=>array('class'=>'form-horizontal well'),
    'errorMessageCssClass' => 'text-danger'
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model, null, null, array('class' => 'text-danger')); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model,'name', array('class' => 'col-lg-2 control-label')); ?>
        <div class="col-lg-10">
        <?php if ($model->isNewRecord): ?>
            <?php echo $form->textField($model,'name', array('class' => 'form-control')); ?>
            <?php echo $form->error($model,'name'); ?>
            <p class="help-block"><?php echo Yii::t('form', 'The name for this role'); ?></p>
        <?php else: ?>
            <?php echo $form->textField($model,'name', array('class' => 'form-control', 'disabled' => 'disabled')); ?>
            <?php echo $form->error($model,'name'); ?>
            <p class="help-block"><?php echo Yii::t('form', 'Role name cannot be changed'); ?></p>
        <?php endif; ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'description', array('class' => 'col-lg-2 control-label')); ?>
        <div class="col-lg-10">
        <?php echo $form->textArea($model,'description', array('class' => 'form-control')); ?>
        <?php echo $form->error($model,'description'); ?>
        </div>
    </div>

    <?php if (!$model->isNewRecord): ?>
    <p class="help-block"><?php echo Yii::t('form', 'Set permissions for this role.'); ?></p>

        <?php 
        $tasks = Yii::app()->authManager->tasks;
        $i = 0;
        foreach ($tasks as $task_name => $task): 
            $operations = array();
            $allowed = array();
            foreach ($task->children as $k => $v) {
                $operations[$v->name] = Yii::t('app', $v->description);
                if (Yii::app()->authManager->hasItemChild($model->name, $v->name)) {
                    $allowed[] = $v->name;
                }
            }
            $i++;
        ?>
        <div class="form-group">
        <?php echo CHtml::label(Yii::t('app', $task->description), "authChild" . $i, array('class' => 'col-lg-2 control-label')); ?>
            <div class="col-lg-10">
                <?php 
                echo CHtml::checkBoxList("authChild" . $i, $allowed, $operations, array(
                        'label' => $task->description, 
                        'separator' => false,
                        'labelOptions' => array('class' => 'checkbox-inline'),
                        'template' => '{beginLabel} {input} {labelTitle} {endLabel}',
                    )
                ); 
                ?>
            </div>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <button type="reset" class="btn btn-warning"><?php echo Yii::t('form', 'Reset'); ?></button>
            <button type="submit" class="btn btn-primary"><?php echo Yii::t('form', 'Submit'); ?></button>
        </div>
    </div>

<?php $this->endWidget(); ?>

