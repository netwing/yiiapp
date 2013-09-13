<?php
/**
 * FontAwesom class file.
 * @author Emanuele Deserti <emanuele.deserti@netwing.it>
 * @copyright Copyright &copy; Emanuele Deserti 2013-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package netwing
 * @version 1.0.0
 */

/**
 * Font awesome component.
 */
class FontAwesome extends CApplicationComponent
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
            $fileName = YII_DEBUG ? 'font-awesome.css' : 'font-awesome.min.css';
            $url = $this->getAssetsUrl() . "/css/" . $fileName;
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
     * Registers all assets.
     */
    public function register()
    {
        $this->registerAllCss();
    }

    /**
     * Returns the url to the published assets folder.
     * @return string the url.
     */
    protected function getAssetsUrl()
    {
        if (isset($this->_assetsUrl)) {
            return $this->_assetsUrl;
        } else {
            // Save default exclude files
            $excludeFiles = Yii::app()->assetManager->excludeFiles;
            // Do not publish less, scss and src
            Yii::app()->assetManager->excludeFiles = array_merge(
                $excludeFiles, 
                array('.git', 'gitignore', '.ruby-version', 'CONTRIBUTING.md', 'Gemfile', 'Gemfile.lock', 'README.md', '_config.yml', 'composer.json', 'less', 'package.json', 'scss', 'src')
            );
            $assetsPath = Yii::getPathOfAlias('bower.font-awesome');
            $assetsUrl = Yii::app()->assetManager->publish($assetsPath, true, -1, $this->forceCopyAssets);
            // Reset default exclude files
            Yii::app()->assetManager->excludeFiles = $excludeFiles;
            return $this->_assetsUrl = $assetsUrl;
        }
    }

}
