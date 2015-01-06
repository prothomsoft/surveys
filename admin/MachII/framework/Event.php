<?php
/**
 * @package MachII
 */
/**
 * Mach-II Event
 * @package MachII
 * @author Ben Edwards <ben@ben-edwards.com>
 * @author Alan Richmond <alan@aardwolfweb.com>
 */
class MachII_framework_Event
{
    /**
     * @var string|void
     * @access private
     */
    var $_name;
    
    /**
     * @var array associative array of event arguments
     * @access private
     */
    var $_args = array();
    
    /**
     * @var string representation of an argument's data type
     * @access private
     */
    var $_argTypes;
        
    /**
     * @param string|void
     * @param array associative array of event arguments
     */
    function MachII_framework_Event($name = null, $args = array())
    {
        $this->_name = $name;
        $this->_args = $args;
    }
    
    /**
     * @param string|void
     */
    function setName($name)
    {
        $this->_name = $name;
    }
    
    /**
     * @return string|void
     */
    function getName()
    {
        return $this->_name;
    }
    
    /**
     * @param string
     * @param mixed
     * @param string|void
     */
    function setArg($name, &$value, $type = null)
    {
        if (is_object($value)) {
            $this->_args[$name] =& $value;
        } else {
            $this->_args[$name] = $value;
        }
        
        if (!is_null($type)) {
            $this->_argTypes[$name] = $type;
        }
    }
    
    /**
     * @param string
     * @param mixed
     * @return mixed
     */
    function &getArg($name, $defaultValue = null)
    {
        if (isset($this->_args[$name])) {
            if (is_object($this->_args[$name])) {
                return $this->_args[$name];
            } else {
                $defaultValue = $this->_args[$name];
            }
        }
        
        return $defaultValue;
    }
    
    /**
     * @param string
     * @return boolean
     */
    function isArgDefined($name)
    {
        return isset($this->_args[$name]);
    }
    
    /**
     * @param string
     */
    function removeArg($name)
    {
        unset($this->_args[$name]);
    }
    
    /**
     * @param array associative array will be merged with any existing arguments
     */
    function &setArgs(&$args)
    {
        $keys = array_keys($args);
        foreach ($keys as $name) {
            if (is_object($args[$name])) {
                $this->_args[$name] =& $args[$name];
            } else {
                $this->_args[$name] = $args[$name];
            }
        }
    }
    
    /**
     * @return array associative array
     */
    function &getArgs()
    {
        return $this->_args;
    }
    
    /**
     * @param string
     * @param string|void
     */
    function setArgType($name, $type)
    {
        $this->_argTypes[$name] = $type;
    }
    
    /**
     * @param string
     * @return string
     */
    function getArgType($name)
    {
        return isset($this->_argTypes[$name])?$this->_argTypes[$name]:null;
    }
}

?>
