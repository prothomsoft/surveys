<?php
/**
 * @package MachII
 */
/**
 * EventCommand class.
 * 
 * The base EventCommand class.
 * @package MachII
 * @author Ben Edwards <ben@ben-edwards.com>
 * @author Alan Richmond <alan@aardwolfweb.com>
 */
class MachII_framework_EventCommand
{
    /**
     * Parameters
     * 
     * EventCommand parameters are set via the configuration file.
     * @access private
     * @var array associative array
     */
    var $_parameters = array();
    
    
    /**
     * @param MachII_framework_Event
     * @param MachII_framework_EventContext
     */
    function execute(&$event, &$eventContext) {}
    
    /**
     * @param string
     * @param mixed
     */
    function setParameter($name, &$value)
    {
        $this->_parameters[$name] =& $value;
    }
    
    /**
     * @param string
     * @return string
     */
    function &getParameter($name)
    {
        return $this->_parameters[$name];
    }
    
    /**
     * @access protected
     * @param array associative array will be merged with any existing parameters
     */
    function setParameters($parameters)
    {
        $this->_parameters = array_merge($this->_parameters, $parameters);
    }

}

?>
