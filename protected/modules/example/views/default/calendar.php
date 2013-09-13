<?php Yii::app()->calendar->register(); ?>
<div id='calendar'></div>

<?php Yii::app()->clientScript->registerScript('calendar', '
$("#calendar").fullCalendar({
    monthNames: ' . CJavaScript::encode(array_values(Yii::app()->locale->getMonthNames())) . ',
    monthNamesShort: ' . CJavaScript::encode(array_values(Yii::app()->locale->getMonthNames('abbreviated'))) . ',
    dayNames: ' . CJavaScript::encode(array_values(Yii::app()->locale->getWeekDayNames())) . ',
    dayNamesShort: ' . CJavaScript::encode(array_values(Yii::app()->locale->getWeekDayNames('abbreviated'))) . '
});
', CClientScript::POS_READY); ?>
