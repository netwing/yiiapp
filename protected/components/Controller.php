<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

	public function init() 	
    {

		parent::init();
		Yii::import('ext.netwing.LanguagePicker.ELanguagePicker'); 
   	    ELanguagePicker::setLanguage();

        // If POST or GET ajax request, OR from command line REMOVE Yii::app->theme
        if (Yii::app()->request->getParam('ajax', null) !== null or Yii::app()->request->isAjaxRequest or PHP_SAPI == 'cli') {
            if (isset(Yii::app()->theme)) {
                unset(Yii::app()->theme);
            }
        }

        // If 'theme' do not exists in Yii::app()
        if (isset(Yii::app()->theme)) {
            Yii::import('ext.netwing.ThemePicker.EThemePicker');
            EThemePicker::setTheme();
        } 
	}
}
