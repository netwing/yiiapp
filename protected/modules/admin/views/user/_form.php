<?php $form = $this->beginWidget('CActiveForm', array(
    'id'=>'user-form',
    'enableClientValidation'=>false,
    'enableAjaxValidation'=>true,
    'htmlOptions'=>array('class'=>'form-horizontal well'),
    'errorMessageCssClass' => 'text-danger'
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model, null, null, array('class' => 'text-danger')); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model,'name', array('class' => 'col-lg-2 control-label')); ?>
        <div class="col-lg-10">
        <?php echo $form->textField($model,'name', array('class' => 'form-control')); ?>
        <?php echo $form->error($model,'name'); ?>
        <p class="help-block"><?php echo Yii::t('form', 'The name for this user'); ?></p>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'username', array('class' => 'col-lg-2 control-label')); ?>
        <div class="col-lg-10">
        <?php if ($model->isNewRecord): ?>
            <?php echo $form->textField($model,'username', array('class' => 'form-control')); ?>
            <?php echo $form->error($model,'username'); ?>
            <p class="help-block"><?php echo Yii::t('form', 'The login name for this user'); ?></p>
        <?php else: ?>
            <?php echo $form->textField($model,'username', array('class' => 'form-control', 'disabled' => 'disabled')); ?>
            <?php echo $form->error($model,'username'); ?>
            <p class="help-block"><?php echo Yii::t('form', 'Username cannot be changed'); ?></p>
        <?php endif; ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'password', array('class' => 'col-lg-2 control-label')); ?>
        <div class="col-lg-10">
        <?php if ($model->isNewRecord): ?>
            <?php echo $form->passwordField($model,'password', array('class' => 'form-control')); ?>
            <?php echo $form->error($model,'password'); ?>
            <p class="help-block"><?php echo Yii::t('form', 'The login password for this user'); ?></p>
        <?php else: ?>
            <?php echo $form->passwordField($model,'password', array('class' => 'form-control disabled')); ?>
            <?php echo $form->error($model,'password'); ?>
            <p class="help-block"><?php echo Yii::t('form', 'Insert a new password or leave empty for no change'); ?></p>
        <?php endif; ?>
        </div>
    </div>

    <?php
    $roles = Yii::app()->authManager->roles;
    $my_roles = array();
    foreach ($roles as $k => $v) {
        $my_roles[$v->name] = $v->name . ": " . $v->description;
    }
    ?>
    <div class="form-group">
        <?php echo $form->labelEx($model,'role', array('class' => 'col-lg-2 control-label')); ?>
        <div class="col-lg-10">
        <?php if ($model->isNewRecord or $model->username != 'administrator'): ?>
            <?php echo $form->dropDownList($model, 'role', $my_roles, array(
                'class' =>  'form-control',
                'maxlength'=>255,
                'multiple' => 'multiple',
            )); ?>
            <?php echo $form->error($model,'role'); ?>
            <p class="help-block"><?php echo Yii::t('form', "Select one or more roles for this user."); ?></p>
        <?php else: ?>
            <?php echo $form->dropDownList($model, 'role', $my_roles, array(
                'maxlength'=>255,
                'multiple' => 'multiple',
                'disabled'  => 'disabled',
            )); ?>
            <?php echo $form->error($model,'role'); ?>
            <p class="help-block"><?php echo Yii::t('form', "Role for 'administrator' cannot be changed."); ?></p>
        <?php endif; ?>
        </div>
    </div>

    <?php Yii::app()->select2->register(); ?>
    <?php Yii::app()->clientScript->registerScript('mount_script', 
    '$("#User_role").select2({
        asDropDownList: true, 
        placeholder: "' . Yii::t('form', 'Type or select roles for this user.') . '",
        tokenSeparators: [",", " "]
    });', CClientScript::POS_READY); ?>


    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <button type="reset" class="btn btn-warning"><?php echo Yii::t('form', 'Reset'); ?></button>
            <button type="submit" class="btn btn-primary"><?php echo Yii::t('form', 'Submit'); ?></button>
        </div>
    </div>

<?php $this->endWidget(); ?>
