<?
class filters_ValidateTopicStep1Filter extends MachII_framework_EventFilter
{
	function configure() {}
	
    function filterEvent(&$event)
    {
    	$newEventArgs = &$event->getArgs();
    	
    	if($event->isArgDefined('Question') && $event->getName()!=strtolower("showTopicStep1") && $event->getArg('Question') == ""){
        	$newEventArgs['message'] = 'Question is a required field.';
        	$newEventArgs['missingField'] = 'Question';
        	$this->announceEvent('showTopicStep1', $newEventArgs);
        	return false;
    	} 
    	    			    
        if($event->isArgDefined('TopicOrder') && $event->getName()!=strtolower("showTopicStep1") && $event->getArg('TopicOrder') == ""){
        	$newEventArgs['message'] = 'Order is a required field.';
        	$newEventArgs['missingField'] = 'TopicOrder';
        	$this->announceEvent('showTopicStep1', $newEventArgs);
        	return false;
    	}
    	
      	return true;
    }
}
?>