<?
class filters_ValidateProducerFieldsFilter extends MachII_framework_EventFilter
{
	function configure() {}
	
    function filterEvent(&$event)
    {
    	$newEventArgs = &$event->getArgs();
    	    	    
    	if ($event->isArgDefined('name') && ($event->getArg('name') == '')) {
        	$newEventArgs['message'] = 'Producer name is a mandatory field';
        	$newEventArgs['missingField'] = 'name';
        	$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        	return false;
        }        
        return true;
    }
}
?>
