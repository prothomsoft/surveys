<?php
/*
Author: Ben Edwards (ben@ben-edwards.com)
PHP Port: Alan Richmond (alan@aardwolfweb.com)

PermissionsFilter
    This event-filter tests an event for required permissions specified.
    If the required permissions are not possessed by the user then event
    processing is aborted and a specified event is announced.
    
Configuration Parameters:
    ["requiredPermissions"] - default comma delimited list of permission keys required to process the event
    ["invalidEvent"] - default event to announce if all required permissions are not possessed by the user
    ["invalidMessage"] - default message to provide if the all required permissions are not possessed by the user 
    ["clearEventQueue"] - whether or not to clear the event queue if the permissions are invalid (defaults to true)
    
Event-Handler Parameters:
    "requiredPermissions" - a comma delimited list of permission keys required to process the event
    "invalidEvent" - the event to announce if all required permissions are not possessed by the user
    ["invalidMessage"] - the message to provide if the all required permissions are not possessed by the user 
    ["clearEventQueue"] - whether or not to clear the event queue if the permissions are invalid (defaults to true)
*/

class MachII_filters_PermissionsFilter extends MachII_framework_EventFilter
{
    var $REQUIRED_PERMISSIONS_PARAM = 'requiredPermissions';
    
    var $INVALID_EVENT_PARAM = 'invalidEvent';
    
    var $INVALID_MESSAGE_PARAM = 'invalidMessage';
    
    var $CLEAR_EVENT_QUEUE_PARAM = 'clearEventQueue';
    
    
    
    function configure() {}
    
    
    function filterEvent(&$event, &$eventContext, $paramArgs = array())
    {
        $isContinue = true;
        
        // requiredPermissions
        $requiredPermissions = (isset($paramArgs[$this->REQUIRED_PERMISSIONS_PARAM]))?
            $paramArgs[$this->REQUIRED_PERMISSIONS_PARAM]:
            $this->getParameter($this->REQUIRED_PERMISSIONS_PARAM, null);
        
        // invalidEvent
        $invalidEvent = (isset($paramArgs[$this->INVALID_EVENT_PARAM]))?
            $paramArgs[$this->INVALID_EVENT_PARAM]:
            $this->getParameter($this->INVALID_EVENT_PARAM, null);
        
        // invalidMessage
        $invalidMessage = (isset($paramArgs[$this->INVALID_MESSAGE_PARAM]))?
            $paramArgs[$this->INVALID_MESSAGE_PARAM]:
            $this->getParameter($this->INVALID_MESSAGE_PARAM, null);
        
        // clearEventQueue
        $clearEventQueue = (isset($paramArgs[$this->INVALID_EVENT_QUEUE_PARAM]))?
            $paramArgs[$this->INVALID_EVENT_QUEUE_PARAM]:
            $this->getParameter($this->INVALID_EVENT_QUEUE_PARAM, true);
        
        // Ensure required parameters are specified.
        if ((!empty($requiredPermissions))
        && (!empty($invalidEvent))) {
            $userPermissions = $this->getUserPermissions();
            $isContinue = $this->validatePermissions($requiredPermissions, $userPermissions);
        } else {
            $e = $this->_throwUsageException(get_class($this).'::'.__FUNCTION__.'()');
            return $e;
        }
        
        if ($isContinue) {
            // If the permissions are acceptable then return true to continue processing the current event.
            return true;
        } else {
            // Clear the event queue if supposed to.
            if ($clearEventQueue) {
                $eventContext->clearEventQueue();
            }
            
            // Announce the invalidEvent.
            $newEventArgs =& $event->getArgs();
            $newEventArgs[$this->INVALID_MESSAGE_PARAM] = $invalidEvent;
            $eventContext->announceEvent($invalidEvent, $newEventArgs);
            
            // Return false to abort the processing of the current event.
            return false;
        }
    }
    
    
    function getUserPermissions()
    {
        // Overwrite to specifiy where to find the user's permissions.
        // Defaults to $_SESSION['permissions'].
        return (isset($_SESSION['permissions']))?$_SESSION['permissions']:null;
    }
    
    
    function validatePermissions($requiredPermissions, $userPermissions)
    {
        $reqPerms  = split(',', strtolower($requiredPermissions));
        $userPerms = split(',', strtolower($userPermissions));
        
        $isValidated = true;
        
        foreach ($reqPerms as $reqPerm) {
            if (!in_array($reqPerm, $userPerms)) {
                $isValidated = false;
            }
        }
        
        return $isValidated;
    }
    
    
    // @access private
    function _throwUsageException()
    { 
    	$method = "";
        $e =& new MachII_util_EventFilterException(
            array(
                'method'  => $method,
                'message' => sprintf("PermissionsFilter requires the following usage parameters: %s, %s.", $this->REQUIRED_PERMISSIONS_PARAM, $this->INVALID_EVENT_PARAM)
            )
        );
        
        return $e;
    }
}

?>
