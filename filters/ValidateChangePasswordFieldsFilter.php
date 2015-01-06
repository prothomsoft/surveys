<?
class filters_ValidateChangePasswordFieldsFilter extends MachII_framework_EventFilter
{
	function configure() {}
	
    function filterEvent(&$event)
    {
    	$newEventArgs = &$event->getArgs();
    	    	    
    	if ($event->isArgDefined('password') && ($event->getArg('password') == '')) {
        	$newEventArgs['message'] = 'Gammelt passord er et obligatorisk felt.';
        	$newEventArgs['missingField'] = 'password';
        	$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        	return false;
        }
        
        // check if logged in user has this password
        if ($event->isArgDefined('password') && ($event->getArg('password') != '')) {
        	$objUserDao = new UserDao();
        	$password = $event->getArg('password');
        	
        	// email comes from session
        	$objAppSession=new AppSession();
        	if ($objAppSession->getSession("User") != "") {
        		$objUser = $objAppSession->getSession("User");
        		$email = $objUser->getEmail();
        	} else {
        		$email =  "";
        	}
        	
        	$objUserBean = $objUserDao->getByEmailAndPassword($email,$password);
        	
        	if($objUserBean->getUserId() == "") {
        		$newEventArgs['message'] = 'Ditt gamle passord finnes ikke i vår database.';
        		$newEventArgs['missingField'] = 'password';
        		$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        		return false;
        	}
        }
        
        if ($event->isArgDefined('newPassword') && ($event->getArg('newPassword') == '')) {
        	$newEventArgs['message'] = 'Nytt passord er et obligatorisk felt.';
        	$newEventArgs['missingField'] = 'newPassword';
        	$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        	return false;
        }
        if ($event->isArgDefined('repeatNewPassword') && ($event->getArg('repeatNewPassword') == '')) {
        	$newEventArgs['message'] = 'Gjenta gammelt passord er et obligatorisk felt';
        	$newEventArgs['missingField'] = 'repeatNewPassword';
        	$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        	return false;
        }
        
        if ($event->isArgDefined('newPassword') && ($event->getArg('newPassword') != '') && $event->isArgDefined('repeatNewPassword') && ($event->getArg('repeatNewPassword') != '') && $event->getArg('newPassword') != $event->getArg('repeatNewPassword')) {
        	$newEventArgs['message'] = 'Gjenta gammelt passord ble ikke skrevet inn riktig';
        	$newEventArgs['missingField'] = 'repeatNewPassword';
        	$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        	return false;
        }
        
        return true;
    }
}
?>
