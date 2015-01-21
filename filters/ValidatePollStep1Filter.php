<?
class filters_ValidatePollStep1Filter extends MachII_framework_EventFilter
{
	function configure() {}
	
    function filterEvent(&$event)
    {
    	$newEventArgs = &$event->getArgs();
    	if($event->isArgDefined('Status') && $event->getName()!=strtolower("showPollStep1") && $event->getArg('Status') == "1"){
    		$objPollGateway = new PollGateway();
    		$arrActive = $objPollGateway->findActive();
    		if(count($arrActive) > 1) {
    			$newEventArgs['message'] = 'Only one poll can be open for votes in time. SELECT In development status and click Save Changes button.';
    			$newEventArgs['missingField'] = 'Status';
    			$this->announceEvent('showPollStep1', $newEventArgs);
    			return false;
    		}
    	}
    	
    	if($event->isArgDefined('Question') && $event->getName()!=strtolower("showPollStep1") && $event->getArg('Question') == ""){
        	$newEventArgs['message'] = 'Question is a required field.';
        	$newEventArgs['missingField'] = 'Question';
        	$this->announceEvent('showPollStep1', $newEventArgs);
        	return false;
    	} 
    	    			    
        if($event->isArgDefined('PollOrder') && $event->getName()!=strtolower("showPollStep1") && $event->getArg('PollOrder') == ""){
        	$newEventArgs['message'] = 'Order is a required field.';
        	$newEventArgs['missingField'] = 'PollOrder';
        	$this->announceEvent('showPollStep1', $newEventArgs);
        	return false;
    	}
    	
      	return true;
    }
}
?>