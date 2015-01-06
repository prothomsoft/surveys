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
        
		if ($event->isArgDefined('captcha_code') && ($event->getArg('captcha_code') == '')) {
        	$newEventArgs['message'] = 'Text from the image is a required field';
        	$newEventArgs['missingField'] = 'captcha_code';
        	$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        	return false;
        }
        
        $securimage = new Securimage();
        if ($securimage->check($event->getArg('captcha_code')) == false) {
        	$newEventArgs['message'] = 'Text from the image was typed incorrectly';
        	$newEventArgs['missingField'] = 'captcha_code';
        	$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        	return false;
        }		
        return true;
    }
}
?>
