<?php

/**
 * @package MachII
 * @author Alan Richmond <alan@aardwolfweb.com>
 */
/**
 * Functions for backwards compatibility.
 */
require_once 'MachII/util/BackwardCompat.php';
/**
 * Class Loader
 */
require_once 'MachII/util/ClassLoader.php';
/**
 * Application Loader
 */
require_once 'MachII/framework/AppLoader.php';
/**
 * Application Factory
 */
require_once 'MachII/framework/AppFactory.php';
/**
 * Exceptions
 */
require_once 'MachII/util/Exception.php';

/**#@+
 * Configuration Reload Codes
 */
/**
 * Never Reload
 * 
 * Always use the cached configuration.  Only reload the configuration
 * file if {@link MachII_framework_AppLoader} is being recreated.
 */
define('MACHII_CONFIG_RELOAD_NEVER',  -1);
/**
 * Dynamic Reload
 * 
 * Reloads the configuration if it has changed since it was last cached.
 */
define('MACHII_CONFIG_RELOAD_DYNAMIC', 0);
/**
 * Always Reload
 * 
 * Will reload the configuration file on each request.
 */
define('MACHII_CONFIG_RELOAD_ALWAYS',  1);
/**#@-*/

/**
 * Container for framework helpers
 * @global array $GLOBALS['_MachII']
 * @name $_MachII
 * @access private
 */
$GLOBALS['_MachII'] = array();

/**
 * MachII provides a convenient interface to lower-level framework
 * classes as well as some globally useful functions.
 * @package MachII
 * @author Alan Richmond <alan@aardwolfweb.com>
 */
class MachII
{
    /**
     * Constructor
     */
    function MachII()
    {
        trigger_error(
            sprintf("Call to private %s::%s()", __CLASS__, __METHOD__),
            E_USER_ERROR
        );
    }    

    /**
     * Application programming interface version number
     * 
     * Currently this is set to the version number of the analogous reference
     * implementation, Mach-II for ColdFusion.
     * 
     * @static
     * @return string version number
     */
    function apiVersion()
    {
        return '1.0.10';
    }
    
    /**
     * Package version number
     * 
     * @static
     * @return string version number
     */
    function version()
    {
        return '0.3.17';
    }
    
    /**
     * Factory for creating a configured application loader.
     * 
     * In general this method should not be called directly; however,
     * it is useful when implementing custom caching mechanisms and
     * other higher level {@link MachII_framework_AppLoader} handlers. 
     * 
     * MachII::appLoader() is called as follows:
     * <code>
     * $appLoader =& MachII::appLoader($configPath, $configMode);
     * if (MachII::isException($appLoader)) {
     *     // error handling
     * }
     * </code>
     * 
     * @static
     * @uses MachII_framework_AppLoader
     * @param string the path and filename of the Mach-II configuration file
     * @param integer the configuration reload mode
     * @return MachII_framework_AppLoader
     * @throws MACHII_ERROR
     */
    function &appLoader($configPath, $configMode)
    {
        // Create the AppLoader
        $appLoader =& new MachII_framework_AppLoader();
        $appLoader->init($configPath);
        
        return $appLoader;
    }
    
