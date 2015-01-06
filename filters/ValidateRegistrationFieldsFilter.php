<?
class filters_ValidateRegistrationFieldsFilter extends MachII_framework_EventFilter
{
	function configure() {}
	
    function filterEvent(&$event)
    {
    	$newEventArgs = &$event->getArgs();
    	if ($event->isArgDefined('email') && ($event->getArg('email') == '')) {
    		$newEventArgs['message'] = 'txtEmailEmpty';
    		$newEventArgs['missingField'] = 'email';
    		$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
    		return false;
    	}
    	
        // check if such email is in database
        if ($event->isArgDefined('email') && ($event->getArg('email') != '')) {
        	$objUserDao = new UserDao();
        	$email = $event->getArg('email');
        	$objUserBean = $objUserDao->getByEmail($email);
        	if($objUserBean->getUserId() != "") {
        		$newEventArgs['message'] = 'txtEmailAlreadyExists';
        		$newEventArgs['missingField'] = 'email';
        		$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        		return false;        		
        	}
        }
        
        if ($event->isArgDefined('email') && ($event->getArg('email') == '')) {
        	$newEventArgs['message'] = 'txtPasswordEmpty';
        	$newEventArgs['missingField'] = 'password';
        	$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        	return false;
        }        
        return true;        
    }
}
?>
