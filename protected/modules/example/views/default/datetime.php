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


<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'publisher-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'  => true,
    'stateful'              => true,
    'layout'                => TbHtml::FORM_LAYOUT_HORIZONTAL
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    <?php 
        $datepicker = $this->widget('ext.netwing.widgets.JuiDatePicker', array(
            'model' => $model,
            'attribute' => 'my_date',
        ), true);
    ?>

    <?php echo TbHtml::customActiveControlGroup($datepicker, $model, 'my_date', array()); ?>

    <?php 
        $datepicker = $this->widget('ext.netwing.widgets.JuiDatePicker', array(
            'name' => 'my_another_date',
            'value' => '2013-10-11',
        ), true);
    ?>

    <?php echo TbHtml::customControlGroup($datepicker, 'my_another_date', array()); ?>

    <?php 
        $timepicker = $this->widget('ext.netwing.widgets.JuiTimePicker', array(
            'model' => $model,
            'attribute' => 'my_time',
        ), true);
    ?>

    <?php echo TbHtml::customActiveControlGroup($timepicker, $model, 'my_time', array()); ?>

    <?php 
        $timepicker = $this->widget('ext.netwing.widgets.JuiTimePicker', array(
            'name' => 'my_another_time',
            'value' => '18:29:59',
        ), true);
    ?>

    <?php echo TbHtml::customControlGroup($timepicker, 'my_another_time', array()); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton('Save', array(
            'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
            'size'=>TbHtml::BUTTON_SIZE_LARGE,
        )); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->

<?php if (count($_POST) > 0): ?>
<?php CVarDumper::dump($_POST, 10, true); ?>
<?php endif; ?>
