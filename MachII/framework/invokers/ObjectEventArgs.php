<?php
/**
 * @package MachII
 * @subpackage Invokers
 */
/**
 * A MachII_framework_Invoker for calling a MachII_framework_Listener.
 * 
 * Event arguments will be mapped to MachII_framework_Listener method
 * arguments via a manually created argument map.
 * @see MachII_framework_Listener::__dispatch_map
 * @package MachII
 * @subpackage Invokers
 * @author Ben Edwards <ben@ben-edwards.com>
 * @author Alan Richmond <alan@aardwolfweb.com>
 */
class MachII_framework_invokers_ObjectEventArgs extends MachII_framework_ListenerInvoker
{
    /**
     * {@inheritdoc}
     * @uses MachII_framework_Listener::__dispatch()
     */
    function invokeListener(&$event, &$target, $method, $resultKey = null)
    {
        $resultKeyRef = (isset($resultKey))?$resultKey:'resultKeyRef';
        
        // Get the map of inputs for the method being called
        $dispatchMap = $target->__dispatch($method);
        if (!$dispatchMap) {
            $e =& new MachII_util_ListenerInvokerDispatchMapNotDefinedException(
                array(
                    'method' => get_class($target).'::'.$method.'()'
                )
            );
            return $e;
        } // TODO: maybe use a tokenizer to build map at parse time?
        
        // Build the arg list
        $args = array();
        $eventArgs =& $event->getArgs();
        
        $dispatchMapArgs = array_keys($dispatchMap['in']);
        
        foreach ($dispatchMapArgs as $key=>$arg) {
            if (isset($eventArgs[$arg])) {
                $args[] = '$eventArgs[$dispatchMapArgs['.$key.']]';
            }
        }
        if (count($dispatchMap['in']) != count($args)) {
            $e =& new MachII_util_ListenerInvokerArgCountMismatchException(
                array(
                    'method'          => get_class($target).'::'.$method.'()',
                    'argsFoundNum'    => count($args),
                    'argsExpectedNum' => count($dispatchMap['in'])
                )
            );
            return $e;
        }
        
        $argStr = implode(', ', $args);
        
        // This would be way better with call_user_func_array() but it can't return a reference.
        // TODO: Might be fixed in PHP5.
        //echo("return \$$resultKeyRef =& \$target->\$method($argStr);<br />");
        eval("return \$$resultKeyRef =& \$target->\$method($argStr);");
        
        if ((isset($resultKey))
        && (!strstr($resultKey, '['))) {
            $event->setArg($resultKey, $$resultKeyRef);
        }
        
        if (MachII::isException($resultKeyRef)) {
            return $resultKeyRef;
        }
    }

}

?>
