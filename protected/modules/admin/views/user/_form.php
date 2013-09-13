<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'user-form',
	'enableAjaxValidation' => true,
    'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldControlGroup($model,'name',array('class'=>'span5','maxlength'=>255, 'help' => Yii::t('form', 'The name for this user.'))); ?>

	<?php if ($model->isNewRecord): ?>
        <?php echo $form->textFieldControlGroup($model,'username',array('class'=>'span5','maxlength'=>255, 'help' => Yii::t('form', 'The login username for this user.'))); ?>
    <?php else: ?>
        <?php echo $form->textFieldControlGroup($model,'username',array('class'=>'span5','maxlength'=>255, 'disabled' => 'disabled', 'help' => Yii::t('form', 'Username cannot be changed.'))); ?>
    <?php endif; ?>

    <?php if ($model->isNewRecord): ?>
	<?php echo $form->passwordFieldControlGroup($model, 'password', 
        array('class'=>'span5','maxlength'=>255, 'help' => Yii::t('form', 'The login password for this user'))); ?>
    <?php else: ?>
    <?php echo $form->passwordFieldControlGroup($model, 'password', 
        array('class'=>'span5','maxlength'=>255, 'help' => Yii::t('form', 'Insert a new password or leave empty for no change'))); ?>
    <?php endif; ?>

    <?php
    $roles = Yii::app()->authManager->roles;
    $my_roles = array();
    foreach ($roles as $k => $v) {
        $my_roles[$v->name] = $v->name . ": " . $v->description;
    }
    ?>
    <?php if ($model->isNewRecord or $model->username != 'administrator'): ?>
    	<?php echo $form->dropDownListControlGroup($model, 'role', $my_roles, array(
            'class'=>'span12',
            'maxlength'=>255,
            'multiple' => 'multiple',
            'help' => Yii::t('form', "Select one or more roles for this user."),
        )); ?>
    <?php else: ?>
        <?php echo $form->dropDownListControlGroup($model, 'role', $my_roles, array(
            'class'=>'span12',
            'maxlength'=>255,
            'multiple' => 'multiple',
            'disabled'  => 'disabled',
            'help' => Yii::t('form', "Role for 'administrator' cannot be changed."),
        )); ?>
    <?php endif; ?>

    <?php Yii::app()->select2->register(); ?>
    <?php Yii::app()->clientScript->registerScript('mount_script', 
    '$("#User_role").select2({
        asDropDownList: true, 
        placeholder: "' . Yii::t('form', 'Type or select roles for this user.') . '",
        tokenSeparators: [",", " "]
    });', CClientScript::POS_READY); ?>


    <?php echo TbHtml::formActions(array(
        TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
        TbHtml::resetButton('Reset'),
    )); ?>

<?php $this->endWidget(); ?>
