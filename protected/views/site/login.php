<?php $this->pageTitle=Yii::app()->name . ' - Login'; ?>

<p><?php echo Yii::t('app', 'Please fill out the following form with your login credentials:'); ?></p>

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'login-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
    'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
    'htmlOptions'=>array('class'=>'well'),
)); ?>

    <fieldset>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php echo $form->textFieldControlGroup($model,'username'); ?>
        <?php echo $form->passwordFieldControlGroup($model,'password'); ?>

    <p class="note">You can login with <i>administrator : password</i> or <i>simpleuser : simpleuser</i></p>

    </fieldset>

    <div class="form-actions">
        <?php echo TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>
    </div>

<?php $this->endWidget(); ?>
