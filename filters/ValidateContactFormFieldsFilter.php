<?
class filters_ValidateContactFormFieldsFilter extends MachII_framework_EventFilter
{
	function configure() {}
	
    function filterEvent(&$event)
    {
    	$newEventArgs = &$event->getArgs();
    	if ($event->isArgDefined('Name') && ($event->getArg('Name') == '')) {
        	$newEventArgs['message'] = 'txtName';
        	$newEventArgs['missingField'] = 'Name';
        	$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        	return false;
        }
			
    	if ($event->isArgDefined('Email') && ($event->getArg('Email') == '')) {
        	$newEventArgs['message'] = 'txtEmail';
        	$newEventArgs['missingField'] = 'Email';
        	$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        	return false;
        }
        if(!preg_match('|^[_a-z0-9.-]*[a-z0-9]@[_a-z0-9.-]*[a-z0-9].[a-z]{2,3}$|e', $event->getArg('Email'))) {
        	$newEventArgs['message'] = 'txtEmailIncorrect';
        	$newEventArgs['missingField'] = 'Email';
        	$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        	return false;
    	}
		if ($event->isArgDefined('PhoneNumber') && ($event->getArg('PhoneNumber') == '')) {
        	$newEventArgs['message'] = 'txtPhoneNumber';
        	$newEventArgs['missingField'] = 'PhoneNumber';
        	$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        	return false;
        }
		
		if ($event->isArgDefined('Message') && ($event->getArg('Message') == '')) {
        	$newEventArgs['message'] = 'txtMessage';
        	$newEventArgs['missingField'] = 'Message';
        	$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        	return false;
        }
		
    	return true;     
    }
}
?>
