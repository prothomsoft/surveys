<?php
/**
 * @package MachII
 */
/**
 * Handles request to event conversion.
 * @package MachII
 * @author Ben Edwards <ben@ben-edwards.com>
 * @author Alan Richmond <alan@aardwolfweb.com>
 */
class MachII_framework_RequestHandler
{
    /**
     * @var MachII_framework_AppManager
     * @private
     */
    var $_appManager;
    
    
    /**
     * @param MachII_framework_AppManager
     */
    function MachII_framework_RequestHandler(&$appManager)
    {
        $this->_setAppManager($appManager);
    }
    
    /**
     * Entry point for handling an incoming request.
     * @uses getRequestEventArgs()
     * @uses getEventName()
     * @uses handleEventRequest()
     */
    function handleRequest()
    {
        $eventArgs = $this->_getRequestEventArgs();
        $eventName = $this->_getEventName($eventArgs);
        
        $e = $this->handleEventRequest($eventName, $eventArgs);
        if (MachII::isException($e)) {
            return $e;
        }
    }
    
    /**
     * Handles the incoming event request.
     * 
     * Will announce the event and start event processing.
     * @uses MachII_framework_EventContext::announceEvent()
     * @uses MachII_framework_EventContext::processEvents()
     * @throws MachII_util_EventHandlerNotDefinedException
     * @throws MachII_util_EventIsPrivateException
     */
    function handleEventRequest($eventName, $eventArgs = array())
    {
        $appManager =& $this->_getAppManager();
        $eventManager =& $appManager->getEventManager();
        
        $eventContext =& $appManager->createEventContext();
        $GLOBALS['eventContext'] =& $eventContext;
        
        if ($eventManager->isEventDefined($eventName)) {
            if ($eventManager->isEventPublic($eventName)) {
                // Announce the event
                $e =& $eventContext->announceEvent($eventName, $eventArgs);
                if (MachII::isException($e)) {
                    return $e;
                }
            } else {// event not public
                $e =& new MachII_util_EventIsPrivateException(
                    array('eventName' => $eventName)
                );
                $eventContext->handleException($e, true);
            }// end isEventPublic
        } else {// event not defined
            $e =& new MachII_util_EventHandlerNotDefinedException(
                array('eventName' => $eventName)
            );
            $eventContext->handleException($e, true);
        }// end isEventDefined
        
        // Start the event processing
        $e =& $eventContext->processEvents();
        if (MachII::isException($e)) {
            $eventContext->handleException($e, true);
        }
    }
    
    /**
     * @access private
     * @param array associative array of event arguments.
     * @return string
     */
    function _getEventName($eventArgs)
    {
        $appManager =& $this->_getAppManager();
        $propertyManager =& $appManager->getPropertyManager();
        
        $eventParam = $propertyManager->getProperty('eventParameter');
        
        $eventName = (isset($eventArgs[$eventParam]))?
            $eventArgs[$eventParam]:
            $propertyManager->getProperty('defaultEvent');
        $eventName = strtolower($eventName);
        
        return $eventName;
    }
    
    /**
     * Merges global arrays into an associative array according to
     * the configured "parameterPrecedence".
     * 
     * @access private
     * @return array asociative array of event arguments
     */
    function &_getRequestEventArgs()
    {
        $varOrder = strtolower($this->_getRequestEventVariablesOrder());
        
        $eventArgs = array();
        
        $varOrderLen = strlen($varOrder);
        for ($i = 0; $i < $varOrderLen; $i++) {
            switch ($varOrder{$i}) {
                case 'e':
                    $eventArgs =& array_merge($eventArgs, $GLOBALS['_ENV']);
                    break;
                case 'g':
                    $eventArgs =& array_merge($eventArgs, $GLOBALS['_GET']);
                    break;
                case 'p':
                    $eventArgs =& array_merge($eventArgs, $GLOBALS['_POST']);
                    break;
                case 'c':
                    $eventArgs =& array_merge($eventArgs, $GLOBALS['_COOKIE']);
                    break;
                case 's':
                    $eventArgs =& array_merge($eventArgs, $GLOBALS['_SERVER']);
                    break;
                case 'r':
                    $eventArgs =& $GLOBALS['_REQUEST'];
                    break;
                case 'f':
                    $eventArgs =& array_merge($eventArgs, $GLOBALS['_FILES']);
                    break;
            } // switch $scope
        }
        
        return $eventArgs;
    }
    
    /**
     * The order that global arrays should be merged into event arguments.
     * 
     * Translates the value set by the configuration parameter
     * "parameterPrecedence" into a string where a letter corresponds
     * to the global array.
     * g = _GET (url)
     * p = _POST (form)
     * @access private
     * @return string default "gp"
     */
    function _getRequestEventVariablesOrder()
    {
        $appManager =& $this->_getAppManager();
        $propertyManager =& $appManager->getPropertyManager();
        
        $varOrder = strtolower($propertyManager->getProperty('parameterPrecedence'));
        
        switch($varOrder){
            case 'form':
            case '_post':
                $varOrder = 'gp';
                break;
                
            case 'url':
            case '_get':
                $varOrder = 'pg';
                break;
                
            case '_request':
                $varOrder = 'r';
                break;
                
            case 'variables_order':
                $varOrder = strtolower(ini_get('variables_order'));
                break;
        } // switch
        
        return $varOrder;
    }
    
    /**
     * @access private
     * @param MachII_framework_AppManager
     */
    function _setAppManager(&$appManager)
    {
        $this->_appManager =& $appManager;
    }
    
    /**
     * @access private
     * @return MachII_framework_AppManager
     */
    function &_getAppManager()
    {
        return $this->_appManager;
    }

}

?>
