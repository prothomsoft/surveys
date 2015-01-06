<?php
/**
 * @package MachII
 */
/**
 * 
 */
require_once 'MachII/util/SizedQueue.php';
require_once 'MachII/framework/ViewContext.php';

/**
 * Controls the event queue and event processing mechanism for
 * a request/event lifecycle.
 * @package MachII
 * @author Ben Edwards <ben@ben-edwards.com>
 * @author Alan Richmond <alan@aardwolfweb.com>
 */
class MachII_framework_EventContext
{
    /**
     * @var integer
     * @access private
     */
    var $_eventCount = 0;
    
    /**
     * @var MachII_framework_ViewContext
     * @access private
     */
    var $_viewContext;
    
    /**
     * @var MachII_framework_AppManager
     * @access private
     */
    var $_appManager;
    
    /**
     * @var SizedQueue
     * @access private
     */
    var $_eventQueue;
    
    /**
     * @var MachII_framework_EventHandler
     * @access private
     */
    var $_currentEventHandler;
    
    /**
     * @var MachII_framework_Event MachII_framework_Event or descendant
     * @access private
     */
    var $_currentEvent;
    
    /**
     * @var array associative array of event name aliases
     * @access private
     */
    var $_mappings = array();
    
    /**
     * @var string
     * @access private
     */
    var $_exceptionEventName;
    
    /**
     * @var integer really it's a string from the configuration file
     * @access private
     */
    var $_maxEvents;
    
    /**
     * @var MachII_framework_Event MachII_framework_Event or descendant
     * @access private
     */
    var $_previousEvent;
    
    
    /**
     * Initalizes the event-context.
     * 
     * @uses SizedQueue
     * @uses MachII_framework_ViewContext
     * @param MachII_framework_AppManager
     */
    function MachII_framework_EventContext(&$appManager)
    {
        $this->_setAppManager($appManager);
        
        $propManager =& $appManager->getPropertyManager();
        $this->setExceptionEventName($propManager->getProperty('exceptionEvent'));
        
        $maxEvents = $propManager->getProperty('maxEvents');
        $this->setMaxEvents($maxEvents);
        
        // Setup the event queue
        $eventQueue =& new MachII_util_SizedQueue($maxEvents);
        $this->_setEventQueue($eventQueue);
        
        // Setup the view context
        $viewContext =& new MachII_framework_ViewContext($appManager);
        $this->_setViewContext($viewContext);
    }
    
    /**
     * Announce an Event
     * 
     * Queues an event for the framework to handle.  Announces an event
     * that will cause any listeners that have registered an interest in
     * that event to execute.
     * @param string
     * @param array associative array of event arguments
     */
    function announceEvent($eventName, &$eventArgs)
    {//echo 'announcing: ',$eventName,'<br />';
        // Check for event mapping
        $nextEventName = $this->getEventMapping($eventName);
        
        $appManager   =& $this->_getAppManager();
        $eventManager =& $appManager->getEventManager();
        // Create the event
        $nextEvent =& $eventManager->createEvent($nextEventName, $eventArgs);
        //echo "next event: $nextEventName<pre>",var_dump($nextEvent),'</pre>';
        if (MachII::isException($nextEvent)) {
            return $nextEvent;
        }
        
        // Queue the event
        $eventQueue =& $this->_getEventQueue();
        $e = $eventQueue->put($nextEvent);
        if (!$e) {
            $e =& new MachII_util_MaxEventsExceededException(
                array('maxEventsNum' => $this->getMaxEvents())
            );
            return $e;
        }
    }
    
