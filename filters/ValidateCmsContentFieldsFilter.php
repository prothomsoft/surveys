<?
class filters_ValidateCmsContentFieldsFilter extends MachII_framework_EventFilter
{
	function configure() {}
	
    function filterEvent(&$event)
    {
    	$newEventArgs = &$event->getArgs();
    		if ($event->isArgDefined('name') && ($event->getArg('name') == '')) {
        	$newEventArgs['message'] = 'Tytuł strony jest polem wymaganym';
        	$newEventArgs['missingField'] = 'name';
        	$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        	return false;
        }
        if ($event->isArgDefined('longContent') && ($event->getArg('longContent') == '')) {
        	$newEventArgs['message'] = 'Zawartość strony jest polem wymaganym';
        	$newEventArgs['missingField'] = 'longContent';
        	$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        	return false;
        }
        
        return true;
    }
}
?>
