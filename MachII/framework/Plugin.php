<?php
/**
 * @package MachII
 */
/**
 * Plugin.
 * @package MachII
 * @author Ben Edwards <ben@ben-edwards.com>
 * @author Alan Richmond <alan@aardwolfweb.com>
 */
class MachII_framework_Plugin extends MachII_framework_BaseObject
{
    /**
     * @param MachII_framework_AppManager
     * @param array associative array of plugin configuration data.
     */
    function MachII_framework_Plugin(&$appManager, $parameters = array())
    {
        parent::MachII_framework_BaseObject($appManager, $parameters);
    }
    
    /**
     * Override to provide custom configuration logic.
     * 
     * Called after constructor.
     */
    function configure() {}
    
    /**
     * Plugin point called when an exception occurs (before exception
     * event is handled).
     * 
     * Override to provide custom functionality.
     * @param MachII_framework_EventContext
     * @param MachII_util_Exception
     */
    function handleException(&$eventContext, &$exception) {}
    
    /**
     * Aborts event processing
     * 
     * Call this function to abort processing of the current event.
     * When called, a MachII_util AbortEventException exception is
     * thrown, caught, and handled by the framework.
     * @param string 
     * @throws MachII_util_AbortEventException
     */
    function abortEvent($message = '')
    {
        $e =& new MachII_util_AbortEventException(array('message' => $message));
        
        return $e;
    }
    
    /**
     * @param string
     * @param mixed
     */
    function setParameter($name, $value)
    {
        $this->_parameters[$name] = $value;
    }
    
    /**
     * @param string
     * @param mixed
     * @return mixed
     */
    function getParameter($name, $defaultValue = null)
    {
        return (isset($this->_parameters[$name]))?
                $this->_parameters[$name]:
                $defaultValue;
    }
    
    /**
     * @param array associative array of plugin parrameters will
     *              be merged with any existing parameters.
     */
    function setParameters($parameters)
    {
        $this->_parameters = array_merge($this->_parameters, $parameters);
    }
    
    /**
     * @return array associative array of plugin parrameters.
     */
    function getParameters()
    {
        return $this->_parameters;
    }
    
    /**
     * @access private
     * @param MachII_framework_AppManager
     */
    function _setAppManager($appManager)
    {
        $this->_appManager =& $appManager;
    }
    
    /**
     * @access protected
     * @return MachII_framework_AppManager
     */
    function &_getAppManager()
    {
        return $this->_appManager;
    }
    
    /**
     * Executes once before processing events.
     * 
     * Override to provide custom functionality.
     * @param MachII_framework_EventContext
     */
    function preProcess(&$eventContext) {}
    
    /**
     * Executes before each event.
     * @param MachII_framework_EventContext
     */
    function preEvent(&$eventContext) {}
    
    /**
     * Executes after each event.
     * 
     * Override to provide custom functionality.
     * @param MachII_framework_EventContext
     */
    function postEvent(&$eventContext) {}
    
    /**
     * Executes before each view.
     * 
     * Override to provide custom functionality.
     * @param MachII_framework_EventContext
     */
    function preView(&$eventContext) {}
    
    /**
     * Executes after each view.
     * 
     * Override to provide custom functionality.
     * @param MachII_framework_EventContext
     */
    function postView(&$eventContext) {}
    
    /**
     * Executes once after processing events.
     * 
     * Override to provide custom functionality.
     * @param MachII_framework_EventContext
     */
    function postProcess(&$eventContext) {}
    
}

?>
