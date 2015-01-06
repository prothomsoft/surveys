<?
class filters_ValidateRezerwacjaFieldsFilter extends MachII_framework_EventFilter
{
	function configure() {}
	
    function filterEvent(&$event)
    {
    	$newEventArgs = &$event->getArgs();;
    	
        if ($event->isArgDefined('firstName') && ($event->getArg('firstName') == '')) {
        	$newEventArgs['message'] = 'Imię jest polem wymaganym';
        	$newEventArgs['missingField'] = 'firstName';
        	$this->announceEvent("rezerwacja", $newEventArgs);
        	return false;
        }
        
        if ($event->isArgDefined('lastName') && ($event->getArg('lastName') == '')) {
        	$newEventArgs['message'] = 'Nazwisko jest polem wymaganym';
        	$newEventArgs['missingField'] = 'lastName';
        	$this->announceEvent("rezerwacja", $newEventArgs);
        	return false;
        }
        
        if ($event->isArgDefined('email') && ($event->getArg('email') == '')) {
        	$newEventArgs['message'] = 'Adres email jest polem wymaganym';
        	$newEventArgs['missingField'] = 'email';
        	$this->announceEvent("rezerwacja", $newEventArgs);
        	return false;
        }
        
        if ($event->isArgDefined('street') && ($event->getArg('street') == '')) {
        	$newEventArgs['message'] = 'Ulica jest polem wymaganym';
        	$newEventArgs['missingField'] = 'street';
        	$this->announceEvent("rezerwacja", $newEventArgs);
        	return false;
        }
        
        if ($event->isArgDefined('number') && ($event->getArg('number') == '')) {
        	$newEventArgs['message'] = 'Numer domu/mieszkania jest polem wymaganym';
        	$newEventArgs['missingField'] = 'number';
        	$this->announceEvent("rezerwacja", $newEventArgs);
        	return false;
        }
        
        if ($event->isArgDefined('code') && ($event->getArg('code') == '')) {
        	$newEventArgs['message'] = 'Kod pocztowy jest polem wymaganym';
        	$newEventArgs['missingField'] = 'code';
        	$this->announceEvent("rezerwacja", $newEventArgs);
        	return false;
        }
        
        if ($event->isArgDefined('city') && ($event->getArg('city') == '')) {
        	$newEventArgs['message'] = 'Miasto jest polem wymaganym';
        	$newEventArgs['missingField'] = 'city';
        	$this->announceEvent("rezerwacja", $newEventArgs);
        	return false;
        }
        
        if ($event->isArgDefined('phone') && ($event->getArg('phone') == '')) {
        	$newEventArgs['message'] = 'Telefon jest polem wymaganym';
        	$newEventArgs['missingField'] = 'phone';
        	$this->announceEvent("rezerwacja", $newEventArgs);
        	return false;
        }
        
        return true;        
    }
}
?>
