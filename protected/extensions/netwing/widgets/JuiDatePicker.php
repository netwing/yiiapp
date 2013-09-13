<?php
/**
 * CJuiDatePicker class file.
 *
 * @author Sebastian Thierer <sebathi@gmail.com>
 * @link http://www.yiiframework.com/
 * @copyright 2008-2013 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

Yii::import('zii.widgets.jui.CJuiDatePicker');

/**
 * CJuiDatePicker displays a datepicker.
 *
 * CJuiDatePicker encapsulates the {@link http://jqueryui.com/datepicker/ JUI
 * datepicker} plugin.
 *
 * To use this widget, you may insert the following code in a view:
 * <pre>
 * $this->widget('zii.widgets.jui.CJuiDatePicker',array(
 *     'name'=>'publishDate',
 *     // additional javascript options for the date picker plugin
 *     'options'=>array(
 *         'showAnim'=>'fold',
 *     ),
 *     'htmlOptions'=>array(
 *         'style'=>'height:20px;'
 *     ),
 * ));
 * </pre>
 *
 * By configuring the {@link options} property, you may specify the options
 * that need to be passed to the JUI datepicker plugin. Please refer to
 * the {@link http://api.jqueryui.com/datepicker/ JUI DatePicker API}
 * documentation for possible options (name-value pairs) and
 * {@link http://jqueryui.com/datepicker/ JUI DatePicker page} for general
 * description and demo.
 *
 * @author Sebastian Thierer <sebathi@gmail.com>
 * @package zii.widgets.jui
 * @since 1.1
 */
class JuiDatePicker extends CJuiDatePicker
{
	/**
	 * Run this widget.
	 * This method registers necessary javascript and renders the needed HTML code.
	 */
	public function run()
	{

        list($name,$id)=$this->resolveNameID();

        if(isset($this->htmlOptions['id']))
            $id=$this->htmlOptions['id'];
        else
            $this->htmlOptions['id']=$id;
        if(isset($this->htmlOptions['name']))
            $name=$this->htmlOptions['name'];

        if (!isset($this->options['showButtonPanel'])) {
            $this->options['showButtonPanel'] = true;
        }
        if (!isset($this->options['altField'])) {
            $this->options['altField'] = '#' . $id;
        }
        if (!isset($this->options['altFormat'])) {
            $this->options['altFormat'] = "yy-mm-dd";
        }
        if (!isset($this->options['defaultDate'])) {
            if ($this->hasModel()) {
                $attribute=$this->attribute;
                $this->options['defaultDate'] = $this->model->$attribute;
            } else {
                $this->options['defaultDate'] = $this->value;
            }
        }

        if (!isset($this->language)) {
            $this->language = null;
        }
        if ($this->language === null) {
            $this->language = Yii::app()->language;
        }

        if($this->flat===false)
        {
            $myId = $id . "_user";
            $htmlOptions = $this->htmlOptions;
            $htmlOptions['id'] = $myId;
            $htmlOptions['name'] = $myId;
            echo CHtml::textField($myId, $this->value, $htmlOptions);
            if($this->hasModel())
                echo CHtml::activeHiddenField($this->model,$this->attribute,$this->htmlOptions);
            else
                echo CHtml::hiddenField($name,$this->value,$this->htmlOptions);
        }
        else
        {
            /*
            if($this->hasModel())
            {
                echo CHtml::activeHiddenField($this->model,$this->attribute,$this->htmlOptions);
                $attribute=$this->attribute;
                $this->options['defaultDate']=$this->model->$attribute;
            }
            else
            {
                echo CHtml::hiddenField($name,$this->value,$this->htmlOptions);
                $this->options['defaultDate']=$this->value;
            }

            $this->options['altField']='#'.$id;

            $id=$this->htmlOptions['id']=$id.'_container';
            $this->htmlOptions['name']=$name.'_container';

            echo CHtml::tag('div',$this->htmlOptions,'');
            */
            throw new Exception("This widget do not support FLAT mode yet");
        }

        $options=CJavaScript::encode($this->options);
        $js = "jQuery('#{$id}_user').datepicker($options);";

        if($this->language!='' && $this->language!='en')
        {
            $this->registerScriptFile($this->i18nScriptFile);
            $js = "jQuery('#{$id}_user').datepicker(jQuery.extend({showMonthAfterYear:false},jQuery.datepicker.regional['{$this->language}'],{$options}));";
        }

        if ($this->options['defaultDate'] != "") {
            list($y, $m, $d) = explode("-", $this->options['defaultDate']);
            $js.= '$("#' . $id . '_user").datepicker("setDate", new Date(' . $y . ', ' . ($m-1) . ', ' . $d .'));'; // '';
        }

        $cs = Yii::app()->getClientScript();

        if(isset($this->defaultOptions))
        {
            $this->registerScriptFile($this->i18nScriptFile);
            $cs->registerScript(__CLASS__,$this->defaultOptions!==null?'jQuery.datepicker.setDefaults('.CJavaScript::encode($this->defaultOptions).');':'');
        }
        $cs->registerScript(__CLASS__.'#'.$id,$js);        

	}
}