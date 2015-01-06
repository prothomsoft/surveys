<?php
/**
 * @package Cache
 * @subpackage MachII_cache_PhpSession
 * @author Alan Richmond <alan@aardwolfweb.com>
 */
/**
 * A simple cache container that stores to PHP's native session
 * variables.
 * 
 * Requires PHP >=4.1.0.  <4.1.0 will fail silently.
 * 
 * Using this cache system will result in the application being
 * loaded and configured when a new session is started.  It is
 * not a shared object.  One exists for each user and persistant
 * data may not be shared through the application object.  (Not
 * that you should do that anyway.)
 * 
 * For best performance it is recommended that true shared cache
 * be used.
 * @package Cache
 * @subpackage MachII_cache_PhpSession
 * @author Alan Richmond <alan@aardwolfweb.com>
 */
class MachII_cache_PhpSession extends MachII_framework_Cache
{
    /**
     * @uses MachII_util_Cache::__construct()
     * @param string
     * @param array an associative array of session options.
     *              (Not used at this time.)
     */
    function MachII_cache_PhpSession($appName, $options = array())
    {
        parent::__construct($appName, $options);
    }
    
    /**
     * Serialize objects and set the session variable.
     * 
     * The value is serialized to "protect" the Mach-II application
     * object.  Otherwise the object would be auto-deserialized before
     * its classes are loaded, since those are stored in the session also.
     * @see get()
     * @param string
     * @param mixed
     */
    function save($name, &$value)
    {
        $_SESSION['_MachII_cache_PhpSession'][md5($this->appName)][md5($name)] = serialize($value);
    }
    
    /**
     * Unserialize objects and return the variable from the session.
     * @see save()
     * @param string
     * @return mixed
     */
    function &get($name)
    {
        if (!isset($_SESSION['_MachII_cache_PhpSession'][md5($this->appName)][md5($name)])) {
            return false;
        }
        
        $valueSer = $_SESSION['_MachII_cache_PhpSession'][md5($this->appName)][md5($name)];
        $value = unserialize($valueSer);
        
        return $value;
    }
    
    /**
     * Unsets the array for the named application's session variable.
     */
    function clear()
    {
        if (isset($_SESSION['_MachII_cache_PhpSession'][md5($this->appName)])) {
            unset($_SESSION['_MachII_cache_PhpSession'][md5($this->appName)]);
        }
    }
    
    /**
     * Start a session.
     * 
     * Warning is suppressed if a session has already been started.
     */
    function &createCache()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

}

?>
