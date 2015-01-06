<?
class filters_ValidateProductStep2Filter extends MachII_framework_EventFilter
{
	function configure() {}
	
    function filterEvent(&$event)
    {
    	$newEventArgs = &$event->getArgs();
    	if($event->isArgDefined('Name') && $event->getName()!=strtolower("showProductStep2") && $event->getArg('Name') == ""){
        	$newEventArgs['message'] = 'Product name is a required field';
        	$newEventArgs['missingField'] = 'Name';
        	$this->announceEvent('showProductStep2', $newEventArgs);
        	return false;
    	} 
    	
    	if($event->isArgDefined('Price') && $event->getName()!=strtolower("showProductStep2") && $event->getArg('Price') == ""){
        	$newEventArgs['message'] = 'Price is a required field';
        	$newEventArgs['missingField'] = 'Price';
        	$this->announceEvent('showProductStep2', $newEventArgs);
        	return false;
    	} 
		    
        if($event->isArgDefined('ProductOrder') && $event->getName()!=strtolower("showProductStep2") && $event->getArg('ProductOrder') == ""){
        	$newEventArgs['message'] = 'Order is a required field';
        	$newEventArgs['missingField'] = 'ProductOrder';
        	$this->announceEvent('showProductStep2', $newEventArgs);
        	return false;
    	}
    	
      	return true;
    }
}
?>
