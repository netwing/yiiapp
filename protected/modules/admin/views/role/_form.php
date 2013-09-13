<?php
/* @var $this RoleController */
/* @var $model AuthItem */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'role-form',
    'enableAjaxValidation' => true,
    'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

        <?php if ($model->isNewRecord): ?>
            <?php echo $form->textFieldControlGroup($model,'name',array('span'=>5,'maxlength'=>64)); ?>
        <?php else: ?>
            <?php echo $form->textFieldControlGroup($model,'name',array('span'=>5,'maxlength'=>64, 'disabled' => 'disabled',)); ?>
        <?php endif; ?>
            <?php echo $form->textAreaControlGroup($model,'description',array('rows'=>2,'span'=>8)); ?>

    <p class="help-block"><?php echo Yii::t('form', 'Set permissions for this role.'); ?></p>
        <?php 
        $tasks = Yii::app()->authManager->tasks;
        $i = 0;
        foreach ($tasks as $task_name => $task) {
            $operations = array();
            $allowed = array();
            foreach ($task->children as $k => $v) {
                $operations[$v->name] = $v->description;
                if (Yii::app()->authManager->hasItemChild($model->name, $v->name)) {
                    $allowed[] = $v->name;
                }
            }
            $i++;
            echo TbHtml::inlinecheckBoxListControlGroup("authChild" . $i, $allowed, $operations, array('label' => $task->description));
        }
        ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->