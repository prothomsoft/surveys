<?
class filters_ValidatePromocjaFieldsFilter extends MachII_framework_EventFilter
{
	function configure() {}
	
    function filterEvent(&$event)
    {
    	$newEventArgs = &$event->getArgs();
    	
    	if ($event->isArgDefined('createDate') && $event->isArgDefined('promocjaStartDate') && ($event->getArg('createDate') < $event->getArg('promocjaStartDate'))) {
        	$newEventArgs['message'] = 'Twoja data rejestracji w sklepie to '.$event->getArg('createDateView').'. Promocja obowiązuje od dnia 2011-08-16 i przeznaczona jest dla nowych klientów.';
        	$newEventArgs['missingField'] = '';
        	$this->announceEvent("bezplatny_pakiet_promocyjny", $newEventArgs);
        	return false;
        }
        
        if ($event->isArgDefined('testerStatus') && ($event->getArg('testerStatus') == 1)) {
        	$newEventArgs['message'] = 'Złożyłaś/łeś już zamówienie na zestaw promocyjny dnia: '.$event->getArg('testerDate');
        	$newEventArgs['missingField'] = '';
        	$this->announceEvent("bezplatny_pakiet_promocyjny", $newEventArgs);
        	return false;
        }
    	
    	if ($event->isArgDefined('nameFirst') && ($event->getArg('nameFirst') == '')) {
        	$newEventArgs['message'] = 'Imię jest polem wymaganym do zamówienia pakietu promocyjnego';
        	$newEventArgs['missingField'] = 'nameFirst';
        	$this->announceEvent("bezplatny_pakiet_promocyjny", $newEventArgs);
        	return false;
        }
        
        if ($event->isArgDefined('nameLast') && ($event->getArg('nameLast') == '')) {
        	$newEventArgs['message'] = 'Nazwisko jest polem wymaganym do zamówienia pakietu promocyjnego';
        	$newEventArgs['missingField'] = 'nameLast';
        	$this->announceEvent("bezplatny_pakiet_promocyjny", $newEventArgs);
        	return false;
        }
        
        if ($event->isArgDefined('street') && ($event->getArg('street') == '')) {
        	$newEventArgs['message'] = 'Ulica jest polem wymaganym do zamówienia pakietu promocyjnego';
        	$newEventArgs['missingField'] = 'street';
        	$this->announceEvent("bezplatny_pakiet_promocyjny", $newEventArgs);
        	return false;
        }
        
        if ($event->isArgDefined('number') && ($event->getArg('number') == '')) {
        	$newEventArgs['message'] = 'Nr domu/mieszkania jest polem wymaganym do zamówienia pakietu promocyjnego';
        	$newEventArgs['missingField'] = 'number';
        	$this->announceEvent("bezplatny_pakiet_promocyjny", $newEventArgs);
        	return false;
        }

        if ($event->isArgDefined('zip') && ($event->getArg('zip') == '')) {
        	$newEventArgs['message'] = 'Kod pocztowy jest polem wymaganym do zamówienia pakietu promocyjnego';
        	$newEventArgs['missingField'] = 'zip';
        	$this->announceEvent("bezplatny_pakiet_promocyjny", $newEventArgs);
        	return false;
        }
        
        if ($event->isArgDefined('city') && ($event->getArg('city') == '')) {
        	$newEventArgs['message'] = 'Miejscowość jest polem wymaganym do zamówienia pakietu promocyjnego';
        	$newEventArgs['missingField'] = 'city';
        	$this->announceEvent("bezplatny_pakiet_promocyjny", $newEventArgs);
        	return false;
        }
        
        if (!$event->isArgDefined('regulamin')) {
        	$newEventArgs['message'] = 'Prosimy o zapoznanie sie regulaminem promocji.';
        	$newEventArgs['missingField'] = 'regulamin';
        	$this->announceEvent("bezplatny_pakiet_promocyjny", $newEventArgs);
        	return false;
        }
        	
    	return true;
    }
}
?>
