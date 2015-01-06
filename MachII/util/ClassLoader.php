<?php
/**
 * @package Util
 * @subpackage MachII_util_ClassLoader
 * @author Alan Richmond <alan@aardwolfweb.com>
 */
/**
 * Used for loading other classes.
 * 
 * ClassLoader manages several tasks relating to loading PHP class
 * definition files.  It translates a Java-style class name into a
 * filepath/filename, attempts to locate the file and loads it.  It
 * then maintains a record of the filepath/filename internally.
 * @package Util
 * @subpackage MachII_util_ClassLoader
 * @author Alan Richmond <alan@aardwolfweb.com>
 * @static
 */
class MachII_util_ClassLoader
{
    /**
     * Constructor
     * 
     * Since this is a static class, block instantiation.
     * @private
     * @internal
     */
    function MachII_util_ClassLoader()
    {
        trigger_error(
            sprintf("Call to private %s::%s()", get_class($this), __FUNCTION__),
            E_USER_ERROR
        );
    }  
    
    /**
     * The storage container.
     * 
     * @static
     * @param string all|paths|classExtension
     * @return mixed
     */
    function &singleton($get = 'all')
    {
        static $loader = array();
        
        if (empty($loader)) {
            $loader = array(
                'paths'          => array(),
                'classExtension' => '.php'
            );
        }
        
        if (isset($loader[$get])) {
            return $loader[$get];
        }
        
        return $loader;
    }
    
    /**
     * Load a class file.
     * 
     * Will attempt to load a class file.  There are three ways to
     * specify the class to load:
     * 
     * 1) MachII_util_ClassLoader::load('MyApp.model.MyClass');
     *     <ul>
     *         <li>filename = MyApp/model/MyClass.php</li>
     *         <li>classname = MyApp_model_MyClass</li>
     *     </ul>
     * 2) MachII_util_ClassLoader::load('AnotherApp/model/MyClass.php',
     *         'MyApp_model_MyClass');
     *     <ul>
     *         <li>filename = AnotherApp/model/MyClass.php</li>
     *         <li>classname = MyApp_model_MyClass</li>
     *     </ul>
     * 3) MachII_util_ClassLoader::load('AnotherApp/model/MyClass.php?MyApp_model_MyClass');
     *     <ul>
     *         <li>filename = MyApp/model/MyClass.php</li>
     *         <li>classname = MyApp_model_MyClass</li>
     *     </ul>
     * Both path and classname may always be given in Java-style dot
     * notation or their native notation, they will be translated if
     * needed.
     * @uses makePath()
     * @uses addPath()
     * @uses getClassName()
     * @static
     * @param string
     * @param string|void
     * @return string
     */
    function load($path, $class = null)
    {
        $literal = false;
        
        if (strpos($path, '?')) {
            list($path, $class) = explode('?', $path);
            $literal = true;
        } elseif (is_null($class))  {
            $class = $path;
        }
        
        $path = MachII_util_ClassLoader::makePath($path, $literal);
        MachII_util_ClassLoader::addPath($path);
        
        require_once $path;
        
        $className = MachII_util_ClassLoader::getClassName($class);
        
        return $className;
    }
    
    /**
     * Load an array of class files.
     * @static
     * @param array class filepaths
     */
    function restore($loaderRestore)
    {
        $loader =& MachII_util_ClassLoader::singleton();
        
        $loader = $loaderRestore;
        
        foreach ($loader['paths'] as $path) {
            require_once $path;
        }
    }
    
    /**
     * Determine the absolute path of a classfile.
     * 
     * Values may be in dot notation or filesystem notation.
     * <ul>
     *     <li>MyApp.model.MyClass</li>
     *     <li>MyApp/model/MyClass.php</li>
     *     <li>MyApp\\model\\MyClass.php</li>
     *     <li>MyApp\model\MyClass.php</li>
     * </ul>
     * are all valid and equivalent.
     * @uses MachII_util_ClassLoader::_findDocRoot()
     * @static
     * @param string
     * @param boolean
     * @staticvar $docRoot
     * @return string
     */
    function makePath($class, $literal = false)
    {
        $loader =& MachII_util_ClassLoader::singleton();
        
        // "cache" the webRoot
        static $webRoot;
        
        if (!isset($webRoot)) {
            $webRoot = MachII_util_ClassLoader::getWebRoot().DIRECTORY_SEPARATOR;
        }
        
        if (!strpos($class, '/')) {
            $relPath = str_replace('.', '/', $class);
        } elseif (!strpos($class, '\\')) {
            $relPath = str_replace('.', '\\', $class);
        } else {
            $relPath = $class;
        }
        
        if (!$literal) {
            $relPath .= $loader['classExtension'];
        }
        
        // TODO: check include_path
        if (file_exists($webRoot.$relPath)) {
            return realpath($webRoot . $relPath);
        } elseif (file_exists($relPath)) {
            return realpath($relPath);
        }
        
        return $relPath;
    }
    
    /**
     * Store the path.
     * @static
     * @param string
     */
    function addPath($path)
    {
        $paths =& MachII_util_ClassLoader::singleton('paths');
        
        if (!in_array($path, $paths)) {
            $paths[] = $path;
        }
    }
    
    /**
     * Translate a dot notation classname to PEAR-style with
     * underscores.
     * @static
     * @param string
     * @return string
     */
    function getClassName($class)
    {
        return str_replace('.', '_', $class);
    }
    
    /**
     * Attempt to discover the document root.
     * 
     * If it can't be determined from $_SERVER variables it is
     * assumed to be the current working directory.
     * @static
     * @return string
     */
    function getWebRoot()
    {
        // for PHP <4.1.0
        if (!isset($_SERVER)) {
            // assume BackwardCompat.php is there
            global $_SERVER;
        }
        
        // try to construct the web root
        // first get the script name (usually index.php)
        if (isset($_SERVER['SCRIPT_NAME'])) {
            $script = $_SERVER['SCRIPT_NAME'];
        } elseif (isset($_SERVER['PHP_SELF'])) {
            $script = $_SERVER['PHP_SELF'];
        }
        
        // then try to get the full path
        if (isset($_SERVER['PATH_TRANSLATED'])) {
            $path = $_SERVER['PATH_TRANSLATED'];
        } elseif (isset($_SERVER['SCRIPT_FILENAME'])) {
            $path = $_SERVER['SCRIPT_FILENAME'];
        }
        
        if (isset($script)
        && isset($path)) {
            return substr($path, 0, strlen($script) * - 1);
        }
        
        return get_cwd();
    }

}

?>
