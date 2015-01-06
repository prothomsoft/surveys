<?
class filters_ValidateProductStep1Filter extends MachII_framework_EventFilter
{
	function configure() {}
	
    function filterEvent(&$event)
    {
		$newEventArgs = &$event->getArgs();
		if($event->isArgDefined('BetaId') && $event->getName()!=strtolower("showProductStep1") && $event->getArg('BetaId') == ""){
			$newEventArgs['message'] = 'Product Category is a required field';
        	$newEventArgs['missingField'] = 'BetaId';
        	$this->announceEvent('showProductStep1', $newEventArgs);
        	return false;
        }    	
    	return true;
    }
}
?>
