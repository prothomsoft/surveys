<?php
/**
 * @package MachII
 */
/**
 * Listener.
 * @package MachII
 * @author Ben Edwards <ben@ben-edwards.com>
 * @author Alan Richmond <alan@aardwolfweb.com>
 */
class MachII_framework_Listener extends MachII_framework_BaseObject
{
    /**
     * Dispatch map.
     * 
     * Provides a map from named arguments to listener method arguments.
     * Named as it is to be compatible/consistent with PEAR {@link http://pear.php.net/package/SOAP SOAP}.
     * 
     * Example:
     * <code>
     * 
     * </code>
     * @var array
     * @see $__typedef
     * @access protected
     */
    var $__dispatch_map = array();
    
    /**
     * Variable type definitions.
     * 
     * Provides a map of method variable types. 
     * Named as it is to be compatible/consistent with PEAR {@link http://pear.php.net/package/SOAP SOAP}. 
     * @var array
     * @see $__dispatch_map
     * @access protected
     */
    var $__typedef = array();
    
    /**
     * @var MachII_framework_Invoker descendent
     * @access private
     */
    var $_invoker;
    
    
    /**
     * @param MachII_framework_AppManager
     * @param array associative array of listener parameters
     * @param MachII_framework_ListenerInvoker descendent
     */
    function MachII_framework_Listener($appManager, $parameters = array(), $invoker = null)
    {
        parent::MachII_framework_BaseObject($appManager, $parameters);
        
        if (isset($invoker)) {
            $this->setInvoker($invoker);
        }
    }
    
    /**
     * Configure the listener.
     * @abstract
     */
    function configure() {}
    
    /**
     * @param MachII_framework_Invoker descendent
     */
    function setInvoker(&$invoker)
    {
        $this->_invoker =& $invoker;
    }
    
    /**
     * @return MachII_framework_ListenerInvoker descendent
     */
    function &getInvoker()
    {
        return $this->_invoker;
    }
    
    /**
     * @param string
     * @return array associative array of argument mappings.
     */
    function __dispatch($methodName)
    {
        return (isset($this->__dispatch_map[$methodName]))?
            $this->__dispatch_map[$methodName]:
            null;
    }

}

?>
