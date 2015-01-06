<?
class filters_ValidateMemberFieldsFilter extends MachII_framework_EventFilter
{
	function configure() {}
	
    function filterEvent(&$event)
    {
    	$newEventArgs = &$event->getArgs();
    	
    	if ($event->isArgDefined('Name') && ($event->getArg('Name') == '')) {
        	$newEventArgs['message'] = 'Navn er et obligatorisk felt';
        	$newEventArgs['missingField'] = 'Name';
        	$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        	return false;
        }
        if ($event->isArgDefined('Adresse') && ($event->getArg('Adresse') == '')) {
        	$newEventArgs['message'] = 'Adresse er et obligatorisk felt';
        	$newEventArgs['missingField'] = 'Adresse';
        	$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        	return false;
        }
        if ($event->isArgDefined('Postnummer') && ($event->getArg('Postnummer') == '')) {
        	$newEventArgs['message'] = 'Postnummer er et obligatorisk felt';
        	$newEventArgs['missingField'] = 'Postnummer';
        	$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        	return false;
        }
        if ($event->isArgDefined('Sted') && ($event->getArg('Sted') == '')) {
        	$newEventArgs['message'] = 'Sted er et obligatorisk felt';
        	$newEventArgs['missingField'] = 'Sted';
        	$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        	return false;
        }
        if ($event->isArgDefined('Email') && ($event->getArg('Email') == '')) {
        	$newEventArgs['message'] = 'Email er et obligatorisk felt';
        	$newEventArgs['missingField'] = 'Email';
        	$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        	return false;
        }
        
        if ($event->isArgDefined('EmailRepeat') && ($event->getArg('EmailRepeat') == '')) {
        	$newEventArgs['message'] = 'Email er et obligatorisk felt';
        	$newEventArgs['missingField'] = 'EmailRepeat';
        	$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        	return false;
        }
        
        if (($event->getArg('Email') != $event->getArg('EmailRepeat'))) {
        	$newEventArgs['message'] = 'Angitte e-poster stemmer ikke';
        	$newEventArgs['missingField'] = 'EmailRepeat';
        	$this->announceEvent($event->getArg('failEvent'), $newEventArgs);
        	return false;
        }
        
        return true;        
    }
}
?>
