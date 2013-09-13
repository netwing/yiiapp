<?php

/**
 * @see CPortlet
 */
Yii::import('zii.widgets.CPortlet');

/**
 * This is a simple portlet to choose language from your messages directory
 * in controller::init() put 
 * @example
 * <pre>
 * Yii::import('ext.LanguagePicker.ELanguagePicker'); 
 * EThemePicker::setLanguage();
 * </pre>
 * @author David Constantine Kurushin http://www.zend.com/en/store/education/certification/authenticate.php/ClientCandidateID/ZEND015209/RegistrationID/238001337
 * @author Emanuele Deserti 
 * @author Mirko Tebaldi
 */
class ELanguagePicker extends CPortlet
{
	/**
	 * @var string a title for the widget
	 */
    public $title = 'Language Picker';
    /**
     * 
     * @var string the default tag name of the container
     */
    public $tagName = 'div';

    /**
     * @var array associative array language_id => language name in actual and original locale
     */
    private static $_language_list = array();

    /**
     * @var array some html options for the dropdownlist
     */
    public $dropDownOptions = array(
        'submit'=>'',
        'csrf'=>true, 
        'class'=>'form-control input-sm languageSelector' , 
        'id'=>'languageSelector',
        'style' => 'width: 150px',
    );

    /**
     * Executed autotically when using "->widget" to create 
     */
    public function init()
    {
        $this->title = null; // Yii::t('language-picker', 'Language Picker');
        
        self::$_language_list = self::getLanguageList();
        parent::init();
    }

 	/**
 	 * (non-PHPdoc)
     * Executed autotically when using "->widget" to create 
 	 * @see CPortlet::renderContent()
 	 */
    protected function renderContent()
    {
        echo CHtml::form('', 'post', array());
        echo CHtml::dropDownList('languageSelector' , Yii::app()->getLanguage(), self::$_language_list, $this->dropDownOptions);
        echo CHtml::endForm();
    }
    /**
     * set the language and save on cookie, or select from cookie
     * this should be called from  CController::init or CController::beforeAction etc.
     * @see CController::init() 
     * @see CController::beforeAction()
     * @param $cookieDays integer the amount of days the language choice will be saved, default 180 days
     */
    public static function setLanguage($cookieDays = 180){

        self::$_language_list = self::getLanguageList();        

        $posted_language                = Yii::app()->request->getPost('languageSelector');
        $posted_language_is_valid       = ($posted_language !== null);
        $posted_language_is_available   = array_key_exists($posted_language, self::$_language_list );

        // User posted a change language request
        if($posted_language_is_valid and $posted_language_is_available ){
            // echo " - Set By Post - <BR>";
            Yii::app()->setLanguage($_POST['languageSelector']);
            $cookie = new CHttpCookie('language', $_POST['languageSelector']);
            $cookie->expire = time() + 60*60*24*$cookieDays; 
            Yii::app()->request->cookies['language'] = $cookie;
            return;
        }

        // No change langauge request - Lookup into cookies
        $cookie_language                = Yii::app()->request->cookies['language'];
        $cookie_language_is_valid       = (isset(Yii::app()->request->cookies['language']) and is_string($cookie_language->value)) ;
        $cookie_language_is_available   = ($cookie_language_is_valid and array_key_exists($cookie_language->value, self::$_language_list));

        // I've a valid language cookie AND language is supported
        if( $cookie_language_is_available){
            Yii::app()->setLanguage($cookie_language->value);
            return;
        }

        // if we came to this point, the language is set in cookies, but doesn't exist, 
        // so we better unset the cookie
        if($cookie_language_is_valid){
            unset(Yii::app()->request->cookies['language']);
            throw new CHttpException(400, Yii::t('app', 'Invalid request. Translation don\'t exists!'));
            Yii::app()->exit();
        } 

        // No post AND No cookie 
        // So we set base application parameters like language
        if (isset(Yii::app()->request)) {
            if (isset(Yii::app()->request->preferredLanguage) and Yii::app()->request->preferredLanguage != "" ) {
                Yii::app()->language = substr(Yii::app()->request->preferredLanguage,0,2);
            }
        }            

    }
    /**
     * Iterates the messages directory and list the languages available
     * @return array language_id => language description in actual and foreign language
     */
    private static function getLanguageList(){

    	$translations = array();
    	$directoryIterator = new DirectoryIterator(Yii::app()->messages->basePath);
    	foreach($directoryIterator as $item)

        if($item->isDir() && !$item->isDot()) {

            $language_id =  $item->getFilename();
            $locale_display_name = ucfirst(Yii::app()->locale->getLocaleDisplayName($language_id, 'languages')) ;
            $other_locale = Yii::app()->getLocale($language_id);
            $other_locale_display_name =  ucfirst($other_locale->getLocaleDisplayName($language_id, "languages"));

            $translations[$language_id] = "$locale_display_name - $other_locale_display_name"; 
        }
        return $translations;
    }

}
