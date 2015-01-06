<?php
/**
 * @package MachII
 */
/**
 * EventFilter class.
 * @package MachII
 * @author Ben Edwards <ben@ben-edwards.com>
 * @author Alan Richmond <alan@aardwolfweb.com>
 */
class MachII_framework_EventFilter extends MachII_framework_BaseObject
{    
    /**
     * @param MachII_framework_AppManager
     * @param array associative array of event filter parameters
     */
    function MachII_framework_EventFilter(&$appManager, $parameters)
    {
        parent::MachII_framework_BaseObject($appManager, $parameters);
    }
    
    /**
     * Override to provide event filtering logic.
     * @param MachII_framework_Event or descendent
     * @param MachII_framework_EventContext
     * @param array associative array of filter parameters
     * @abstract
     * @return boolean
     */
    function filterEvent($event, $eventContext, $paramArgs = array()) {}

}

?>