    /**
     * Process Event Queue
     * 
     * Begins processing of queued events. Can only be called once.
     * 
     * Executes in the following order:
     * <ol>
     *     <li>{@link MachII_framework_Event::preProcess()}</li>
     *     <li>{@link MachII_framework_EventHandler::handleNextEvent()}</li>
     *     <li>{@link MachII_framework_Event::postProcess()}</li>
     * </ol>
     * @uses MachII_framework_Event::preProcess()
     * @uses handleNextEvent()
     * @uses MachII_framework_Event::postProcess()
     * @staticvar boolean $isProcessing
     * @throws MachII_util_MaxEventsExceededException
     */
    function processEvents()
    {
        //echo 'processing events.<br />';
        static $isProcessing = false;
        
        if ($isProcessing == true) {
            $e =& new MachII_util_IsProcessingEventsException();
            return $e;
        }
        // Lock event processing
        $isProcessing = true;
        
        $appManager    =& $this->_getAppManager();
        $pluginManager =& $appManager->getPluginManager();
        $eventManager  =& $appManager->getEventManager();
        
        // Pre-process
        $e = $pluginManager->preProcess($this);
        if (MachII::isException($e)) {
            return $e;
        }
        
        //echo '<pre>',var_dump($eventQueue),'</pre>';
        //$GLOBALS['vard']->display(debug_backtrace());
        // Process
        //echo 'has more events: ',var_dump($this->hasMoreEvents()),'<br />';
        //echo 'event count: ',$this->getEventCount(),'<br />';
        //echo 'under max events: ',var_dump(($this->getEventCount() < $this->getMaxEvents())),'<br />';
        while ($this->hasMoreEvents()
        && ($this->getEventCount() < $this->getMaxEvents())) {
        //echo 'handling event.<br />';
            $this->_handleNextEvent();
        }
        
        // If there are still events in the queue after done processing, then throw an exception.
        $eventQueue =& $this->_getEventQueue();
        if (!$eventQueue->isEmpty()) {
            $e =& new MachII_util_MaxEventsExceededException(
                array('maxEventsNum' => $this->getMaxEvents())
            );
            $this->handleException($e, true);
        }
        
        // Post-process
        $e = $pluginManager->postProcess($this);
        if (MachII::isException($e)) {
            return $e;
        }
        
        // Unlock event processing
        $isProcessing = false;
    }  
     
    /**
     * @param MachII_framework_Event or descendant
     */
    function setCurrentEvent(&$currentEvent)
    {
        $this->_currentEvent =& $currentEvent;
    }
    
    /**
     * @return MachII_framework_Event or descendant
     */
    function &getCurrentEvent()
    {
        return $this->_currentEvent;
    }
    
    /**
     * @return boolean
     */
    function hasCurrentEvent()
    {
        return is_a($this->_currentEvent, 'MachII_framework_Event');
    }
    
    /**
     * Peeks at the next event in the queue.
     * @return MachII_framework_Event MachII_framework_Event or descendant
     */
    function &getNextEvent()
    {
        $eventQueue =& $this->_getEventQueue();
        $nextEvent  =& $eventQueue->peek();
        //$GLOBALS['vard']->display($nextEvent);
        return $nextEvent;
    }
    
    /**
     * Returns whether there is another event in the queue.
     * 
     * This is an alias for {@link hasMoreEvents()}.
     * @return boolean
     */
    function hasNextEvent()
    {
        return $this->hasMoreEvents();
    }
    
    /**
     * @access private
     * @param MachII_framework_Event MachII_framework_Event or descendant
     */
    function _setPreviousEvent(&$previousEvent)
    {
        $this->_previousEvent =& $previousEvent;
    }
    
    /**
     * Returns the previous handled event.
     * @return MachII_framework_Event MachII_framework_Event or descendant
     */
    function &getPreviousEvent()
    {
        return $this->_previousEvent;
    }
    
    /**
     * Returns whether or not {@link getPreviousEvent()} can be called
     * to return an event.
     * @return boolean
     */
    function hasPreviousEvent()
    {
        return isset($this->_previousEvent);
    }
        
    /**
     * Returns whether there is another event in the queue.
     * 
     * This has an alias called {@link hasNextEvent()}.
     * return boolean
     */
    function hasMoreEvents()
    {
        $eventQueue =& $this->_getEventQueue();
        return !$eventQueue->isEmpty();
    }
    
