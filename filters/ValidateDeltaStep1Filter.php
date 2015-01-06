<?
class filters_ValidateDeltaStep1Filter extends MachII_framework_EventFilter
{
	function configure() {}
	
    function filterEvent(&$event)
    {
    	$newEventArgs = &$event->getArgs();
    	if($event->isArgDefined('Name') && $event->getName()!=strtolower("showDeltaStep1") && $event->getArg('Name') == ""){
        	$newEventArgs['message'] = 'Tytuł jest polem wymaganym';
        	$newEventArgs['missingField'] = 'Name';
        	$this->announceEvent('showDeltaStep1', $newEventArgs);
        	return false;
    	} 
    	    			    
        if($event->isArgDefined('DeltaOrder') && $event->getName()!=strtolower("showDeltaStep1") && $event->getArg('DeltaOrder') == ""){
        	$newEventArgs['message'] = 'Kolejność jest polem wymaganym';
        	$newEventArgs['missingField'] = 'DeltaOrder';
        	$this->announceEvent('showDeltaStep1', $newEventArgs);
        	return false;
    	}
    	
      	return true;
    }
}
?>