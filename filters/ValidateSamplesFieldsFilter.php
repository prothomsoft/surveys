<?
class filters_ValidateSamplesFieldsFilter extends MachII_framework_EventFilter
{
	function configure() {}
	
    function filterEvent(&$event)
    {
    	$newEventArgs = &$event->getArgs();;
    	if ($event->isArgDefined('email') && ($event->getArg('email') == '')) {
    		$arrResult = array(validationResult => false,  
						  errorMessage => "Adres email jest wymagany.",
						  fieldName => "formSamplesEmail");
			echo json_encode($arrResult);
			return false;    		
        }        
        return true;        
    }
}
?>
