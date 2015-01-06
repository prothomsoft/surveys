<?php
/**
 * @package MachII
 */
/**
 * Mach-II Base Object
 * @package MachII
 * @author Ben Edwards <ben@ben-edwards.com>
 * @author Alan Richmond <alan@aardwolfweb.com>
 */
class MachII_framework_BaseObject
{
    /**
     * @var MachII_framework_AppManager
     * @access private
     */
    var $_appManager;
    
    /**
     * @var array associative array of parameters
     * @access private
     */
    var $_parameters = array();
    
    /**
     * Constructor
     * @param MachII_framework_AppManager The framework instances' AppManager.
     * @param array The initial set of configuration parameters.
     */
    function MachII_framework_BaseObject(&$appManager, $parameters = array())
    {
        $this->setAppManager($appManager);
        $this->setParameters($parameters);
    }
    
    /**
     * Override to provide custom configuration logic.
     * 
     * Called after constructor.
     */
    function configure() {}
    
    /**
     * Announces a new event to the framework.
     * @param string The name of the event to announce.
     * @param string A struct of arguments to set as the event's args.
     * @throws MachII_util_EventContextMissingException
     */
    function announceEvent($eventName, $eventArgs = array())
    {
        if (isset($GLOBALS['eventContext'])) {
            $GLOBALS['eventContext']->announceEvent($eventName, $eventArgs);
        } else {
            $e =& new MachII_util_EventContextMissingException();
            return $e;
        }
    }
    
    /**
     * Sets a configuration parameter.
     * @param string The parameter name.
     * @param mixed The parameter value
     */
    function setParameter($name, &$value)
    {   
        if (is_object($value)) {
            $this->_parameters[$name] =& $value;
        } else {
            $this->_parameters[$name] = $value;
        }
    }
    
    /**
     * Gets a configuration parameter value, or a default value if not defined.
     * @param string The parameter name.
     * @param mixed|null The default value to return if the parameter is not defined.
     *                   Defaults to NULL.
     * @return mixed
     */
    function &getParameter($name, $defaultValue = null)
    {
        return (isset($this->_parameters[$name]))?$this->_parameters[$name]:$defaultValue;
    }
    
    /**
     * Checks to see whether or not a configuration parameter is defined.
     * 
     * Same as hasParameter().
     * @param string The parameter name.
     * @return boolean
     */
    function isParameterDefined($name)
    {
        return isset($this->_parameters[$name]);
    }
    
    /**
     * Checks to see whether or not a configuration parameter is defined.
     * 
     * Same as isParameterDefined().
     * @param string The parameter name.
     * @return boolean
     */
    function hasParameter($name)
    {
        return isset($this->_parameters[$name]);
    }
    
    /**
     * Sets the full set of configuration parameters for the component.
     * @param array associative array will be merged with any existing parameters.
     */
    function setParameters($parameters)
    {
        $this->_parameters = array_merge($this->_parameters, $parameters);
    }
    
    /**
     * Gets the full set of configuration parameters for the component.
     * @return array associative array
     */
    function getParameters()
    {
        return $this->_parameters;
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
     * Gets the specified property.
     * 
     * This is just a shortcut for getAppManager()->getPropertyManager()->getProperty().
     * @param string The name of the property to return.
     * @return mixed The value of a property.
     */
    function getProperty($propertyName)
    {
        if (!isset($this->_propertyManager)) {
            $appManager =& $this->getAppManager();
            $this->_propertyManager =& $appManager->getPropertyManager();
        }
        
        return $this->_propertyManager->getProperty($propertyName);
    }
    
    /**
     * Sets the specified property.
     * 
     * This is just a shortcut for getAppManager()->getPropertyManager()->setProperty().
     * @param string The name of the property to set.
     * @param mixed The value to store in the property.
     */
    function setProperty($propertyName, &$propertyValue)
    {
        if (!isset($this->_propertyManager)) {
            $appManager =& $this->getAppManager();
            $this->_propertyManager =& $appManager->getPropertyManager();
        }
        
        $this->_propertyManager->setProperty($propertyName, $propertyValue);
    }
    
}

?>
