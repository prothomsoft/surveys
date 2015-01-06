<?
class filters_ValidateForgotPasswordFieldsFilter extends MachII_framework_EventFilter
{
	function configure() {}
	
    function filterEvent(&$event)
    {
    	$newEventArgs = &$event->getArgs();;
    	if ($event->isArgDefined('email') && ($event->getArg('email') == '')) {
        	$newEventArgs['message'] = 'txtEmailEmpty';
        	$newEventArgs['missingField'] = 'email';
        	$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        	return false;
        }
        if(!preg_match('|^[_a-z0-9.-]*[a-z0-9]@[_a-z0-9.-]*[a-z0-9].[a-z]{2,3}$|e', $event->getArg('email'))) {
        	$newEventArgs['message'] = 'txtEmailIncorrect';
        	$newEventArgs['missingField'] = 'email';
        	$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        	return false;
    	}
        return true;
    }
}
?>
