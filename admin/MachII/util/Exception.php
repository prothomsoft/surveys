<?php
/**
 * @package Util
 * @subpackage MachII_util_Exception
 */

/**#@+
 * Error Codes
 */
define('MACHII_ERROR',                           -1);
define('MACHII_ERROR_IS_PROCESSING_EVENTS',      -2);
define('MACHII_ERROR_EVENT_HANDLER_NOT_DEFINED', -3);
define('MACHII_ERROR_EVENT_IS_PRIVATE',          -4);
define('MACHII_ERROR_EVENT_FILTER_NOT_DEFINED',  -5);
define('MACHII_ERROR_LISTENER_NOT_DEFINED',      -6);
define('MACHII_ERROR_PLUGIN',                    -7);
define('MACHII_ERROR_VIEW_NOT_DEFINED',          -8);
define('MACHII_ERROR_MAX_EVENTS_EXCEEDED',       -9);
define('MACHII_ERROR_LISTENER_INVOKER_DISPATCH_MAP_NOT_DEFINED', -10);
define('MACHII_ERROR_LISTENER_INVOKER_ARG_COUNT_MISMATCH',       -11);
define('MACHII_ERROR_ABORT_EVENT',              -12);
define('MACHII_ERROR_CUSTOM',                   -13);
define('MACHII_ERROR_ABORT_EVENT_EXCEPTION',    -14);
define('MACHII_ERROR_EVENT_FILTER',             -15);
define('MACHII_ERROR_CACHE_INIT',               -16);
define('MACHII_ERROR_EVENT_CONTEXT_NOT_SET',    -17);
/**#@-*/

/**
 * Mach-II Exception
 * 
 * Provides a base class for Mach-II exceptions and a compatibility
 * layer with PHP's built-in Exception class.
 * @package Util
 * @subpackage MachII_util_Exception
 * @author Alan Richmond <alan@aardwolfweb.com>
 */
class MachII_util_Exception extends Exception {
    /**
     * Constructor
     * 
     * Localizes error message and calls parent constructor with new message.
     */
    function MachII_util_Exception($message = '', $code = MACHII_ERROR)
    {   
        $localizedMessage = $this->_localizeErrorMessage($message, $code);
        parent::Exception($localizedMessage, $code);
    }
    
    /**
     * Retrieve the rendered error message from an error code and message
     * or from an error object.
     *
     * @param integer an error code
     * @param array associative array of message replacement values
     * @return string the complete error message
     */
    function _localizeErrorMessage($message = array(), $code = MACHII_ERROR)
    {
        static $errorMessages;
        $localePath    = 'MachII/locale/';
        $defaultLocale = 'en';
        $locale        = $defaultLocale;
        
        $appManager  =& MachII::getAppManager();
        $propManager =& $appManager->getPropertyManager();
        if ($propManager->hasProperty('locale')) {
            $locale = $propManager->getProperty('locale');
        }
        
        if (!isset($errorMessages)) {
        
            if ((!preg_match('/^[a-z]{2}(_[A-Z]{2}|)$/', $locale))
            || (!file_exists($localePath.$locale.'.php'))) {
                $locale = $defaultLocale;
            }
        
            include $localePath.$locale.'.php';
        }
        
        if (isset($errorMessages[$code])) {
            $renderedMsg = $errorMessages[$code];
            if (is_string($message)) {
                $message = array('message' => $message);
            }
            foreach ($message as $name=>$replacement) {
                $renderedMsg = str_replace('{'.$name.'}', $replacement, $renderedMsg);
            }
        } else {
            $renderedMsg = $errorMessages[$code];
        }
        
        if (isset($message['message'])) {
            if (strlen($renderedMsg) > 0) {
                $renderedMsg .= "\n ";
            }
            $renderedMsg .= $message['message'];
        }
        
        return $renderedMsg;
    }
    
    /**
     * The exception class name.
     * @return string __CLASS__
     */
    function getType()
    {
        return __CLASS__;
    }
    
    /**
     * The exception's error code.
     * @return integer
     */
    function getErrorCode()
    {
        return $this->code;
    }
    
    /**
     * Detail of the exception.
     * @return string Exception::__toString()
     */
    function getDetail()
    {
        return $this->getTraceAsString();
    }
    
    /**
     * String representation of the backtrace.
     * @return string Exception::getTraceAsString()
     */
    function getExtendedInfo()
    {
        return $this->__toString();
    }
    
