<?
class filters_ValidateChangeDetailsFieldsFilter extends MachII_framework_EventFilter
{
	function configure() {}
	
    function filterEvent(&$event)
    {
    	$newEventArgs = &$event->getArgs();
    	
    	if ($event->isArgDefined('website1') && ($event->getArg('website1') == '')) {
        	$newEventArgs['message'] = 'Depuis Combien is a required field.';
        	$newEventArgs['missingField'] = 'website1';
        	$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        	return false;
        }
        
        if ($event->isArgDefined('website1') && ($event->getArg('website1') != '')) {
        	$website1 = $event->getArg('website1');        	
        	if(!is_numeric($website1)) {
        		$newEventArgs['message'] = 'Only numeric values are allowed.';
        		$newEventArgs['missingField'] = 'website1';
        		$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        		return false;
        	}
        }
        
        return true;
    }
}
?>
