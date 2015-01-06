<?
class filters_ValidateUserFieldsFilter extends MachII_framework_EventFilter
{
	function configure() {}
	
    function filterEvent(&$event)
    {
    	$newEventArgs = &$event->getArgs();
    	    	    
    	if ($event->isArgDefined('email') && ($event->getArg('email') == '')) {
        	$newEventArgs['message'] = 'Epost er et obligatorisk felt';
        	$newEventArgs['missingField'] = 'email';
        	$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        	return false;
        }
        if ($event->isArgDefined('password') && ($event->getArg('password') == '')) {
        	$newEventArgs['message'] = 'Passord er et obligatorisk felt';
        	$newEventArgs['missingField'] = 'password';
        	$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        	return false;
        }
        return true;
    }
}
?>
