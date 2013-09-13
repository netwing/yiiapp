<?php
/**
* NRedis class file
*
* use and modify it as you wish
* 
* @author Emanuele Deserti <emanuele.deserti@netwing.it>
* @license http://www.opensource.org/licenses/gpl-3.0.html
*
*/

/**
* NRedis uses Predis client as redis php client{@link https://github.com/nrk/predis predis}.
*/
class Redis
{
    /**
    * @var Redis the Redis instance
    */
    protected $_redis = null;
    /**
    * @var array list of servers 
    */
    protected $_servers = array();

    /**
     * @var string predis path
     */
    private $predis_path = "application.vendors.predis.lib.Predis";

    /**
    * @var string list of servers 
    */
    public $servers = array(
        'host' => '127.0.0.1',
        'port' => 6379
        );

    /**
    * @var ID of database
    */
    public $database = 0;

    /**
    * @var Prefix for keys
    */
    public $prefix = "";

    /**
    * Initializes this application component.
    * This method is required by the {@link IApplicationComponent} interface.
    * It creates the redis instance and adds redis servers.
    * @throws CException if redis extension is not loaded
    */
    public function init()
    {
        $this->getRedis();
    }

    /**
    * @return mixed the redis instance (or redisd if {@link useRedisd} is true) used by this component.
    */
    public function getRedis()
    {
        if ($this->_redis!==null) {
            return $this->_redis;
        } 


        // to use the old single file appreach comment out the next two lines and uncomment the 3rd
        require_once Yii::getPathOfAlias($this->predis_path) . '/Autoloader.php';
        Predis\Autoloader::register();
        //require_once Yii::getPathOfAlias($this->predisPath).'.php'; // old single file approach,no autoloading
        Yii::log('Opening Redis connection', CLogger::LEVEL_TRACE);
        if (isset($this->prefix) and $this->prefix != "" and strlen($this->prefix) > 0) {
            $this->_redis = new Predis\Client($this->servers, array('prefix' => $this->prefix));
        } else {
            $this->_redis = new Predis\Client($this->servers);
        }

        if (isset($this->database) and $this->database > 0) {
            $this->_redis->SELECT($this->database);
        }
        return $this->_redis;
    }

    /**
    * call unusual method
    * */
    public function __call($method,$args)
    {
        return call_user_func_array(array($this->_redis,$method),$args);
    }

}

