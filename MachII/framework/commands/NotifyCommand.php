<?php
/**
 * @package MachII
 * @subpackage Commands
 */
/**
 * An EventCommand for processing an EventFilter.
 * @package MachII
 * @subpackage Commands
 * @author Ben Edwards <ben@ben-edwards.com>
 * @author Alan Richmond <alan@aardwolfweb.com>
 */
class MachII_framework_commands_NotifyCommand extends MachII_framework_EventCommand
{
    /**
     * @access private
     * @var MachII_framework_Listener
     */
    var $_listener;
    /**
     * @access private
     * @var string
     */
    var $_method;
    /**
     * @access private
     * @var string a string representation of a variable name
     */
    var $_resultKey;
    
    
    /**
     * @param MachII_framework_Listener
     * @param string
     * @param string|void
     */
    function MachII_framework_commands_NotifyCommand(&$listener, $method, $resultKey = null)
    {
        $this->_setListener($listener);
        $this->_setMethod($method);
        $this->_setResultKey($resultKey);
    }
    
    /**
     * @param MachII_framework_Event or a MachII_framework_Event descendent
     * @param MachII_framework_EventContext
     * @return true
     */
    function execute(&$event, &$eventContext)
    {
        $listener =& $this->_getListener();
        $invoker  =& $listener->getInvoker();
        if (!is_object($invoker)) {
            echo $event->getName(),'-<pre>',var_dump($listener),var_dump($invoker),'</pre>';
        }
        $e =& $invoker->invokeListener($event, $listener, $this->_getMethod(), $this->_getResultKey());
        if (MachII::isException($e)) {
            return $e;
        }
        
        return true;
    }
    
    /**
     * @access private
     * @param MachII_framework_Listener
     */
    function _setListener(&$listener)
    {
        $this->_listener =& $listener;
    }
    
    /**
     * @access private
     * @return MachII_framework_Listener
     */
    function &_getListener()
    {
        return $this->_listener;
    }
    
    /**
     * @access private
     * @param string
     */
    function _setMethod($method)
    {
        $this->_method = $method;
    }
    
    /**
     * @access private
     * @return string
     */
    function _getMethod()
    {
        return $this->_method;
    }
    
    /**
     * @access private
     * @param string a string representation of a variable name
     */
    function _setResultKey($resultKey)
    {
        $this->_resultKey = $resultKey;
    }
    
    /**
     * @access private
     * @return string a string representation of a variable name
     */
    function _getResultKey()
    {
        return $this->_resultKey;
    }
    
    /**
     * @access private
     * @return boolean
     */
    function _hasResultKey()
    {
        return !is_null($this->_getResultKey());
    }

}

?>
