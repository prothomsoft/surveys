<?php
/**
 * @package MachII
 */
/**
 * Listener invoker
 * @package MachII
 * @author Ben Edwards <ben@ben-edwards.com>
 * @author Alan Richmond <alan@aardwolfweb.com>
 * @abstract
 */
class MachII_framework_ListenerInvoker
{
    /**
     * @param MachII_framework_Event
     * @param MachII_framework_Listener
     * @param string
     * @param string representation of a variable name to store
     *               returned value in.
     */
    function invokeListener(&$event, &$target, $method, $resultKey = '') {}

}

?>