    /**
     * @param string
     * @param string
     */
    function setEventMapping($eventName, $mappingName)
    {
        $this->_mappings[$eventName] = $mappingName;
    }
    
    /**
     * @return string
     */
    function getEventMapping($eventName)
    {
        $eventName = strtolower($eventName);
        
        return (isset($this->_mappings[$eventName]))?
                $this->_mappings[$eventName]:
                $eventName;
    }
    
    /**
     * 
     */
    function clearEventMappings()
    {
        $this->_mappings = array();
    }
    
    /**
     * @param Exception
     * @return Exception
     */
    function &createException($e)
    {
        return $e;
    }
    
    /**
     * Execute the registered exception event
     * 
     * The name of the exception event is set in the configuration file.
     * @param MachII_util_Exception
     * @param boolean
     */
    function handleException(&$exception, $clearEventQueue = true)
    {
        $eventQueue    =& $this->_getEventQueue();
        
        $appManager    =& $this->_getAppManager();
        $eventManager  =& $appManager->getEventManager();
        $pluginManager =& $appManager->getPluginManager();
        
        $nextEventName = $this->getEventMapping($this->getExceptionEventName());
        
        $eventArgs = array();
        $exceptionEvent =& $eventManager->createEvent($nextEventName, $eventArgs);
        if (MachII::isException($exceptionEvent)) {
            $newException =& $exceptionEvent;
            trigger_error('An error occurred while handling an exception: '.$newException->getMessage().' The original exception was: '.$exception->getMessage(), E_USER_ERROR);
        }
        $exceptionEvent->setArg('exception', $exception);
        
        if ($this->hasCurrentEvent()) {
            $exceptionEvent->setArg('exceptionEvent', $this->getCurrentEvent());
        }
        
        $pluginManager->handleException($this, $exception);
        
        if ($clearEventQueue) {
            $this->clearEventQueue();
        }
        
        $eventQueue->put($exceptionEvent);
    }
    
    /**
     * Display an event's views
     * 
     * Executes in the following order:
     * <ol>
     *     <li>{@link MachII_framework_Plugin::preView()}</li>
     *     <li>{@link MachII_framework_ViewContext::displayView()}</li>
     *     <li>{@link MachII_framework_Plugin::postView()}</li>
     * </ol>
     * @uses MachII_framework_Plugin::preView()
     * @uses MachII_framework_ViewContext::displayView()
     * @uses MachII_framework_Plugin::postView()}
     * @param MachII_framework_Event or descendant
     * @param string
     * @param string
     * @param boolean
     */
    function displayView(&$event, $viewName, $contentKey, $append = false)
    {//echo 'EventContext->displayView - $viewName: ',$viewName,'<br />';
        $appManager    =& $this->_getAppManager();
        $pluginManager =& $appManager->getPluginManager();
        
        $viewContext =& $this->_getViewContext();
        
        // Pre-view
        $e =& $pluginManager->preView($this);
        if (MachII::isException($e)) {
            return $e;
        }
        
        // Display view
        $e =& $viewContext->displayView($event, $viewName, $contentKey, $append);
        if (MachII::isException($e)) {
            return $e;
        }
        
        // Post-view
        $e =& $pluginManager->postView($this);
        if (MachII::isException($e)) {
            return $e;
        }
    }
    
    /**
     * @param integer
     */
    function setMaxEvents($maxEvents)
    {
        $this->_maxEvents = $maxEvents;
    }
    
    /**
     * @return integer
     */
    function getMaxEvents()
    {
        return $this->_maxEvents;
    }
    
    /**
     * @param string
     */
    function setExceptionEventName($exceptionEventName)
    {
        $this->_exceptionEventName = strtolower($exceptionEventName);
    }
    
    /**
     * @return string
     */
    function getExceptionEventName()
    {
        return $this->_exceptionEventName;
    }
    
    /**
     * Clears the event queue.
     */
    function clearEventQueue()
    {
        $eventQueue =& $this->_getEventQueue();
        $eventQueue->clear();
    }
    
