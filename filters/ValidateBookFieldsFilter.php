<?
require_once("securimage/securimage.php");

class filters_ValidateBookFieldsFilter extends MachII_framework_EventFilter
{
	function configure() {}
	
    function filterEvent(&$event)
    {
    	$newEventArgs = &$event->getArgs();
    	
    	if ($event->isArgDefined('firstName') && ($event->getArg('firstName') == '')) {
        	$newEventArgs['message'] = 'First name is a required field';
        	$newEventArgs['missingField'] = 'firstName';
        	$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        	return false;
        }
        if ($event->isArgDefined('lastName') && ($event->getArg('lastName') == '')) {
        	$newEventArgs['message'] = 'Last name is a required field';
        	$newEventArgs['missingField'] = 'lastName';
        	$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        	return false;
        }
        if ($event->isArgDefined('companyName') && ($event->getArg('companyName') == '')) {
        	$newEventArgs['message'] = 'Comment is a required field';
        	$newEventArgs['missingField'] = 'companyName';
        	$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        	return false;
        }
        	
        return true;
    }
}
?>
