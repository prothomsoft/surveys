<?
class filters_ValidateSigmaStep1Filter extends MachII_framework_EventFilter
{
	function configure() {}
	
    function filterEvent(&$event)
    {
    	$newEventArgs = &$event->getArgs();
    	if($event->isArgDefined('Name') && $event->getName()!=strtolower("showSigmaStep1") && $event->getArg('Name') == ""){
        	$newEventArgs['message'] = 'Tytuł jest polem wymaganym';
        	$newEventArgs['missingField'] = 'Name';
        	$this->announceEvent('showSigmaStep1', $newEventArgs);
        	return false;
    	} 
    	    			    
        if($event->isArgDefined('SigmaOrder') && $event->getName()!=strtolower("showSigmaStep1") && $event->getArg('SigmaOrder') == ""){
        	$newEventArgs['message'] = 'Kolejność jest polem wymaganym';
        	$newEventArgs['missingField'] = 'SigmaOrder';
        	$this->announceEvent('showSigmaStep1', $newEventArgs);
        	return false;
    	}
    	
      	return true;
    }
}
?>