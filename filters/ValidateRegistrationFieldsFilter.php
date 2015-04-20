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
        
        if ($event->isArgDefined('password') && ($event->getArg('password') == '')) {
        	$newEventArgs['message'] = 'txtPasswordEmpty';
        	$newEventArgs['missingField'] = 'password';
        	$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        	return false;
        }
        
        if (!$event->isArgDefined('phone1')) {
        	$newEventArgs['message'] = 'txtYComprisIsRequiredField';
        	$newEventArgs['missingField'] = 'phone1';
        	$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        	return false;
        }
        
        if ($event->isArgDefined('website1') && ($event->getArg('website1') == '')) {
        	$newEventArgs['message'] = 'txtDepuisCombienIsRequiredField';
        	$newEventArgs['missingField'] = 'website1';
        	$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        	return false;
        }
        
        if ($event->isArgDefined('website1') && ($event->getArg('website1') != '')) {
        	$website1 = $event->getArg('website1');        	
        	if(!is_numeric($website1)) {
        		$newEventArgs['message'] = 'txtOnlyNumericValueAllowed';
        		$newEventArgs['missingField'] = 'website1';
        		$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        		return false;
        	}
        }
        
        if (!$event->isArgDefined('phone2')) {
        	$newEventArgs['message'] = 'txtDansQuelleIsRequiredField';
        	$newEventArgs['missingField'] = 'phone2';
        	$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        	return false;
        }
                
        return true;        
    }
}
?>
