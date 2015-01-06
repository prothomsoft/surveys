<?php
/**
 * @package MachII
 */
/**
 * Responsible for controlling loading/reloading of the AppManager.
 * @package MachII
 * @author Ben Edwards <ben@ben-edwards.com>
 * @author Alan Richmond <alan@aardwolfweb.com>
 */
class MachII_framework_AppLoader
{
    /**
     * Path and filname of the XML configuration file
     * @access private
     * @var string
     */
    var $_configPath;
    /**
     * Application manager
     * @access private
     * @var MachII_framework_AppManager
     */
    var $_appManager;
    /**
     * Application factory
     * @access private
     * @var MachII_framework_AppFactory
     */
    var $_appFactory;
    /**
     * Date the configuration file was last reloaded.
     * 
     * Unix timestamp
     * @access private
     * @var integer Unix timestamp
     */
    var $_lastReloadDate = 0;
    
    
    /**
     * Setup the application factory
     */
    function MachII_framework_AppLoader()
    {
        $appFactory =& new MachII_framework_AppFactory();
        $this->setAppFactory($appFactory);
    }
    
    /**
     * Configure the application
     * 
     * @internal Split out of the constructor so it could throw an error
     * @param string path and filename of the configuration file
     */
    function init($configPath)
    {
        $this->setConfigPath($configPath);
        
        $e = $this->reloadConfig();
        if (MachII::isException($e)) {
            return $e;
        }
    }
    
    /**
     * Determine if the configuration file should be reloaded
     * 
     * Checks if the configuration file has been modified since
     * it was last loaded.
     * @return boolean
     */
    function shouldReloadConfig()
    {
        $shouldReload = ($this->getLastReloadDate() < filemtime($this->getConfigPath()));
        
        return $shouldReload;
    }
    
    /**
     * Create a new application manager
     * 
     * Creates a new application manager from the configuration
     * and updates the last reload date to the current date/time.
     */
    function reloadConfig()
    {
        $appFactory =& $this->getAppFactory();
        $appManager =& $appFactory->createAppManager($this->getConfigPath());
        if (MachII::isException($appManager)) {
            return $appManager;
        }
        
        $this->setAppManager($appManager);
        
        $this->setLastReloadDate(time());
    }
    
    /**
     * @param integer Unix timestamp
     */
    function setLastReloadDate($lastReloadDate)
    {
        $this->_lastReloadDate = $lastReloadDate;
    }
    
    /**
     * @return integer Unix timestamp
     */
    function getLastReloadDate()
    {
        return $this->_lastReloadDate;
    }
    
    /**
     * Set the path and filename of the configuration file
     * @param string absolute path and filename of the configuration file
     */
    function setConfigPath($configPath)
    {
        $this->_configPath = $configPath;
    }
    
    /**
     * @return string path and filename of the configuration file
     */
    function getConfigPath()
    {
        return $this->_configPath;
    }
    
    /**
     * @param MachII_framework_AppManager
     */
    function setAppManager(&$appManager)
    {
        $this->_appManager =& $appManager;
    }
    
    /**
     * @return MachII_framework_AppManager
     */
    function &getAppManager()
    {
        return $this->_appManager;
    }
    
    /**
     * @param MachII_framework_AppFactory
     */
    function setAppFactory(&$appFactory)
    {
        $this->_appFactory =& $appFactory;
    }
    
    /**
     * @return MachII_framework_AppFactory
     */
    function &getAppFactory()
    {
        return $this->_appFactory;
    }

}

?>
