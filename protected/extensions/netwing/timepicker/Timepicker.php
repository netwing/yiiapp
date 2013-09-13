<?php
/**
 * Timepicker class file.
 * @author Emanuele Deserti <emanuele.deserti@netwing.it>
 * @copyright Copyright &copy; Emanuele Deserti 2013-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package netwing
 * @version 1.0.0
 */

/**
 * Timepicker component.
 */
class Timepicker extends CApplicationComponent
{
    /**
     * @var bool whether we should copy the asset file or directory even if it is already published before.
     */
    public $forceCopyAssets = false;

    private $_assetsUrl;

    /**
     * Registers the Font awesome CSS.
     * @param string $url the URL to the CSS file to register.
     */
    public function registerCss($url = null)
    {
        if ($url === null) {
            $fileName = YII_DEBUG ? 'jquery-ui-timepicker-addon.css' : 'jquery-ui-timepicker-addon.min.css';
            $url = $this->getAssetsUrl() . "/" . $fileName;
        }
        Yii::app()->clientScript->registerCssFile($url);
    }

    /**
     * Registers all Bootstrap CSS files.
     */
    public function registerAllCss()
    {
        $this->registerCss();
    }

    /**
     * Registers the js file
     * @param string $url the URL to the CSS file to register.
     */
    public function registerJs($url = null)
    {
        if ($url === null) {
            $fileName = YII_DEBUG ? 'jquery-ui-timepicker-addon.js' : 'jquery-ui-timepicker-addon.min.js';
            $url = $this->getAssetsUrl() . "/" . $fileName;
        }
        Yii::app()->clientScript->registerScriptFile($url, CClientScript::POS_END);
    }

    /**
     * Registers all Bootstrap CSS files.
     */
    public function registerAllJs()
    {
        $this->registerJs();
    }


    /**
     * Registers all assets.
     */
    public function register()
    {
        $this->registerAllCss();
        $this->registerAllJs();
    }

    /**
     * Returns the url to the published assets folder.
     * @return string the url.
     */
    public function getAssetsUrl()
    {
        if (isset($this->_assetsUrl)) {
            return $this->_assetsUrl;
        } else {
            // Save default exclude files
            $excludeFiles = Yii::app()->assetManager->excludeFiles;
            $assetsPath = Yii::getPathOfAlias('bower.jquery-timepicker-addon');
            $assetsUrl = Yii::app()->assetManager->publish($assetsPath, true, -1, $this->forceCopyAssets);
            return $this->_assetsUrl = $assetsUrl;
        }
    }

}
