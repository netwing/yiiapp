<?php $this->pageTitle=Yii::app()->name . ' - Login'; ?>

<p><?php echo Yii::t('app', 'Please fill out the following form with your login credentials:'); ?></p>

<?php $form = $this->beginWidget('CActiveForm', array(
    'id'=>'login-form',
    'enableClientValidation'=>true,
    'enableAjaxValidation'=>true,
    'htmlOptions'=>array('class'=>'form-horizontal well'),
    'errorMessageCssClass' => 'text-danger'
)); ?>

<fieldset>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <div class="form-group">
        <?php echo $form->labelEx($model,'username', array('class' => 'col-lg-2 control-label')); ?>
        <div class="col-lg-4">
        <?php echo $form->textField($model,'username', array('class' => 'form-control')); ?>
        <?php echo $form->error($model,'username'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'password', array('class' => 'col-lg-2 control-label')); ?>
        <div class="col-lg-4">
            <?php echo $form->passwordField($model,'password', array('class' => 'form-control')); ?>
            <?php echo $form->error($model,'password'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-4">
            <div class="checkbox">
            <?php echo $form->checkBox($model, 'rememberMe'); ?>
            <?php echo $form->labelEx($model, 'rememberMe'); ?>
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-4">
            <button type="submit" class="btn btn-primary">Sign in</button>
        </div>
    </div>

    <p class="note">You can login with <i>administrator : password</i> or <i>simpleuser : simpleuser</i></p>

</fieldset>

<?php $this->endWidget(); ?>
