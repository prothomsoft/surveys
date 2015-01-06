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
class MachII_framework_commands_ViewPageCommand extends MachII_framework_EventCommand
{
    /**
     * @access private
     * @var string
     */
    var $_viewName;
    
    /**
     * @access private
     * @var string a string representation of a variable name
     */
    var $_contentKey;
    
    /**
     * @access private
     * @var boolean
     */
    var $_append;
    
    
    /**
     * @param string
     * @param string a string representation of a variable name
     */
    function MachII_framework_commands_ViewPageCommand($viewName, $contentKey = null, $append = false)
    {
        $this->_setViewName($viewName);
        $this->_setContentKey($contentKey);
        $this->_setAppend($append);
    }
    
    /**
     * @param MachII_framework_Event or a MachII_framework_Event descendent
     * @param MachII_framework_EventContext
     * @return true
     */
    function execute(&$event, &$eventContext)
    {
        $e =& $eventContext->displayView($event, $this->_getViewName(), $this->_getContentKey(), $this->_getAppend());
        if (MachII::isException($e)) {
            return $e;
        }
        
        return true;
    }
    
    /**
     * @access private
     * @param boolean
     */
    function _setAppend($append)
    {
        $this->_append = $append;
    }
    
    /**
     * @access private
     * @return boolean
     */
    function _getAppend()
    {
        return $this->_append;
    }
    
    /**
     * @access private
     * @param string
     */
    function _setViewName($viewName)
    {
        $this->_viewName = $viewName;
    }
    
    /**
     * @access private
     * @return string
     */
    function _getViewName()
    {
        return $this->_viewName;
    }
    
    /**
     * @access private
     * @param string a string representation of a variable name
     */
    function _setContentKey($contentKey)
    {
        $this->_contentKey = $contentKey;
    }
    
    /**
     * @access private
     * @return string a string representation of a variable name
     */
    function _getContentKey()
    {
        return $this->_contentKey;
    }
    
    /**
     * @access private
     * @return boolean
     */
    function _hasContentKey()
    {
        return !is_null($this->_getContentKey);
    }

}

?>
