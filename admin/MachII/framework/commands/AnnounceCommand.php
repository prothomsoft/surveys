<?php
/**
 * @package MachII
 * @subpackage Commands
 */
/**
 * An EventCommand for announcing an event.
 * @package MachII
 * @subpackage Commands
 * @author Ben Edwards <ben@ben-edwards.com>
 * @author Alan Richmond <alan@aardwolfweb.com>
 */
class MachII_framework_commands_AnnounceCommand extends MachII_framework_EventCommand
{
    /**
     * @var string
     * @access private
     */
    var $_eventName;
    
    /**
     * @var boolean
     * @access private
     */
    var $_copyEventArgs;
    
    
    /**
     * @param string
     * @param boolean
     */
    function MachII_framework_commands_AnnounceCommand($eventName, $copyEventArgs = true)
    {
        $this->_setEventName($eventName);
        $this->_setCopyEventArgs($copyEventArgs);
    }
    
    /**
     * @param MachII_framework_Event MachII_framework_Event descendent
     * @param MachII_framework_EventContext
     * @return true
     */
    function execute(&$event, &$eventContext)
    {
        $eventArgs = array();
        if ($this->_isCopyEventArgs()) {
            $eventArgs =& $event->getArgs();
        }
        
        $e = $eventContext->announceEvent($this->_getEventName(), $eventArgs);
        if (MachII::isException($e)) {
            return $e;
        }
        
        return true;
    }
    
    /**
     * @access private
     * @param string
     */
    function _setEventName($eventName)
    {
        $this->_eventName = $eventName;
    }
    
    /**
     * @access private
     * @return string
     */
    function _getEventName()
    {
        return $this->_eventName;
    }
    
    /**
     * @access private
     * @param boolean
     */
    function _setCopyEventArgs($copyEventArgs)
    {
        $this->_copyEventArgs = $copyEventArgs;
    }
    
    /**
     * @access private
     * @return boolean
     */
    function _isCopyEventArgs()
    {
        return $this->_copyEventArgs;
    }

}

?>
