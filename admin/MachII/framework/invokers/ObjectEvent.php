<?php
/**
 * @package MachII
 * @subpackage Invokers
 */
/**
 * A MachII_framework_Invoker for calling a MachII_framework_Listener.
 * 
 * A single argument, MachII_framework_Event, will be passed to the
 * MachII_framework_Listener method.
 * @package MachII
 * @subpackage Invokers
 * @author Ben Edwards <ben@ben-edwards.com>
 * @author Alan Richmond <alan@aardwolfweb.com>
 */
class MachII_framework_invokers_ObjectEvent extends MachII_framework_ListenerInvoker
{
    /**
     * {@inheritdoc}
     */
    function invokeListener(&$event, &$target, $method, $resultKey = null)
    {
        $resultKeyRef =& $target->$method($event);
        if (MachII::isException($resultKeyRef)) {
            return $resultKeyRef;
        }
        
        // Create result container
        if (!is_null($resultKey)) {
            if (strstr($resultKey, '[')) {
                eval("return \$$resultKey =& \$resultKeyRef;");
            } else {
                $event->setArg($resultKey, $resultKeyRef);
            }
        }
    }

}

?>
