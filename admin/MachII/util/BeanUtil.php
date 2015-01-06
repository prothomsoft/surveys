<?php
/**
 * @package Util
 * @subpackage MachII_util_BeanUtil
 */
/**
 * A utility class for working with bean components.
 * 
 * Beans are expected to follow the standard Java bean pattern of having
 * a no argument constuctor and setter functions with name setXyz() (with
 * a single argument named xyz) for field xyz and getters functions with
 * name getXyz() (that accept no arguments).
 * @package Util
 * @subpackage MachII_util_BeanUtil
 * @author Ben Edwards <ben@ben-edwards.com>
 * @author Alan Richmond <alan@aardwolfweb.com>
 */
class MachII_util_BeanUtil
{
    /**
     * Creates a bean.
     * @param string a fully qualified path to the bean class.
     * @param array an associative array of arguments to pass to the
     *              constructor.
     * @return mixed
     */
    function &createBean($beanType, $beanArgs = array())
    {
        $beanClassName = MachII_util_ClassLoader::load($beanType);
        $bean =& new $beanClassName($beanArgs);
        
        return $bean;
    }
    
    /**
     * Sets the values of fields in a bean.
     * @param mixed  the bean to populate.
     * @param string a comma delimited list of field names.
     * @param array an associative array of field values.
     * @uses setBeanField()
     */
     function setBeanFields(&$bean, $fields, &$fieldCollection)
    {
        $fieldsArray = explode(',', $fields);
        foreach ($fieldsArray as $field) {
            if (isset($fieldCollection[$field])) {
                $this->setBeanField($bean, $field, $fieldCollection[$field]);
            }
        }
    }
    
    /**
     * Sets the value of a field in a bean.
     * @param mixed
     * @param string
     * @param mixed
     */
     function setBeanField(&$bean, $field, &$value)
    {
        $method = 'set'.ucfirst($field);
        $bean->$method($value);
    }
    
    /**
     * Returns the value of a field.
     * @param mixed the bean.
     * @param string a fieldname.
     * @return mixed
     */
    function getBeanField($bean, $field)
    {
        $method = 'get'.ucfirst($field);
        
        return $bean->$method();
    }
    
    /**
     * Returns an associative array of bean properties/values based
     * on public getters.
     * 
     * Note: The Mach-II for PHP4/5's describeBean() is unable to determine
     * private vs public unless a naming "trick" is used: getValue() is public,
     * _getValue() is private.  Also, it cannot determine if a getter accepts
     * arguments.  For these features use PHP5 and MachII5.
     * @param mixed the bean.
     * @return array 
     */
    function describeBean($bean)
    {
        $map = array();
        $metaFunctions = get_class_methods($bean);
        
        foreach ($metaFunctions as $metaFunctionName) {
            $metaFunctionNamePrefix = substr(strtolower($metaFunctionName), 0, 3);
            
            if ($metaFunctionNamePrefix == 'get') {
                $fieldName = strtolower($metaFunctionName{0}) . substr($metaFunctionName, 1, strlen($metaFunctionName) - 1);
                $map[$fieldName] = $bean->$metaFunctionName();
            }
        }
        
        return $map;
    }
    
}

?>
