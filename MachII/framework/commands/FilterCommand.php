<?php
/**
 * @package MachII
 * @subpackage Commands
 */
/**
 * An EventCommand for filtering events.
 * @package MachII
 * @subpackage Commands
 * @author Ben Edwards <ben@ben-edwards.com>
 * @author Alan Richmond <alan@aardwolfweb.com>
 */
class MachII_framework_commands_FilterCommand extends MachII_framework_EventCommand
{
    /**
     * @access private
     * @var MachII_framework_EventFilter MachII_framework_EventFilter descendent
     */
    var $_filter;
    /**
     * @access private
     * @var array an associative array
     */
    var $_paramArgs = array();
    
    
    /**
     * @param MachII_framework_EventFilter MachII_framework_EventFilter descendent
     * @param array an associative array
     */
    function MachII_framework_commands_FilterCommand(&$filter, $paramArgs = array())
    {
        $this->_setFilter($filter);
        $this->_setParamArgs($paramArgs);
    }
    
    /**
     * @param MachII_framework_Event MachII_framework_Event descendent
     * @param MachII_framework_EventContext
     * @return boolean
     */
    function execute(&$event, &$eventContext)
    {
        $filter =& $this->_getFilter();
        $continue = $filter->filterEvent($event, $eventContext, $this->_getParamArgs());
        
        return $continue;
    }
    
    /**
     * @access private
     * @param MachII_framework_EventFilter MachII_framework_EventFilter descendent
     */
    function _setFilter(&$filter)
    {
        $this->_filter =& $filter;
    }
    
    /**
     * @access private
     * @return MachII_framework_EventFilter MachII_framework_EventFilter descendent
     */
    function &_getFilter()
    {
        return $this->_filter;
    }
    
    /**
     * @access private
     * @param array an associative array
     */
    function _setParamArgs($paramArgs)
    {
        $this->_paramArgs = $paramArgs;
    }
    
    /**
     * @access private
     * @return array an associative array
     */
    function _getParamArgs()
    {
        return $this->_paramArgs;
    }

}

?>
