<?
class filters_ValidateBetaStep1Filter extends MachII_framework_EventFilter
{
	function configure() {}
	
    function filterEvent(&$event)
    {
    	$newEventArgs = &$event->getArgs();
    	
      	return true;
    }
}
?>