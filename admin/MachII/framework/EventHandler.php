<?php
/**
 * @package MachII
 */
/**
 * Handles processing of EventCommands for an Event.
 * @package MachII
 * @author Ben Edwards <ben@ben-edwards.com>
 * @author Alan Richmond <alan@aardwolfweb.com>
 */
class MachII_framework_EventHandler
{
    /**
     * @var array of MachII_framework_EventCommand descendents
     * @access private
     */
    var $_commands;
    /**
     * Event access.
     * If access is public it can be executed by a user; if private
     * it can only be executed internally.  Defaults to public.
     * @var integer set by constants
     * @see MACHII_EVENT_ACCESS_PUBLIC, MACHII_EVENT_ACCESS_PRIVATE
     */
    var $_access = MACHII_EVENT_ACCESS_PUBLIC;
    
    /**
     * Executes the event's commands.
     * @param MachII_framework_Event or descendent
     * @param MachII_framework_EventContext
     */
    function handleEvent(&$event, &$eventContext)
    {
        $eventCnt = count($this->_commands);
        for ($i = 0; $i < $eventCnt; $i++) {
            $e =& $this->_commands[$i]->execute($event, $eventContext);
            if (MachII::isException($e)) {
                return $e;
            }
            if ($e == false) {
                break;
            }
        }
    }
    
    /**
     * Adds an event command to the event's command queue.
     * @param MachII_framework_EventCommand or descendent
     */
    function addCommand(&$command)
    {
        $this->_commands[] =& $command;
    }
    
    /**
     * @param integer set by a constant
     * @see MACHII_EVENT_ACCESS_PUBLIC, MACHII_EVENT_ACCESS_PRIVATE
     */
    function setAccess($access)
    {
        $this->_access = $access;
    }
    
    /**
     * @return integer check against constant
     * @see MACHII_EVENT_ACCESS_PUBLIC, MACHII_EVENT_ACCESS_PRIVATE
     */
    function getAccess()
    {
        return $this->_access;
    }

}
    
?>
