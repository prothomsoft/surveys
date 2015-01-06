<?php

/*
Author: Ben Edwards (ben@ben-edwards.com)
PHP Port: Alan Richmond <alan@aardwolfweb.com>

EventArgsFilter
    This event-filter creates beans in an event and populates the beans
    using event-args.
    
    Beans are expected to follow the standard Java bean pattern of having
    a no argument constuctor (an init() function with no required arguments) 
    and setter functions with name setXXX() (with a single argument named XXX) 
    for field XXX.
    
    If the "fields" parameter is not specified for the filter, then the 
    entire event-args struct will be passed to the bean's init() function 
    as an argument collection.
    
Configuration Parameters:
    ["name"] - The name of the bean to create (in the event-args).
    ["type"] - The type of the bean to create.
    ["fields"] - The fields from the event-args to set in the bean.
    
Event-Handler Parameters:
    These parameters will override configuration parameters specified with 
        the same name.
    "name" - The name of the bean to create (in the event-args).
    "type" - The type of the bean to create.
    "fields" - The fields from the event-args to set in the bean.
*/


class MachII_filters_EventBeanFilter extends MachII_framework_EventFilter
{

    var $BEAN_NAME_PARAM = 'name';
    
    var $BEAN_TYPE_PARAM = 'type';
    
    var $BEAN_FIELDS_PARAM = 'fields';
    
    
    var $_beanUtil;
    
    
    
    function configure()
    {
        MachII_util_ClassLoader::load('MachII.util.BeanUtil');
        $this->_setBeanUtil(new MachII_util_BeanUtil());
    }
    
    
    function filterEvent(&$event, &$eventContext, $paramArgs = array())
    {
        // init
        $isFieldsDefined = false;
        
        // beanName
        if (isset($paramArgs[$this->BEAN_NAME_PARAM])) {
            $beanName = $paramArgs[$this->BEAN_NAME_PARAM];
        } elseif ($this->isParameterDefined($this->BEAN_NAME_PARAM)) {
            $beanName = $this->getParameter($this->BEAN_NAME_PARAM);
        }
        
        // beanType
        if (isset($paramArgs[$this->BEAN_TYPE_PARAM])) {
            $beanType = $paramArgs[$this->BEAN_TYPE_PARAM];
        } elseif ($this->isParameterDefined($this->BEAN_TYPE_PARAM)) {
            $beanType = $this->getParameter($this->BEAN_TYPE_PARAM);
        }
        
        // beanFields
        if (isset($paramArgs[$this->BEAN_FIELDS_PARAM])) {
            $beanFields = $paramArgs[$this->BEAN_FIELDS_PARAM];
            $isFieldsDefined = true;
        } elseif ($this->isParameterDefined($this->BEAN_FIELDS_PARAM)) {
            $beanFields = $this->getParameter($this->BEAN_FIELDS_PARAM);
            $isFieldsDefined = true;
        }
        
        // check for required parameters
        if ((empty($beanName))
        || (empty($beanType))) {
            $e = $this->_throwUsageException(get_class($this).'::'.__FUNCTION__.'()');
            return $e;
        }
        
        // Create the bean and populate it using either setters or init().
        $beanUtil =& $this->_getBeanUtil();
        if ($isFieldsDefined) {
            $bean =& $beanUtil->createBean($beanType);
            $beanUtil->setBeanFields($bean, $beanFields, $event->getArgs());
        } else {
            $bean =& $beanUtil->createBean($beanType, $event->getArgs());
        }
        
        // set the bean in the event args
        $event->setArg($beanName, $bean, $beanType);
    }
    
    
    // @access private
    function _setBeanUtil(&$beanUtil)
    {
        $this->_beanUtil =& $beanUtil;
    }
    
    
    // @access private
    function &_getBeanUtil()
    {
        return $this->_beanUtil;
    }
    
    
    // @access private
    function _throwUsageException($method)
    {
        $e =& new MachII_util_EventFilterException(
            array(
                'method'  => $method,
                'message' => "EventBeanFilter requires the following usage parameters: $this->BEAN_NAME_PARAM, $this->BEAN_TYPE_PARAM."
            ),
            MACHII_ERROR_FILTER
        );
        
        return $e;
    }

}

?>
