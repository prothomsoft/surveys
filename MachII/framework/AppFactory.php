<?php
/**
 * @package MachII
 */
/**
 * Load the Managers
 */
require_once 'MachII/framework/Config.php';
require_once 'MachII/framework/AppManager.php';
require_once 'MachII/framework/PropertyManager.php';
require_once 'MachII/framework/ListenerManager.php';
require_once 'MachII/framework/FilterManager.php';
require_once 'MachII/framework/EventManager.php';
require_once 'MachII/framework/ViewManager.php';
require_once 'MachII/framework/PluginManager.php';

/**
 * Factory class for creating instances of AppManager.
 * @package MachII
 * @author Ben Edwards <ben@ben-edwards.com>
 * @author Alan Richmond <alan@aardwolfweb.com>
 */
class MachII_framework_AppFactory
{
    /**
     * Create an instance of the main application manager
     *
     * Creates an application manager and populates it with the
     * configured component managers.
     * @param string absolute path and filename of the configuration file
     * @return MachII_framework_AppManager
     * @uses MachII_framework_Config
     * @uses MachII_framework_AppManager
     * @uses MachII_framework_PropertyManager
     * @uses MachII_framework_ListenerManager
     * @uses MachII_framework_FilterManager
     * @uses MachII_framework_EventManager
     * @uses MachII_framework_ViewManager
     * @uses MachII_framework_PluginManager
     */
    function &createAppManager($configFile)
    {
        // Configuration
        $config =& new MachII_framework_Config();
        $config->parse($configFile);
        
        //Application Manager
        $appManager =& new MachII_framework_AppManager();
        
        // Property Manager
        $propertyManager =& new MachII_framework_PropertyManager();
        $propertyManager->init(
            $config->getConfig('properties'),
            $appManager);
        if (MachII::isException($propertyManager)) {
            return $propertyManager;
        }
        $appManager->setPropertyManager($propertyManager);
        
        // Listener Manager
        $listenerManager =& new MachII_framework_ListenerManager();
        $listenerManager->init(
            $config->getConfig('listeners'),
            $appManager);
        if (MachII::isException($listenerManager)) {
            return $listenerManager;
        }
        $appManager->setListenerManager($listenerManager);
        
        // Filter Manager
        $filterManager =& new MachII_framework_FilterManager();
        $filterManager->init(
            $config->getConfig('event-filters'),
            $appManager);
        if (MachII::isException($filterManager)) {
            return $filterManager;
        }
        $appManager->setFilterManager($filterManager);
            
        // Event Manager
        $eventManager =& new MachII_framework_EventManager();
        $eventManager->init(
            $config->getConfig('event-handlers'),
            $appManager);
        if (MachII::isException($eventManager)) {
            return $eventManager;
        }
        $appManager->setEventManager($eventManager);
            
        // View Manager
        $viewManager =& new MachII_framework_ViewManager();
        $viewManager->init(
            $config->getConfig('page-views'),
            $appManager);
        if (MachII::isException($viewManager)) {
            return $viewManager;
        }
        $appManager->setViewManager($viewManager);
            
        // Plugin Manager
        $pluginManager =& new MachII_framework_PluginManager();
        $pluginManager->init(
            $config->getConfig('plugins'),
            $appManager);
        if (MachII::isException($pluginManager)) {
            return $pluginManager;
        }
        $appManager->setPluginManager($pluginManager);
        
        $appManager->configure();
        
        return $appManager;
    }

}

?>