    /**
     * 
     * @return array 
     */
    function getContext()
    {
        return $this->getTrace();
    }
    
}

    /**
     * @package Util
     * @subpackage MachII_util_Exception
     */
    class MachII_util_EventContextNotSetException extends MachII_util_Exception
    {
        function MachII_util_EventContextNotSetException($message = '')
        {
            parent::MachII_util_Exception($message, MACHII_ERROR_EVENT_CONTEXT_NOT_SET);
        }
    }
    
    /**
     * @package Util
     * @subpackage MachII_util_Exception
     */
    class MachII_util_EventException extends MachII_util_Exception
    {
        function MachII_util_EventException($message = '', $code = MACHII_ERROR)
        {
            parent::MachII_util_Exception($message, $code);
        }
    }

            /**
             * @package Util
             * @subpackage MachII_util_Exception
             */
            class MachII_util_IsProcessingEventsException extends MachII_util_EventException {
                function MachII_util_IsProcessingEventsException($message = '')
                {
                    parent::MachII_util_EventException($message, MACHII_ERROR_IS_PROCESSING_EVENTS);
                }
            }
            
            /**
             * @package Util
             * @subpackage MachII_util_Exception
             */
            class MachII_util_EventHandlerNotDefinedException extends MachII_util_EventException
            {
                function MachII_util_EventHandlerNotDefinedException($message = '')
                {
                    parent::MachII_util_EventException($message, MACHII_ERROR_EVENT_HANDLER_NOT_DEFINED);
                }
            }
            
            /**
             * @package Util
             * @subpackage MachII_util_Exception
             */
            class MachII_util_EventIsPrivateException extends MachII_util_EventException {
                function EventIsPrivateException($message = '')
                {
                    parent::MachII_util_EventException($message, MACHII_ERROR_EVENT_IS_PRIVATE);
                }
            }
            
            /**
             * @package Util
             * @subpackage MachII_util_Exception
             */
            class MachII_util_MaxEventsExceededException extends MachII_util_EventException {
                function MachII_util_MaxEventsExceededException($message = '')
                {
                    parent::MachII_util_EventException($message, MACHII_ERROR_MAX_EVENTS_EXCEEDED);
                }
            }
            
            /**
             * @package Util
             * @subpackage MachII_util_Exception
             */
            class MachII_util_AbortEventException extends MachII_util_EventException {
                function MachII_util_AbortEventException($message = '')
                {
                    parent::MachII_util_EventException($message, MACHII_ERROR_ABORT_EVENT_EXCEPTION);
                }
            }

    /**
     * @package Util
     * @subpackage MachII_util_Exception
     */
    class MachII_util_EventFilterException extends MachII_util_Exception {
        function MachII_util_EventFilterException($message = '')
        {
            parent::MachII_util_Exception($message, MACHII_ERROR_EVENT_FILTER);
        }
    }

    /**
     * @package Util
     * @subpackage MachII_util_Exception
     */
    class MachII_util_EventFilterNotDefinedException extends MachII_util_Exception {
        function MachII_util_EventFilterNotDefinedException($message = '')
        {
            parent::MachII_util_Exception($message, MACHII_ERROR_EVENT_FILTER_NOT_DEFINED);
        }
    }
            
    /**
     * @package Util
     * @subpackage MachII_util_Exception
     */
    class MachII_util_ListenerException extends MachII_util_Exception {
        function MachII_util_ListenerException($message = '')
        {
            parent::MachII_util_Exception($message, MACHII_ERROR);
        }
    }

    /**
     * @package Util
     * @subpackage MachII_util_Exception
     */
    class MachII_util_ListenerNotDefinedException extends MachII_util_Exception {
        function MachII_util_ListenerNotDefinedException($message = '')
        {
            parent::MachII_util_Exception($message, MACHII_ERROR_LISTENER_NOT_DEFINED);
        }
    }
    
    /**
     * @package Util
     * @subpackage MachII_util_Exception
     */
    class MachII_util_ListenerInvokerException extends MachII_util_Exception {
        function MachII_util_ListenerInvokerException($message = '')
        {
            parent::MachII_util_Exception($message, MACHII_ERROR);
        }
    }
    
            /**
            * @package Util
            * @subpackage MachII_util_Exception
            */
            class MachII_util_ListenerInvokerDispatchMapNotDefinedException extends MachII_util_ListenerInvokerException {
                function MachII_util_ListenerInvokerDispatchMapNotDefinedException($message = '')
                {
                    parent::MachII_util_ListenerInvokerException($message, MACHII_ERROR_LISTENER_INVOKER_DISPATCH_MAP_NOT_DEFINED);
                }
            }
            
            /**
            * @package Util
            * @subpackage MachII_util_Exception
            */
            class MachII_util_ListenerInvokerArgCountMismatchException extends MachII_util_ListenerInvokerException {
                function MachII_util_ListenerInvokerArgCountMismatchException($message = '')
                {
                    parent::MachII_util_ListenerInvokerException($message, MACHII_ERROR_LISTENER_INVOKER_ARG_COUNT_MISMATCH);
                }
            }

    /**
     * @package Util
     * @subpackage MachII_util_Exception
     */
    class MachII_util_PluginException extends MachII_util_Exception {
        function MachII_util_PluginException($message = '')
        {
            parent::MachII_util_Exception($message, MACHII_ERROR_PLUGIN);
        }
    }

    /**
     * @package Util
     * @subpackage MachII_util_Exception
     */
    class MachII_util_ViewException extends MachII_util_Exception {
        function MachII_util_ViewException($message = '')
        {
            parent::MachII_util_Exception($message, MACHII_ERROR);
        }
    }

    /**
        * @package Util
        * @subpackage MachII_util_Exception
        */
    class MachII_util_ViewNotDefinedException extends MachII_util_Exception {
        function MachII_util_ViewNotDefinedException($message = '')
        {
            parent::MachII_util_Exception($message, MACHII_ERROR_VIEW_NOT_DEFINED);
        }
    }

    /**
    * @package Util
    * @subpackage MachII_util_Exception
    */
    class MachII_util_CacheException extends MachII_util_Exception {
        function MachII_util_CacheException($message = '')
        {
            parent::MachII_util_Exception($message, MACHII_ERROR);
        }
    }

            /**
            * @package Util
            * @subpackage MachII_util_Exception
            */
            class MachII_util_CacheInitException extends MachII_util_CacheException {
                function MachII_util_CacheInitException($message = '')
                {
                    parent::MachII_util_Exception($message, MACHII_ERROR_CACHE_INIT);
                }
            }


?>
