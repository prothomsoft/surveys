<?php
/**
 * @package MachII
 * @subpackage Commands
 */
/**
 * An EventCommand for putting an event arg into the current event.
 * @package MachII
 * @subpackage Commands
 * @author Ben Edwards <ben@ben-edwards.com>
 * @author Alan Richmond <alan@aardwolfweb.com>
 */
class MachII_framework_commands_EventArgCommand extends MachII_framework_EventCommand
{
    /**
     * @access private
     * @var string
     */
    var $_argName;
    /**
     * @access private
     * @var mixed
     */
    var $_argValue;
    /**
     * @access private
     * @var string
     */
    var $_argVariable;
    
    
    /**
     * @param string
     * @param mixed
     * @param string a string representation of a variable name
     */
    function MachII_framework_commands_EventArgCommand($argName, &$argValue, $argVariable = null)
    {
        $this->_setArgName($argName);
        $this->_setArgValue($argValue);
        $this->_setArgVariable($argVariable);
    }
    
    /**
     * @param MachII_framework_Event MachII_framework_Event descendent
     * @param MachII_framework_EventContext
     * @return true
     */
    function execute(&$event, &$eventContext)
    {
        $value = null;
        
        if ($this->_isArgVariableDefined()) {
            $value =& $this->_getArgVariableValue();
        } elseif ($this->_isArgValueDefined()) {
            $value =& $this->_getArgValue();
        }
        
        $event->setArg($this->_getArgName(), $value);
        
        return true;
    }
    
    /**
     * @access private
     * @param string
     */
    function _setArgName($argName)
    {
        $this->_argName = $argName;
    }
    
    /**
     * @access private
     * @return string
     */
    function _getArgName()
    {
        return $this->_argName;
    }
    
    /**
     * @access private
     * @param mixed
     */
    function _setArgValue(&$argValue)
    {
        $this->_argValue =& $argValue;
    }
    
    /**
     * @access private
     * @return mixed
     */
    function &_getArgValue()
    {
        return $this->_argValue;
    }
    
    /**
     * @access private
     * @return boolean
     */
    function _isArgValueDefined()
    {
        return !is_null($this->_getArgValue());
    }
    
    /**
     * @access private
     * @param string a string representation of a variable name
     */
    function _setArgVariable($argVariable)
    {
        $this->_argVariable = $argVariable;
    }
    
    /**
     * @access private
     * @return string a string representation of a variable name
     */
    function _getArgVariable()
    {
        return $this->_argVariable;
    }
    
    /**
     * @access private
     * @return boolean
     */
    function _isArgVariableDefined()
    {
        return !is_null($this->_getArgVariable());
    }
    
    /**
     * @access private
     * @return mixed
     */
    function &_getArgVariableValue()
    {
        $value = null;
        
        $argVar = $this->_getArgVariable();
        if (isset($argVar)) {
            eval("return \$value =& \$$argVar;");
        }
        
        return $value;
    }

}

?>
