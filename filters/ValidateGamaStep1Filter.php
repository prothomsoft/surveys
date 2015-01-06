<?
class filters_ValidateGamaStep1Filter extends MachII_framework_EventFilter
{
	function configure() {}
	
    function filterEvent(&$event)
    {
    	$newEventArgs = &$event->getArgs();
    	if($event->isArgDefined('Name') && $event->getName()!=strtolower("showGamaStep1") && $event->getArg('Name') == ""){
        	$newEventArgs['message'] = 'Tytuł jest polem wymaganym';
        	$newEventArgs['missingField'] = 'Name';
        	$this->announceEvent('showGamaStep1', $newEventArgs);
        	return false;
    	} 
    	    			    
        if($event->isArgDefined('GamaOrder') && $event->getName()!=strtolower("showGamaStep1") && $event->getArg('GamaOrder') == ""){
        	$newEventArgs['message'] = 'Kolejność jest polem wymaganym';
        	$newEventArgs['missingField'] = 'GamaOrder';
        	$this->announceEvent('showGamaStep1', $newEventArgs);
        	return false;
    	}
    	
      	return true;
    }
}
?>