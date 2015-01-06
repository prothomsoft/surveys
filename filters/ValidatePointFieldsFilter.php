<?
class filters_ValidatePointFieldsFilter extends MachII_framework_EventFilter
{
	function configure() {}
	
    function filterEvent(&$event)
    {
    	$newEventArgs = &$event->getArgs();
    	
    	if ($event->isArgDefined('userId') && ($event->getArg('userId') == '')) {
        	$newEventArgs['message'] = 'Klient jest polem wymaganym';
        	$newEventArgs['missingField'] = 'userId';
        	$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        	return false;
        }
        
        if ($event->isArgDefined('amount') && ($event->getArg('amount') == '')) {
        	$newEventArgs['message'] = 'Ilość punktów jest polem wymaganym';
        	$newEventArgs['missingField'] = 'amount';
        	$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        	return false;
        }
        
        /*if ($event->isArgDefined('amount') && ($event->getArg('amount') > 0 )) {
        	$newEventArgs['message'] = 'Ilości punktów musi być liczbą ujemną';
        	$newEventArgs['missingField'] = 'amount';
        	$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        	return false;
        }*/
    	
    	return true;
    }
}
?>