    /**
     * Factory for creating a caching application loader.
     * 
     * It is strongly recommended that some form of caching be used
     * with Mach-II.  Due to the way it functions the entire application
     * must be present when processing an event request.  There is a
     * relatively high overhead in preparing the application for use.
     * The use of a cache prevents the recurrance of that overhead by
     * reusing the prepared application.
     * In its simplest form MachII::cache() only requires three parameters:
     * <code>
     * $appLoader =& MachII::cache(
     *     $MACHII_CONFIG_PATH,
     *     $MACHII_CONFIG_MODE,
     *     $MACHII_APP_KEY
     * );
     * if (MachII::isException($appLoader)) {
     *     // error handling
     * }
     * </code>
     * This will use MachII's built in user session cache,
     * {@link MachII_cache_PhpSession}.  It is <b>not</b> intended
     * for high volume applications.  For better scalability, use a
     * cache system that allows a single {@link MachII_framework_AppLoader}
     * to be shared by multiple users.
     * 
     * Note: MachII_cache_PhpSession will fail silently on PHP <4.1.0.
     * The application will NOT be cached!  Use an alternate cache.
     * 
     * To use another cache system, install the driver in
     * MachII/cache/ and call it by its dot notation name.  Any
     * cache driver specific options or default overrides may be passed as
     * an associative array.
     * <code>
     * $appLoader =& MachII::cache(
     *     $MACHII_CONFIG_PATH,
     *     $MACHII_CONFIG_MODE,of
     *     $MACHII_APP_KEY,
     *     // use a cache driver that uses PEAR::Cache_Lite for storage
     *     'MachII.cache.PearCacheLite', 
     *     array(
     *         // override the cache directory
     *         'cacheDir' => '/path/to/cache/dir/',
     *         // change the cache life time to 2 days
     *         'lifeTime' => 172800
     *     )
     * );
     * </code>
     * 
     * @tutorial MachII/configphp.pkg#machiiphp.cache
     * @static
     * @uses MachII::appLoader()
     * @internal uses {@link MachII::_cache()}
     * @internal uses {@link $_MachII}
     * @uses MachII_framework_Cache
     * @uses MachII_cache_PhpSession (by default)
     * @global array $_MachII
     * @param string the path and filename to the Mach-II configuration file
     * @param integer the configuration reload mode
     * @param string a unique name for this Mach-II application
     * @param string a valid container for caching the configured application
     * @param array the cache container's configuration options
     * @return MachII_framework_AppLoader
     * @throws MACHII_ERROR_CACHE_INIT
     * @throws MACHII_ERROR*
     */
    function &cache($configPath, $configMode, $name, $container = 'MachII.cache.PhpSession', $options = array())
    {
        // Get cache ready
        MachII_util_ClassLoader::load('MachII.framework.Cache');
        $cachePlugin = MachII_util_ClassLoader::load($container);
        $GLOBALS['_MachII']['cache'] =& new $cachePlugin($name, $options);
        $cache =& $GLOBALS['_MachII']['cache'];
        if (!is_a($cache, 'MachII_framework_Cache')) {
            $e = new MachII_util_CacheInitException(
                array('container' => $cachePlugin)
            );
            return $e;
        }
        
        $appLoader = false;
        
        // Restore the cached AppManager
        if ($classes = $cache->get('MachII_Classes')) {
            MachII_util_ClassLoader::restore($classes);//echo '<pre>',var_dump($classes),'</pre>';
            $appLoader = $cache->get('MachII_AppLoader');
            //echo 'restored appLoader<br />';
        }
        
        // Or build a new AppManager
        if (($classes === false)
        || ($appLoader === false)) {
            $cache->clear();
            $appLoader =& MachII::appLoader($configPath, $configMode);
            if (MachII::isException($appLoader)) {
                return $appLoader;
            }
            //echo 'built new appLoader<br />';
        } else {
            // Reload the configuration
            if (($configMode == MACHII_CONFIG_RELOAD_ALWAYS)
            || (($configMode == MACHII_CONFIG_RELOAD_DYNAMIC)
              && ($appLoader->shouldReloadConfig()))) {
                $cache->clear();
                $e = $appLoader->reloadConfig();
                if (MachII::isException($e)) {
                    return $e;
                }
                //echo 'reloaded config<br />';
            }
        }
        
        // For later caching
        $GLOBALS['_MachII']['appLoader'] =& $appLoader;
        
        // Setup shutdown
        register_shutdown_function(array('MachII', '_cache'));
        
        return $appLoader;
    }
    
    /**
     * Shutdown method for caching application loader.
     * 
     * @static
     * @access private
     */
    function _cache()
    {
        if (isset($GLOBALS['_MachII']['cache'])) {
            $cache =& $GLOBALS['_MachII']['cache'];
            
            // AppManager
            if ((isset($GLOBALS['_MachII']['appLoader']))
            && (is_a($GLOBALS['_MachII']['appLoader'], 'MachII_framework_AppLoader'))) {
            //echo 'caching appLoader';
                $appMgrSaved = $cache->save('MachII_AppLoader', $GLOBALS['_MachII']['appLoader']);
            }
            
            // Class file paths
            $classes =& MachII_util_ClassLoader::singleton();
            if (is_array($classes)) {
                $classesSaved = $cache->save('MachII_Classes', $classes);
            }
        }
    }
    
    /**
     * Return the AppManager
     * @return MachII_framework_AppManager
     */
    function getAppManager()
    {
        return $GLOBALS['_MachII']['appLoader']->getAppManager();
    }
    
    /**
     * Check if a value is an exception.
     * 
     * @static
     * @param mixed a value to check
     * @return boolean
     */
    function isException($e)
    {
        return is_a($e, 'Exception');
    }

}

?>
