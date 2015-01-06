<?php
/**
 * @package MachII
 */
/**
 * 
 */
require_once 'MachII/framework/BaseObject.php';
require_once 'MachII/framework/EventContext.php';
require_once 'MachII/framework/RequestHandler.php';
require_once 'MachII/framework/Listener.php';

/**
 * The main framework manager.
 * @package MachII
 * @author Ben Edwards <ben@ben-edwards.com>
 * @author Alan Richmond <alan@aardwolfweb.com>
 */
class MachII_framework_AppManager
{
    /**
     * Property Manager
     * @access private
     * @var MachII_framework_PropertyManager
     */
    var $_propertyManager;
    /**
     * Listener Manager
     * @access private
     * @var MachII_framework_ListenerManager
     */
    var $_listenerManager;
    /**
     * Filter Manager
     * @access private
     * @var MachII_framework_FilterManager
     */
    var $_filterManager;
    /**
     * Event Manager
     * @access private
     * @var MachII_framework_EventManager
     */
    var $_eventManager;
    /**
     * View Manager
     * @access private
     * @var MachII_framework_ViewManager
     */
    var $_viewManager;
    /**
     * Plugin Manager
     * @access private
     * @var MachII_framework_PluginManager
     */
    var $_pluginManager;
    /**
     * Request Handler
     * @access private
     * @var MachII_framework_RequestHandler
     */
    var $_requestHandler;
    
    /**
     * @uses MachII_framework_RequestHandler
     */
    function MachII_framework_AppManager()
    {
        $this->_requestHandler =& $this->createRequestHandler();
    }
    
    /**
     * Configure the component managers
     * 
     * Managers are configured in the following order:
     * <ol>
     *     <li>Property</li>
     *     <li>Listener</li>
     *     <li>Filter</li>
     *     <li>Event</li>
     *     <li>Plugin</li>
     *     <li>View</li>
     * </ol>
     */
    function configure()
    {
        $propertyManager =& $this->getPropertyManager();
        $pluginManager   =& $this->getPluginManager();
        $listenerManager =& $this->getListenerManager();
        $filterManager   =& $this->getFilterManager();
        $eventManager    =& $this->getEventManager();
        $viewManager     =& $this->getViewManager();
        
        $propertyManager->configure();
        $pluginManager->configure();
        $listenerManager->configure();
        $filterManager->configure();
        $eventManager->configure();
        $viewManager->configure();
    }
    
    /**
     * @uses MachII_framework_EventContext
     * @return MachII_framework_EventContext
     */
    function &createEventContext()
    {
        $eventContext =& new MachII_framework_EventContext($this);
        
        return $eventContext;
    }
    
    /**
     * @uses MachII_framework_RequestHandler
     * @return MachII_framework_RequestHandler
     */
    function &createRequestHandler()
    {
        $requestHandler =& new MachII_framework_RequestHandler($this);
        
        return $requestHandler;
    }
    
    /**
     * @param boolean should a new request handler be created?
     * @return MachII_framework_RequestHandler
     */
    function &getRequestHandler($createNew = false)
    {
        if ($createNew) {
            return $this->createRequestHandler();
        }
        
        return $this->_requestHandler;
    }
    
    /**
     * @return MachII_framework_EventManager
     */
    function &getEventManager()
    {
        return $this->_eventManager;
    }
    
    /**
     * @param MachII_framework_EventManager
     */
    function setEventManager(&$mgr)
    {
        $this->_eventManager =& $mgr;
    }
    
    /**
     * @return MachII_framework_FilterManager
     */
    function &getFilterManager()
    {
        return $this->_filterManager;
    }
    
    /**
     * @param MachII_framework_FilterManager
     */
    function setFilterManager(&$mgr)
    {
        $this->_filterManager =& $mgr;
    }
    
    /**
     * @return MachII_framework_ListenerManager
     */
    function &getListenerManager()
    {
        return $this->_listenerManager;
    }
    
    /**
     * @param MachII_framework_ListenerManager
     */
    function setListenerManager(&$mgr)
    {
        $this->_listenerManager =& $mgr;
    }
    
    /**
     * @return MachII_framework_PluginManager
     */
    function &getPluginManager()
    {
        return $this->_pluginManager;
    }
    
    /**
     * @param MachII_framework_PluginManager
     */
    function setPluginManager(&$mgr)
    {
        $this->_pluginManager =& $mgr;
    }
    
    /**
     * @return MachII_framework_PropertyManager
     */
    function &getPropertyManager()
    {
        return $this->_propertyManager;
    }
    
    /**
     * @param MachII_framework_PropertyManager
     */
    function setPropertyManager(&$mgr)
    {
        $this->_propertyManager =& $mgr;
    }
    
    /**
     * @return MachII_framework_ViewManager
     */
    function &getViewManager()
    {
        return $this->_viewManager;
    }
    
    /**
     * @param MachII_framework_ViewManager
     */
    function setViewManager(&$mgr)
    {
        $this->_viewManager =& $mgr;
    }

}
?>
