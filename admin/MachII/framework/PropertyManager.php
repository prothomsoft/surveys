<?php
/**
 * @package MachII
 */
/**
 * Manages defined properties.
 * @package MachII
 * @author Ben Edwards <ben@ben-edwards.com>
 * @author Alan Richmond <alan@aardwolfweb.com>
 */
class MachII_framework_PropertyManager
{
    /**
     * @var MachII_framework_AppManager
     * @access private
     */
    var $_appManager;
    
    /**
     * @var array associative array of defined properties
     * @access private
     */
    var $_properties = array(
        'defaultEvent'        => 'defaultEvent',
        'exceptionEvent'      => 'exceptionEvent',
        'applicationRoot'     => '.',
        'eventParameter'      => 'event',
        'parameterPrecedence' => 'form',
        'maxEvents'           => 10
    );
    
    
    /**
     * @param array associative array of properties
     * @param MachII_framework_AppManager
     */
    function init($properties, &$appManager)
    {
        $this->setAppManager($appManager);
        $this->_properties = array_merge($this->_properties, $properties);
    }
    
    /**
     * Configure the property manager.
     * @internal doesn't do anything at this time.
     */
    function configure() {}
    
    /**
     * @param string
     * @return mixed|void
     */
    function &getProperty($propertyName)
    {
        if (isset($this->_properties[$propertyName])) {
            if (is_object($this->_properties[$propertyName])) {
                return $this->_properties[$propertyName];
            } else {
                // make a copy
                $value = $this->_properties[$propertyName];
                return $value;
            }
        }
    }
    
    /**
     * @param string
     * @param mixed
     */
    function setProperty($propertyName, &$propertyValue)
    {
        if (is_object($propertyValue)) {
            $this->_properties[$propertyName] =& $propertyValue;
        } else {
            $this->_properties[$propertyName] = $propertyValue;
        }
    }
    
    /**
     * @return array associative array of defined properties
     */
    function &getProperties()
    {
        return $this->_properties;
    }
    
    /**
     * @param string
     * @return boolean
     */
    function hasProperty($propertyName)
    {
        return isset($this->_properties[$propertyName]);
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
