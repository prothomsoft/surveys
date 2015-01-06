<?php
/*
Author: Ben Edwards (ben@ben-edwards.com)
PHP Port: Alan Richmond (alan@aardwolfweb.com)
*/

class MachII_filters_EventArgsFilter extends MachII_framework_EventFilter
{

    function configure() {}
    
    
    function filterEvent(&$event, &$eventContext, $paramArgs = array())
    {
        $event->setArgs($paramArgs);
    }

}

?>
