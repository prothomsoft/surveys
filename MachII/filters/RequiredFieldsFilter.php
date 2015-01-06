<?php

/*
Author: Ben Edwards (ben@ben-edwards.com)
PHP Port: Alan Richmond (alan@aardwolfweb.com)

RequiredFieldsFilter
    This event-filter tests an event for required fields specified.
    If the required fields are not present (or are blank) then event 
    processing is aborted and a specified event is announced.
    
    If the required fields aren't defined then 'message' and 'missingFields' 
    are set in the event.
    
Configuration Parameters:
    None.
    
Event-Handler Parameters:
    "requiredFields" - a comma delimited list of fields required
    "invalidEvent" - the event to announce if all required fields are not in the event
*/

class MachII_filters_RequiredFieldsFilter extends MachII_framework_EventFilter
{

    var $REQUIRED_FIELDS_PARAM = 'requiredFields';
    
    var $INVALID_EVENT_PARAM = 'invalidEvent';
    
    
    function configure() {}
    
    
    // @return boolean
    function filterEvent(&$event, &$eventContext, $paramArgs = array())
    {
        if (!isset($paramArgs[$this->REQUIRED_FIELDS_PARAM])
        || (!isset($paramArgs[$this->INVALID_EVENT_PARAM]))) {
            $e = $this->_throwUsageException(get_class($this).'::'.__FUNCTION__.'()');
            return $e;
        }
        
        $requiredFields = explode(',', $paramArgs[$this->REQUIRED_FIELDS_PARAM]);
        $invalidEvent   = $paramArgs[$this->INVALID_EVENT_PARAM];
        
        foreach ($requiredFields as $field) {
            if (!$event->isArgDefined($field)
            || ($event->getArg($field) == false)) {
                $missingFields[] = $field;
            }
        }
        
        if (empty($missingFields)) {
            return true;
        } else {
            $newEventArgs =& $event->getArgs();
            $newEventArgs['message'] = 'Please provide all required fields. Missing fields: '.implode(', ', $missingFields).'.';
            $newEventArgs['missingFields'] = $missingFields;
            $eventContext->announceEvent($invalidEvent, $newEventArgs);
            
            return false;
        }
    }


    // @access private
    function _throwUsageException($method)
    {
        $e =& new MachII_util_EventFilterException(
            array(
                'method'  => $method,
                'message' => sprintf("RequiredFieldsFilter requires the following usage parameters: %s, %s.", $this->REQUIRED_FIELDS_PARAM, $this->INVALID_EVENT_PARAM)
            )
        );
        
        return $e;
    }
    
}

?>
