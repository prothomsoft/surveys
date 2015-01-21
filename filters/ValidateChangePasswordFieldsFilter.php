<?
class filters_ValidateChangePasswordFieldsFilter extends MachII_framework_EventFilter
{
	function configure() {}
	
    function filterEvent(&$event)
    {
    	$newEventArgs = &$event->getArgs();
    	
        if ($event->isArgDefined('newPassword') && ($event->getArg('newPassword') == '')) {
        	$newEventArgs['message'] = 'txtNewPasswordRequired';
        	$newEventArgs['missingField'] = 'newPassword';
        	$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        	return false;
        }
        if ($event->isArgDefined('repeatNewPassword') && ($event->getArg('repeatNewPassword') == '')) {
        	$newEventArgs['message'] = 'txtRepeatNewPasswordRequired';
        	$newEventArgs['missingField'] = 'repeatNewPassword';
        	$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        	return false;
        }
        
        if ($event->isArgDefined('newPassword') && ($event->getArg('newPassword') != '') && $event->isArgDefined('repeatNewPassword') && ($event->getArg('repeatNewPassword') != '') && $event->getArg('newPassword') != $event->getArg('repeatNewPassword')) {
        	$newEventArgs['message'] = 'txtPasswordMismatch';
        	$newEventArgs['missingField'] = 'repeatNewPassword';
        	$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        	return false;
        }
        
        return true;
    }
}
?>
