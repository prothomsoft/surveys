<?
class filters_ValidateCmsContentStep1Filter extends MachII_framework_EventFilter
{
	function configure() {}
	
    function filterEvent(&$event)
    {
    	$newEventArgs = &$event->getArgs();
    	if($event->isArgDefined('Name') && $event->getName()!=strtolower("showCmsContentStep1") && $event->getArg('Name') == ""){
        	$newEventArgs['message'] = 'Tytuł jest polem wymaganym';
        	$newEventArgs['missingField'] = 'Name';
        	$this->announceEvent('showCmsContentStep1', $newEventArgs);
        	return false;
    	} 
    	    			    
        if($event->isArgDefined('CmsContentOrder') && $event->getName()!=strtolower("showCmsContentStep1") && $event->getArg('CmsContentOrder') == ""){
        	$newEventArgs['message'] = 'Kolejność jest polem wymaganym';
        	$newEventArgs['missingField'] = 'CmsContentOrder';
        	$this->announceEvent('showCmsContentStep1', $newEventArgs);
        	return false;
    	}
    	
      	return true;
    }
}
?>