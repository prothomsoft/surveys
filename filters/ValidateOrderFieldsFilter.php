<?
class filters_ValidateOrderFieldsFilter extends MachII_framework_EventFilter
{
	function configure() {}
	
    function filterEvent(&$event)
    {
    	$newEventArgs = &$event->getArgs();
    	if ($event->isArgDefined('email') && ($event->getArg('email') == '')) {
        	$newEventArgs['message'] = 'E-post er et obligatorisk felt';
        	$newEventArgs['missingField'] = 'email';
        	$this->announceEvent("zamowienie_adres", $newEventArgs);
        	return false;
        }
        
        if ($event->isArgDefined('emailRepeat') && ($event->getArg('emailRepeat') == '')) {
        	$newEventArgs['message'] = 'E-post er et obligatorisk felt';
        	$newEventArgs['missingField'] = 'emailRepeat';
        	$this->announceEvent("zamowienie_adres", $newEventArgs);
        	return false;
        }
        
        if (($event->getArg('email') != $event->getArg('emailRepeat'))) {
        	$newEventArgs['message'] = 'Angitte e-poster stemmer ikke';
        	$newEventArgs['missingField'] = 'emailRepeat';
        	$this->announceEvent("zamowienie_adres", $newEventArgs);
        	return false;
        }
    	
    	if ($event->isArgDefined('nameFirst') && ($event->getArg('nameFirst') == '')) {
        	$newEventArgs['message'] = 'Fornavn er et obligatorisk felt';
        	$newEventArgs['missingField'] = 'nameFirst';
        	$this->announceEvent("zamowienie_adres", $newEventArgs);
        	return false;
        }
        
        if ($event->isArgDefined('nameLast') && ($event->getArg('nameLast') == '')) {
        	$newEventArgs['message'] = 'Etternavn er et obligatorisk felt';
        	$newEventArgs['missingField'] = 'nameLast';
        	$this->announceEvent("zamowienie_adres", $newEventArgs);
        	return false;
        }
        
        if ($event->isArgDefined('street') && ($event->getArg('street') == '')) {
        	$newEventArgs['message'] = 'Adresse er et obligatorisk felt';
        	$newEventArgs['missingField'] = 'street';
        	$this->announceEvent("zamowienie_adres", $newEventArgs);
        	return false;
        }
        
        if ($event->isArgDefined('number') && ($event->getArg('number') == '')) {
        	$newEventArgs['message'] = 'Husnummer er et obligatorisk felt';
        	$newEventArgs['missingField'] = 'number';
        	$this->announceEvent("zamowienie_adres", $newEventArgs);
        	return false;
        }

        if ($event->isArgDefined('zip') && ($event->getArg('zip') == '')) {
        	$newEventArgs['message'] = 'Postnummer er et obligatorisk felt';
        	$newEventArgs['missingField'] = 'zip';
        	$this->announceEvent("zamowienie_adres", $newEventArgs);
        	return false;
        }
        
        if ($event->isArgDefined('city') && ($event->getArg('city') == '')) {
        	$newEventArgs['message'] = 'By er et obligatorisk felt';
        	$newEventArgs['missingField'] = 'city';
        	$this->announceEvent("zamowienie_adres", $newEventArgs);
        	return false;
        }
        
        if ($event->isArgDefined('phone1') && ($event->getArg('phone1') == '')) {
        	$newEventArgs['message'] = 'By er et obligatorisk felt';
        	$newEventArgs['missingField'] = 'phone1';
        	$this->announceEvent("zamowienie_adres", $newEventArgs);
        	return false;
        }

        
            	
    	return true;
    }
}
?>
