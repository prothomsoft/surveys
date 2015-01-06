<?php
/**
 * @package MachII
 * @subpackage Commands
 */
/**
 * An EventCommand for creating and populating a bean in the current event.
 * @package MachII
 * @subpackage Commands
 * @author Ben Edwards <ben@ben-edwards.com>
 * @author Alan Richmond <alan@aardwolfweb.com>
 */
class MachII_framework_commands_EventBeanCommand extends MachII_framework_EventCommand
{
    /**
     * @access private
     * @var string
     */
    var $_beanName;
    /**
     * @access private
     * @var string
     */
    var $_beanType;
    /**
     * @access private
     * @var string
     */
    var $_beanFields;
    /**
     * @access private
     * @var MachII_util_BeanUtil
     */
    var $_beanUtil;
    
    /**
     * @param string
     * @param string
     * @param string a comma delimited list
     */
    function MachII_framework_commands_EventBeanCommand($beanName, $beanType, $beanFields)
    {
        $this->_setBeanName($beanName);
        $this->_setBeanType($beanType);
        $this->_setBeanFields($beanFields);
        
        $className = MachII_util_ClassLoader::load('MachII.util.BeanUtil');
        $beanUtil  =& new $className();
        $this->_setBeanUtil($beanUtil);
    }
    
    /**
     * @param MachII_framework_Event MachII_framework_Event descendent
     * @param MachII_framework_EventContext
     * @return true
     */
    function execute(&$event, &$eventContext)
    {
        $beanUtil =& $this->_getBeanUtil();
        $beanType = $this->_getBeanType();
        
        if ($this->isBeanFieldsDefined()) {
            $bean =& $beanUtil->createBean($beanType);
            $eventArgs =& $event->getArgs();
            $beanUtil->setBeanFields($bean, $this->_getBeanFields(), $eventArgs);
        } else {
            $bean =& $beanUtil->createBean($beanType, $event->getArgs());
        }
        
        $event->setArg($this->_getBeanName(), $bean, $beanType);
        
        return true;
    }
    
    /**
     * @return boolean
     * @access private
     */
    function isBeanFieldsDefined()
    {
        return isset($this->_beanFields);
    }
    
    /**
     * @param string
     * @access private
     */
    function _setBeanName($beanName)
    {
        $this->_beanName = $beanName;
    }
    
    /**
     * @return string
     * @access private
     */
    function _getBeanName()
    {
        return $this->_beanName;
    }
    
    /**
     * @param string
     * @access private
     */
    function _setBeanType($beanType)
    {
        $this->_beanType = $beanType;
    }
    
    /**
     * @return string
     * @access private
     */
    function _getBeanType()
    {
        return $this->_beanType;
    }
    
    /**
     * @param string a comma delimited list of field names
     * @access private
     */
    function _setBeanFields($beanFields)
    {
        $this->_beanFields = $beanFields;
    }
    
    /**
     * @return string a comma delimited list of field names
     * @access private
     */
    function _getBeanFields()
    {
        return $this->_beanFields;
    }
    
    /**
     * @param MachII_util_BeanUtil
     * @access private
     */
    function _setBeanUtil(&$beanUtil)
    {
        $this->_beanUtil =& $beanUtil;
    }
    
    
    /**
     * @return MachII_util_BeanUtil
     * @access private
     */
    function &_getBeanUtil()
    {
        return $this->_beanUtil;
    }

}

?>
