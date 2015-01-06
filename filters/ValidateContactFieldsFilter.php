<?
class filters_ValidateContactFieldsFilter extends MachII_framework_EventFilter
{
	function configure() {}
	
    function filterEvent(&$event)
    {
    	$newEventArgs = &$event->getArgs();;
    	if ($event->isArgDefined('name') && ($event->getArg('name') == '')) {
    		$arrResult = array(validationResult => false,  
						  errorMessage => "First name is a required field.",
						  fieldName => "formContactName");
			echo json_encode($arrResult);
			return false;    		
        }
        if ($event->isArgDefined('fonction') && ($event->getArg('fonction') == '')) {
    		$arrResult = array(validationResult => false,  
						  errorMessage => "Last name is a required field.",
						  fieldName => "formContactFonction");
			echo json_encode($arrResult);
			return false;    		
        }
        if ($event->isArgDefined('enterprise') && ($event->getArg('enterprise') == '')) {
    		$arrResult = array(validationResult => false,  
						  errorMessage => "Phone is a required field.",
						  fieldName => "formContactEnterprise");
			echo json_encode($arrResult);
			return false;    		
        }
    	if ($event->isArgDefined('email') && ($event->getArg('email') == '')) {
    		$arrResult = array(validationResult => false,  
						  errorMessage => "E-mail is a required field.",
						  fieldName => "formContactEmail");
			echo json_encode($arrResult);
			return false;    		
        }
        if ($event->isArgDefined('message') && ($event->getArg('message') == '')) {
        	$arrResult = array(validationResult => false,  
						  errorMessage => "Message is a required field.",
						  fieldName => "formContactMessage");
			echo json_encode($arrResult);
			return false;
        }
        return true;        
    }
}
?>
