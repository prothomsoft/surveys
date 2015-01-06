<?
class filters_ValidateAlfaStep1Filter extends MachII_framework_EventFilter
{
	function configure() {}
	
    function filterEvent(&$event)
    {
    	$newEventArgs = &$event->getArgs();
    	if($event->isArgDefined('Name') && $event->getName()!=strtolower("showAlfaStep1") && $event->getArg('Name') == ""){
        	$newEventArgs['message'] = 'Tytuł jest polem wymaganym';
        	$newEventArgs['missingField'] = 'Name';
        	$this->announceEvent('showAlfaStep1', $newEventArgs);
        	return false;
    	} 
    	    			    
        if($event->isArgDefined('AlfaOrder') && $event->getName()!=strtolower("showAlfaStep1") && $event->getArg('AlfaOrder') == ""){
        	$newEventArgs['message'] = 'Kolejność jest polem wymaganym';
        	$newEventArgs['missingField'] = 'AlfaOrder';
        	$this->announceEvent('showAlfaStep1', $newEventArgs);
        	return false;
    	}
    	
      	return true;
    }
}
?>