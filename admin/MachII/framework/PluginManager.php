<?php
/**
 * @package MachII
 */
/**
 * Load base plugin class
 */
require_once 'MachII/framework/Plugin.php';
/**
 * Manages registered plugins.
 * @package MachII
 * @author Ben Edwards <ben@ben-edwards.com>
 * @author Alan Richmond <alan@aardwolfweb.com>
 */
class MachII_framework_PluginManager
{
    /**
     * @var MachII_framework_AppManager
     * @access private
     */
    var $_appManager;
    
    /**
     * @var array associative array of MachII_framework_Plugin.
     * @access private
     */
    var $_plugins = array();
    
    /**
     * @var array associative array of MachII_framework_Plugin.
     * @access private
     */
    var $_pluginsArray = array();
    
    
    /**
     * @param array associative array of plugin configuration data.
     * @param MachII_framework_AppManager
     */
    function init($plugins, &$appManager)
    {
        $this->setAppManager($appManager);
        
        foreach ($plugins as $name=>$att) {
            $pluginType = MachII_util_ClassLoader::load($att['type']);
            $pluginObj =& new $pluginType($appManager, $att['parameters']);
            
            $this->addPlugin($name, $pluginObj);
        }
    }
    
    /**
     * Configure all of the plugins.
     */
    function configure()
    {
        for ($key = 0, $cnt = count($this->_pluginsArray); $key < $cnt; $key++) {
            $plugin =& $this->_pluginsArray[$key];
            if (MachII::isException($plugin)) {
                return $plugin;
            }
            
            $e = $plugin->configure();
            if (MachII::isException($e)) {
                return $e;
            }
        }
    }
    
    /**
     * @param string
     * @param MachII_framework_Plugin descendent
     */
    function addPlugin($pluginName, &$plugin)
    {
        $this->_plugins[$pluginName] = $plugin;
        $this->_pluginsArray[] = $plugin;
    }
    
    /**
     * @param string
     * @return MachII_framework_Plugin descendent
     */
    function &getPlugin($pluginName)
    {
        return $this->_plugins[$pluginName];
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
     * @param string method name of a plugin point
     * @param MachII_framework_EventContext
     */
    function executePluginPoint($pluginPoint, &$eventContext)
    {
        for ($key = 0, $cnt = count($this->_pluginsArray); $key < $cnt; $key++) {
            $plugin =& $this->_pluginsArray[$key];
            $e = $plugin->$pluginPoint($eventContext);
            if (MachII::isException($e)) {
                return $e;
            } elseif ($e === false) {
                $e =& new MachII_util_PluginException(
                    array('method' => get_class($plugin).'::'.$pluginPoint.'()')
                );
                return $e;
            }
        }
    }
    
    /**
     * @param MachII_framework_EventContext
     * @uses executePluginPoint()
     */
    function preProcess(&$eventContext)
    {
        $this->executePluginPoint('preProcess', $eventContext);
    }
    
    /**
     * @param MachII_framework_EventContext
     * @uses executePluginPoint()
     */
    function preEvent(&$eventContext)
    {
        $this->executePluginPoint('preEvent', $eventContext);
    }
    
    /**
     * @param MachII_framework_EventContext
     * @uses executePluginPoint()
     */
    function postEvent(&$eventContext)
    {
        $this->executePluginPoint('postEvent', $eventContext);
    }
    
    /**
     * @param MachII_framework_EventContext
     * @uses executePluginPoint()
     */
    function preView(&$eventContext)
    {
        $this->executePluginPoint('preView', $eventContext);
    }
    
    /**
     * @param MachII_framework_EventContext
     * @uses executePluginPoint()
     */
    function postView(&$eventContext)
    {
        $this->executePluginPoint('postView', $eventContext);
    }
    
    /**
     * @param MachII_framework_EventContext
     * @uses executePluginPoint()
     */
    function postProcess(&$eventContext)
    {
        $this->executePluginPoint('postProcess', $eventContext);
    }
    
    /**
     * Executes handleException() for each registered plugin.
     * @param MachII_framework_EventContext
     * @param MachII_framework_Exception
     * @see MachII_framework_EventContext::handleException()
     */
    function handleException(&$eventContext, &$exception)
    {
        $keys = array_keys($this->_plugins);
        foreach ($keys as $key) {
            $plugin =& $this->getPlugin($key);
            $plugin->handleException($eventContext, $exception);
        }
    }
    
}
 
?>
