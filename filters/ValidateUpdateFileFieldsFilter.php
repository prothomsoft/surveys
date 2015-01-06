<?
class filters_ValidateUpdateFileFieldsFilter extends MachII_framework_EventFilter
{
	function configure() {}
	
    function filterEvent(&$event)
    {
    	$newEventArgs = &$event->getArgs();
    	if ($event->isArgDefined('Title') && ($event->getArg('Title') == '')) {
        	$newEventArgs['message'] = 'Title of the page is a mandatory field';
        	$newEventArgs['missingField'] = 'Title';
        	$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        	return false;
        }
        if ($event->isArgDefined('CmsCategoryId') && ($event->getArg('CmsCategoryId') == '')) {
        	$newEventArgs['message'] = 'Category if the page is a mandatory field';
        	$newEventArgs['missingField'] = 'CmsCategoryId';
        	$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        	return false;
        }
        if ($event->isArgDefined('SeoKeywords') && ($event->getArg('SeoKeywords') == '')) {
        	$newEventArgs['message'] = 'Seo Keywords is a mandatory field';
        	$newEventArgs['missingField'] = 'SeoKeywords';
        	$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        	return false;
        }
        if ($event->isArgDefined('SeoDescription') && ($event->getArg('SeoDescription') == '')) {
        	$newEventArgs['message'] = 'Seo Description is a mandatory field';
        	$newEventArgs['missingField'] = 'SeoDescription';
        	$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        	return false;
        }
        if ($event->isArgDefined('LongContent') && ($event->getArg('LongContent') == '')) {
        	$newEventArgs['message'] = 'Content is a mandatory field';
        	$newEventArgs['missingField'] = 'LongContent';
        	$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        	return false;
        }
        
        return true;
    }
}
?>
