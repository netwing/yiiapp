<?php

Yii::import('bootstrap.components.TbApi');
class Yiistrap extends TbApi
{
    /**
     * Registers the Bootstrap CSS.
     * @param string $url the URL to the CSS file to register.
     */
    public function registerCoreCss($url = null)
    {
        $fileName = YII_DEBUG ? 'bootstrap.css' : 'bootstrap.min.css';
        if (isset(Yii::app()->theme)) {
            if ($url === null) {
                $url = Yii::app()->theme->getBaseUrl() . '/assets/css/' . $fileName;
            }
        } else {
            if ($url === null) {
                $url = $this->getAssetsUrl() . '/css/' . $fileName;
            }
        }
        Yii::app()->clientScript->registerCssFile($url);
    }
}