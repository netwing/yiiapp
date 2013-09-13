<?php
/**
 * Cron class file.
 * @author Emanuele Deserti <emanuele.deserti@netwing.it>
 * @copyright Copyright &copy; Emanuele Deserti 2013-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package netwing
 * @version 1.0.0
 */

/**
 * Cron component.
 */
class Cron extends CApplicationComponent
{

    /**
     * init component
     */
    public function init()
    {
        Yii::setPathOfAlias('Cron', Yii::getPathOfAlias('webroot.vendor.mtdowling.cron-expression.src.Cron'));
    }

    /**
    * get instance
    * */
    public function getInstance($expression = '* * * * *')
    {
        return Cron\CronExpression::factory($expression);
    }
    
}
