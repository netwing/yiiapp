<?php
/**
 * CJuitimepicker class file.
 *
 * @author Sebastian Thierer <sebathi@gmail.com>
 * @link http://www.yiiframework.com/
 * @copyright 2008-2013 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

Yii::import('zii.widgets.jui.CJuiDatePicker');

/**
 * CJuitimepicker displays a timepicker.
 *
 * CJuitimepicker encapsulates the {@link http://jqueryui.com/timepicker/ JUI
 * timepicker} plugin.
 *
 * To use this widget, you may insert the following code in a view:
 * <pre>
 * $this->widget('zii.widgets.jui.CJuitimepicker',array(
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
 * that need to be passed to the JUI timepicker plugin. Please refer to
 * the {@link http://api.jqueryui.com/timepicker/ JUI timepicker API}
 * documentation for possible options (name-value pairs) and
 * {@link http://jqueryui.com/timepicker/ JUI timepicker page} for general
 * description and demo.
 *
 * @author Sebastian Thierer <sebathi@gmail.com>
 * @package zii.widgets.jui
 * @since 1.1
 */
class JuiTimePicker extends CJuiDatePicker
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
        if (!isset($this->options['altTimeFormat'])) {
            $this->options['altTimeFormat'] = "HH:mm:ss";
        }
        if (!isset($this->options['timeOnly'])) {
            $this->options['timeOnly'] = true;
        }
        if (!isset($this->options['altFieldTimeOnly'])) {
            $this->options['altFieldTimeOnly'] = true;
        }
        if (!isset($this->options['showSecond'])) {
            $this->options['showSecond'] = false;
        }

        if (!isset($this->options['defaultValue'])) {
            if ($this->hasModel()) {
                $attribute=$this->attribute;
                $this->options['defaultValue'] = $this->model->$attribute;
            } else {
                $this->options['defaultValue'] = $this->value;
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
                $this->options['defaultValue']=$this->model->$attribute;
            }
            else
            {
                echo CHtml::hiddenField($name,$this->value,$this->htmlOptions);
                $this->options['defaultValue']=$this->value;
            }

            $this->options['altField']='#'.$id;

            $id=$this->htmlOptions['id']=$id.'_container';
            $this->htmlOptions['name']=$name.'_container';

            echo CHtml::tag('div',$this->htmlOptions,'');
            */
            throw new Exception("This widget do not support FLAT mode yet");
        }

        // Publish assets
        $assetsPath = Yii::getPathOfAlias('application.vendors.timepicker.dist');
        $assetsUrl = Yii::app()->assetManager->publish($assetsPath, true, -1);

        // Register css
        $fileName = YII_DEBUG ? 'jquery-ui-timepicker-addon.css' : 'jquery-ui-timepicker-addon.min.css';
        $url = $assetsUrl . "/" . $fileName;
        Yii::app()->getClientScript()->registerCssFile($url);

        // Register js
        $fileName = YII_DEBUG ? 'jquery-ui-timepicker-addon.js' : 'jquery-ui-timepicker-addon.min.js';
        $url = $assetsUrl . "/" . $fileName;
        Yii::app()->getClientScript()->registerScriptFile($url, CClientScript::POS_END);

        $options=CJavaScript::encode($this->options);
        $js = "jQuery('#{$id}_user').timepicker($options);";

        if($this->language!='' && $this->language!='en')
        {
            $fileName = 'i18n/jquery-ui-timepicker-' . $this->language . '.js';
            $url = $assetsUrl . "/" . $fileName;
            Yii::app()->getClientScript()->registerScriptFile($url, CClientScript::POS_END);
            $js = "jQuery('#{$id}_user').timepicker(jQuery.extend(jQuery.timepicker.regional['{$this->language}'],{$options}));";
        }

        if ($this->options['defaultValue'] != "") {
            list($h, $m, $s) = explode(":", $this->options['defaultValue']);
            $js.= '$("#' . $id . '_user").timepicker("setDate", new Date(2001, 01, 01, ' . $h . ', ' . $m . ', ' . $s .'));';
        }

        $cs = Yii::app()->getClientScript();

        if(isset($this->defaultOptions))
        {
            $fileName = 'i18n/jquery-ui-timepicker-' . $this->language . '.js';
            $url = $assetsUrl . "/" . $fileName;
            Yii::app()->getClientScript()->registerScriptFile($url, CClientScript::POS_END);
            $cs->registerScript(__CLASS__,$this->defaultOptions!==null?'jQuery.timepicker.setDefaults('.CJavaScript::encode($this->defaultOptions).');':'');
        }
        $cs->registerScript(__CLASS__.'#'.$id,$js);        

	}
}