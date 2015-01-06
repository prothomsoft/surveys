<?php
/**
 * @package Cache
 * @author Alan Richmond <alan@aardwolfweb.com>
 */
/**
 * Simple Cache Facade
 * @package Cache
 * @author Alan Richmond <alan@aardwolfweb.com>
 */
class MachII_framework_Cache
{
    /**
     * @var mixed
     */
    var $cache;
    
    /**
     * @var string
     */
    var $appName;
    
    /**
     * @var array
     */
    var $options = array();
    
    
    /**
     * Constructor
     * 
     * Generally should be called in the constructor of descendents.
     * @param string
     * @param array associative array of cache options
     */
    function __construct($appName, $options = array())
    {
        $this->appName = $appName;
        $this->options = $options;
        $this->cache   = $this->createCache();
    }
    
    /**
     * Store a variable.
     * @param string
     * @param mixed
     * @abstract
     */
    function save($name, &$value) {}
    
    /**
     * Retrieve a variable.
     * @param string
     * @return mixed
     * @abstract
     */
    function &get($varName) {}
    
    /**
     * Remove all items in application cache.
     * @abstract
     */
    function clear() {}
    
    /**
     * Initialize the cache container.
     * @abstract
     */
    function &createCache() {}
        
    /**
     * @param mixed
     */
    function setCache(&$cache)
    {
        $this->cache =& $cache;
    }
    
    /**
     * @return mixed
     */
    function &getCache()
    {
        return $this->cache;
    }
    
    /**
     * @param string
     */
    function setAppName($appName)
    {
        $this->appName = $appName;
    }
    
    /**
     * @return string
     */
    function getAppName()
    {
        return $this->appName;
    }
    
    /**
     * @param array
     */
    function setOptions($options)
    {
        $this->options = $options;
    }
    
    /**
     * @return array
     */
    function getOptions()
    {
        return $this->options;
    }
    
    /**
     * @param string
     * @param mixed
     */
    function setOption($name, $value)
    {
        $this->options[$name] = $value;
    }
    
    /**
     * @param string
     * return mixed
     */
    function getOption($name)
    {
        return $this->options[$name];
    }

}

?>
