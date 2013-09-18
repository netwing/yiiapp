<?php $this->pageTitle = "Date time test"; ?>

<p>
<strong>Short:</strong> <?php echo Yii::app()->format->dateShort("2013-06-01"); ?>  
<strong>Medium:</strong> <?php echo Yii::app()->format->date("2013-06-01"); ?>  
<strong>Long:</strong> <?php echo Yii::app()->format->dateLong("2013-06-01"); ?>  
<strong>Full:</strong> <?php echo Yii::app()->format->dateFull("2013-06-01"); ?>  
</p>

<p>
<strong>Short:</strong> <?php echo Yii::app()->format->timeShort("13:45:59"); ?>  
<strong>Medium:</strong> <?php echo Yii::app()->format->time("13:45:59"); ?>  
<strong>Long:</strong> <?php echo Yii::app()->format->timeLong("13:45:59"); ?>  
<strong>Full:</strong> <?php echo Yii::app()->format->timeFull("13:45:59"); ?>
</p>


<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'datetime-form',
    'enableAjaxValidation'  => true,
    'htmlOptions'=>array('class'=>'form-horizontal well'),
    'errorMessageCssClass' => 'text-danger'
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model,'my_date', array('class' => 'col-lg-2 control-label')); ?>
        <div class="col-lg-10">
        <?php $datepicker = $this->widget('ext.netwing.widgets.JuiDatePicker', array(
            'htmlOptions' => array('class' => 'form-control'),
            'model' => $model,
            'attribute' => 'my_date',
        )); ?>
        <?php echo $form->error($model,'my_date'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'my_another_date', array('class' => 'col-lg-2 control-label')); ?>
        <div class="col-lg-10">
        <?php $datepicker = $this->widget('ext.netwing.widgets.JuiDatePicker', array(
            'htmlOptions' => array('class' => 'form-control'),
            'name' => 'my_another_date',
            'value' => '2013-10-11',
        )); ?>
        <?php echo $form->error($model,'my_another_date'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'my_time', array('class' => 'col-lg-2 control-label')); ?>
        <div class="col-lg-10">
        <?php $timepicker = $this->widget('ext.netwing.widgets.JuiTimePicker', array(
            'htmlOptions' => array('class' => 'form-control'),
            'model' => $model,
            'attribute' => 'my_time',
        )); ?>
        <?php echo $form->error($model,'my_time'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'my_another_time', array('class' => 'col-lg-2 control-label')); ?>
        <div class="col-lg-10">
        <?php $timepicker = $this->widget('ext.netwing.widgets.JuiTimePicker', array(
            'htmlOptions' => array('class' => 'form-control'),
            'name' => 'my_another_time',
            'value' => '18:29:59',
        )); ?>
        <?php echo $form->error($model,'my_another_time'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <button type="reset" class="btn btn-warning"><?php echo Yii::t('form', 'Reset'); ?></button>
            <button type="submit" class="btn btn-primary"><?php echo Yii::t('form', 'Submit'); ?></button>
        </div>
    </div>

    <?php $this->endWidget(); ?>

<?php if (count($_POST) > 0): ?>
<?php CVarDumper::dump($_POST, 10, true); ?>
<?php endif; ?>
