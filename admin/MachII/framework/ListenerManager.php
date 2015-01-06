<?php
/**
 * @package MachII
 */
/**
 * 
 */
require_once 'MachII/framework/ListenerInvoker.php';
/**
 * Manages registered listeners.
 * @package MachII
 * @author Ben Edwards <ben@ben-edwards.com>
 * @author Alan Richmond <alan@aardwolfweb.com>
 */
class MachII_framework_ListenerManager
{
    /**
     * @var MachII_framework_AppManager
     * @access private
     */
    var $_appManager;
    
    /**
     * @var array associative array of MachII_framework_ListenerManager
     *            descendents.
     * @access private
     */
    var $_listeners = array();
    
    /**
     * @param array associative array of raw listener configuration data
     * @param MachII_framework_AppManager
     */
    function init($listeners, &$appManager)
    {
        $this->setAppManager($appManager);
        
        foreach ($listeners as $listener) {
            // Setup the listener's invoker
            $invokerType = MachII_util_ClassLoader::load($listener['invoker']['type']);
            $invoker =& new $invokerType();
            
            // Listener
            $listenerType = MachII_util_ClassLoader::load($listener['type']);
            
            $listenerObj =& new $listenerType($appManager, $listener['parameters']);
            $listenerObj->setInvoker($invoker);
            
            $this->addListener($listener['name'], $listenerObj);
        }
    }
    
    /**
     * Configure all of the listeners.
     */
    function configure()
    {
        $keys = array_keys($this->_listeners);
        foreach ($keys as $key) {
            $listener =& $this->getListener($key);
            if (MachII::isException($listener)) {
                return $listener;
            }
            
            $e = $listener->configure();
            if (MachII::isException($e)) {
                return $e;
            }
        }
    }
    
    /**
     * @param string
     * @param MachII_framework_Listener descendent
     */
    function addListener($name, &$listener)
    {
        $this->_listeners[$name] =& $listener;
    }
    
    /**
     * @param string
     * @return MachII_framework_Listener|false
     */
    function &getListener($listenerName)
    {
        if ($listener = $this->isListenerDefined($listenerName)) {
            return $this->_listeners[$listenerName];
        }
        
        return $listener;
    }
    
    /**
     * @param string
     * @return boolean
     */
    function isListenerDefined($filterName)
    {
        return isset($this->_listeners[$filterName]);
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

}

?>
