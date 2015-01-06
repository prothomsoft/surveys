<?php
/**
 * @package MachII
 */
/**
 * Event handler
 */
require_once 'MachII/framework/EventHandler.php';
/**
 * Event Command
 */
require_once 'MachII/framework/EventCommand.php';

/**#@+
 * Event Access Codes
 * 
 * Set via the Mach-II configuration file.
 */
/**
 * Flag as an internal event, one that can only be called by Mach-II.
 */
define('MACHII_EVENT_ACCESS_PRIVATE', 0);
/**
 * Flag as a public event, one that may be called by a user.
 */
define('MACHII_EVENT_ACCESS_PUBLIC',  1);
/**#@-*/

/**
 * Manages registered EventHandlers for the framework.
 * @package MachII
 * @author Ben Edwards <ben@ben-edwards.com>
 * @author Alan Richmond <alan@aardwolfweb.com>
 */
class MachII_framework_EventManager
{
    /**
     * @var MachII_framework_AppManager
     * @access private
     */
    var $_appManager;
    
    /**
     * @var array associative array of event handlers
     * @access private
     */
    var $_handlers = array();
    
    /**
     * @var MachII_framework_ListenerManager temporary
     * @access private
     */
    var $_listenerMgr;
    
    /**
     * @var MachII_framework_FilterManager temporary
     * @access private
     */
    var $_filterMgr;
    
    
    /**
     * @param array associative array of event config data
     * @param MachII_framework_AppManager
     */
    function init($config, &$appManager)
    {
        $this->setAppManager($appManager);
        
        $this->_listenerMgr =& $appManager->getListenerManager();
        $this->_filterMgr   =& $appManager->getFilterManager();
        
        foreach ($config as $eventName=>$eventAtt) {
            $eventName = strtolower($eventName);
            $eventHandler =& new MachII_framework_EventHandler();
            $eventHandler->setAccess($eventAtt['access']);
            unset($eventAtt['access']);
            
            $this->_handlers[$eventName] =& $eventHandler;
            
            foreach ($eventAtt as $cmd) {
                $eventCommand =& $this->_createEventCommand($cmd);
                if (MachII::isException($eventCommand)) {
                    return $eventCommand;
                }
                $eventHandler->addCommand($eventCommand);
            }
        }
        
        unset($this->_listenerMgr);
        unset($this->_filterMgr);
    }
    
    /**
     * @internal doesn't do anything at this time
     */
    function configure() {}

    /**
     * @param string
     * @param array associative array of event arguments
     * @param string
     * @throws MachII_util_EventHandlerNotDefinedException
     * @return MachII_framework_Event or descendent
     */
    function &createEvent(
        $eventName,
        &$eventArgs,
        $eventType = 'MachII.framework.Event')
    {
        $eventName = strtolower($eventName);
        
        if (!$this->isEventDefined($eventName)) {
            $e =& new MachII_util_EventHandlerNotDefinedException(
                array('eventName' => $eventName)
            );
            
            return $e;
        }
        
        $eventType = MachII_util_ClassLoader::load($eventType);
        
        $event =& new $eventType($eventName, $eventArgs);
        
        return $event;
    }
    
    /**
     * @param string
     * @throws MachII_util_EventHandlerNotDefinedException
     * @return MachII_framework_EventHandler
     */
    function &getEventHandler($eventName)
    {
        $eventName = strtolower($eventName);
        if (!$this->isEventDefined($eventName)) {
            $e =& new MachII_util_EventHandlerNotDefinedException(
                array('eventName' => $eventName));
            return $e;
        }
        $eventHandler =& $this->_handlers[$eventName];
        
        return $eventHandler;
    }
    
    /**
     * @param string
     * @return boolean
     */
    function isEventDefined($eventName)
    {
        $eventName = strtolower($eventName);
        
        return isset($this->_handlers[$eventName]);
    }
    
    /**
     * @param string
     * @return boolean
     */
    function isEventPublic($eventName)
    {
        $eventName = strtolower($eventName);
        $eventHandler =& $this->getEventHandler($eventName);
        
        return ($eventHandler->getAccess() == MACHII_EVENT_ACCESS_PUBLIC);
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
     * Creates the appropriate event command from a raw event configuration.
     * @param string MachII_framework_EventCommand type
     * @access private
     */
    function &_createEventCommand($command)
    {
        // get the type of command
        $node = key($command);
        
        // get the attributes
        $att = $command[$node];
        
        switch ($node) {
            case 'filter':
                $filterParams = (!empty($att['parameters']))?$att['parameters']:array();
                
                $filter =& $this->_filterMgr->getFilter($att['name']);
                
                $cmd = MachII_util_ClassLoader::load('MachII.framework.commands.FilterCommand');
                $eventCommand =& new $cmd($filter, $filterParams);
                break;
                
            case 'event-arg':
                $cmd = MachII_util_ClassLoader::load('MachII.framework.commands.EventArgCommand');
                $eventCommand =& new $cmd($att['name'], $att['value'], $att['variable']);
                break;
                
            case 'event-mapping':
                $cmd = MachII_util_ClassLoader::load('MachII.framework.commands.EventMappingCommand');
                $eventCommand =& new $cmd($att['event'], $att['mapping']);
                break;
                
            case 'notify':
                $listener =& $this->_listenerMgr->getListener($att['listener']);
                
                $cmd = MachII_util_ClassLoader::load('MachII.framework.commands.NotifyCommand');
                $eventCommand =& new $cmd($listener, $att['method'], $att['resultKey']);
                break;
                
            case 'announce':
                $cmd = MachII_util_ClassLoader::load('MachII.framework.commands.AnnounceCommand');
                $eventCommand =& new $cmd($att['event'], $att['copyEventArgs']);
                break;
                
            case 'view-page':
                $cmd = MachII_util_ClassLoader::load('MachII.framework.commands.ViewPageCommand');
                $eventCommand =& new $cmd($att['name'], $att['contentKey'], $att['append']);
                break;
                
            case 'event-bean':
                $cmd = MachII_util_ClassLoader::load('MachII.framework.commands.EventBeanCommand');
                $eventCommand =& new $cmd($att['name'], $att['type'], $att['fields']);
                break;
                
            default:
                $cmd = MachII_util_ClassLoader::load('MachII.framework.EventCommand');
                $eventCommand =& new $cmd();
                break;
        }// end switch $node
        
        return $eventCommand;
    }

}

?>
