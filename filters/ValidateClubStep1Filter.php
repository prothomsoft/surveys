<?
class filters_ValidateClubStep1Filter extends MachII_framework_EventFilter
{
	function configure() {}
	
    function filterEvent(&$event)
    {
    	$newEventArgs = &$event->getArgs();
    	if($event->isArgDefined('Name') && $event->getName()!=strtolower("showClubStep1") && $event->getArg('Name') == ""){
        	$newEventArgs['message'] = 'Tytuł jest polem wymaganym';
        	$newEventArgs['missingField'] = 'Name';
        	$this->announceEvent('showClubStep1', $newEventArgs);
        	return false;
    	} 
    	    			    
        if($event->isArgDefined('ClubOrder') && $event->getName()!=strtolower("showClubStep1") && $event->getArg('ClubOrder') == ""){
        	$newEventArgs['message'] = 'Kolejność jest polem wymaganym';
        	$newEventArgs['missingField'] = 'ClubOrder';
        	$this->announceEvent('showClubStep1', $newEventArgs);
        	return false;
    	}
    	
      	return true;
    }
}
?>