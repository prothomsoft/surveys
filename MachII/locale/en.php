<?php
/**
 * Error Messages for Locale "en"
 * @package MachII
 * @subpackage Localization
 * @author Alan Richmond <alan@aardwolfweb.com>
 */


$errorMessages = array(
    MACHII_ERROR =>
        'Unknown error.',
        
    MACHII_ERROR_IS_PROCESSING_EVENTS =>
        'The EventContext is already processing the events in the queue.  The processEvents() method can only be called once.',
        
    MACHII_ERROR_EVENT_HANDLER_NOT_DEFINED =>
        'The Event-handler for event "{eventName}" is not defined.',
        
    MACHII_ERROR_EVENT_IS_PRIVATE =>
        'The Event-handler for event "{eventName}" is not accessible.',
        
    MACHII_ERROR_EVENT_FILTER_NOT_DEFINED =>
        'The EventFilter "{eventFilter}" is not defined.',
        
    MACHII_ERROR_LISTENER_NOT_DEFINED =>
        'The Listener "{method}" is not defined.',
        
    MACHII_ERROR_PLUGIN =>
        'An error occurred in Plugin "{method}".',
        
    MACHII_ERROR_VIEW_NOT_DEFINED =>
        'The View "{viewName}" is not defined.',
        
    MACHII_ERROR_MAX_EVENTS_EXCEEDED =>
        'The maximum number of events ({maxEventsNum}) the framework will proccess for a single request has been exceeded.',
        
    MACHII_ERROR_LISTENER_INVOKER_DISPATCH_MAP_NOT_DEFINED =>
        'The Invoker for the Listener "{method}" requires a dispatch map.  The dispatch map for "{method}" is not defined.',
        
    MACHII_ERROR_LISTENER_INVOKER_ARG_COUNT_MISMATCH =>
        'Found incorrect number of arguments for "{method}".  {argsFoundNum} were found when {argsExpectedNum} were expected.',
    
    MACHII_ERROR_CUSTOM =>
        '',
        
    MACHII_ERROR_ABORT_EVENT_EXCEPTION =>
        '',
        
    MACHII_ERROR_CACHE_INIT =>
        'The Cache container "{container}" failed to initialize.',
        
    MACHII_ERROR_EVENT_FILTER =>
        'An error occurred in Filter "{method}".',
        
    MACHII_ERROR_EVENT_CONTEXT_NOT_SET =>
        'The EventContext necessary to announce events is not set in "$GLOBALS[\'eventContext\']".'
);

?>