    /**
     * Returns the number of events that have been processed for this context.
     * 
     * @return integer
     */
    function getEventCount()
    {
        return $this->_eventCount;
    }    
    
    /**
     * Execute the next event in the queue
     * 
     * If the event returns an error, pass it to the exception handler.
     * @access private
     * @uses getNextEvent()
     * @uses _handleEvent()
     * @uses handleException()
     */
    function _handleNextEvent()
    {
        $eventQueue =& $this->_getEventQueue();
        
        $this->_incrementEventCount();
        
        $e =& $this->_handleEvent($eventQueue->get());
        if ((MachII::isException($e))
        && (!is_a($e, 'MachII_util_AbortEventException'))) {
            $this->handleException($e, true);
        }
    }
    
    /**
     * Execute an event.
     * 
     * Executes in the following order:
     * <ol>
     *     <li>{@link MachII_framework_Plugin::preEvent()}</li>
     *     <li>{@link MachII_framework_Event::preInvoke()}</li>
     *     <li>{@link MachII_framework_EventHandler::handleEvent()}</li>
     *     <li>{@link MachII_framework_Event::postInvoke()}</li>
     *     <li>{@link MachII_framework_Plugin::postEvent()}</li>
     * </ol>
     * @access private
     * @global MachII_framework_Event Sets $GLOBALS['event'] to the current
     *         MachII_framework_Event or descendant.
     * @uses MachII_framework_Plugin::preEvent()
     * @uses MachII_framework_Event::preInvoke()
     * @uses MachII_framework_EventHandler::handleEvent()
     * @uses MachII_framework_Event::postInvoke()
     * @uses MachII_framework_Plugin::postEvent()
     * @param MachII_framework_Event MachII_framework_Event or descendant
     */
    function _handleEvent(&$event)
    {
        if ($this->hasCurrentEvent()) {
            $this->_setPreviousEvent($this->getCurrentEvent());
        }
        $this->setCurrentEvent($event);
        $GLOBALS['event'] =& $event;
        
        $eventName = $event->getName();
        
        $appManager =& $this->_getAppManager();
        
        $eventManager =& $appManager->getEventManager();
        $eventHandler =& $eventManager->getEventHandler($eventName);
        $this->_setCurrentEventHandler($eventHandler);
        
        // Pre-invoke
        $pluginManager =& $appManager->getPluginManager();
        $e =& $pluginManager->preEvent($this);
        if (MachII::isException($e)) {
            return $e;
        }
        
        // Invoke event
        $e =& $eventHandler->handleEvent($event, $this);
        if (MachII::isException($e)) {
            return $e;
        }
        
        // Post invoke
        $e =& $pluginManager->postEvent($this);
        if (MachII::isException($e)) {
            return $e;
        }
        
        $this->clearEventMappings();
    }
    
    /**
     * @access private
     * @param MachII_framework_EventHandler
     */
    function _setCurrentEventHandler(&$currentEventHandler)
    {
        $this->_currentEventHandler =& $currentEventHandler;
    }
    
    /**
     * @access private
     * @return MachII_framework_EventHandler
     */
    function &_getCurrentEventHandler()
    {
        return $this->_currentEventHandler;
    }
    
    /**
     * @access private
     */
    function _incrementEventCount()
    {
        $this->_eventCount++;
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
    
    /**
     * @param MachII_framework_ViewContext
     */
    function _setViewContext(&$viewContext)
    {
        $this->_viewContext =& $viewContext;
    }
    
    /**
     * @return MachII_framework_ViewContext
     */
    function &_getViewContext()
    {
        return $this->_viewContext;
    }
    
    /**
     * @access private
     * @param MachII_util_SizedQueue
     */
    function _setEventQueue(&$eventQueue)
    {
        $this->_eventQueue =& $eventQueue;
    }
    
    /**
     * @access private
     */
    function &_getEventQueue()
    {
        return $this->_eventQueue;
    }

}

?>
