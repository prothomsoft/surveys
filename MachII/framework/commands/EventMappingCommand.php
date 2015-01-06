<?php
/**
 * @package MachII
 * @subpackage Commands
 */
/**
 * An EventCommand for setting up an event mapping for an event handler.
 * @package MachII
 * @subpackage Commands
 * @author Ben Edwards <ben@ben-edwards.com>
 * @author Alan Richmond <alan@aardwolfweb.com>
 */
class MachII_framework_commands_EventMappingCommand extends MachII_framework_EventCommand
{
    /**
     * @access private
     * @var string
     */
    var $_eventName;
    /**
     * @access private
     * @var string
     */
    var $_mappingName;
    
    
    /**
     * @param string
     * @param string
     */
    function MachII_framework_commands_EventMappingCommand($eventName, $mappingName)
    {
        $this->_setEventName($eventName);
        $this->_setMappingName($mappingName);
    }
    
    /**
     * @param MachII_framework_Event MachII_framework_Event descendent
     * @param MachII_framework_EventContext
     * @return true
     */
    function execute(&$event, &$eventContext)
    {
        $eventContext->setEventMapping($this->_getEventName(), $this->_getMappingName());
        
        return true;
    }
    
    /**
     * @access private
     * @param string
     */
    function _setEventName($eventName)
    {
        $this->_eventName = strtolower($eventName);
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
     * @param string
     */
    function _setMappingName($mappingName)
    {
        $this->_mappingName = strtolower($mappingName);
    }
    
    /**
     * @access private
     * @return string
     */
    function _getMappingName()
    {
        return $this->_mappingName;
    }

}
?>
