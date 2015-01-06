<?php
/**
 * @package Util
 */

// Introduced in 4.1.0
if (!function_exists('version_compare')) {
    $GLOBALS['_ENV']     =& $GLOBALS['HTTP_ENV_VARS'];
    $GLOBALS['_GET']     =& $GLOBALS['HTTP_GET_VARS'];
    $GLOBALS['_POST']    =& $GLOBALS['HTTP_POST_VARS'];
    $GLOBALS['_COOKIE']  =& $GLOBALS['HTTP_COOKIE_VARS'];
    $GLOBALS['_SERVER']  =& $GLOBALS['HTTP_SERVER_VARS'];
    $GLOBALS['_SESSION'] =& $GLOBALS['HTTP_SESSION_VARS'];
    
    /**
     * $_REQUEST vars
     * @internal
     */
    function &_MachII_requestVars()
    {
        $request = array();
        $varOrder = strtolower(ini_get('variables_order'));
        $varOrderLen = strlen($varOrder);
        for ($i=0; $var = $varOrder{$i}; $i++) {
            switch ($var) {
                case 'g':
                    $request =& array_merge($request, $GLOBALS['HTTP_GET_VARS']);
                    break;
                    
                case 'p':
                    $request =& array_merge($request, $GLOBALS['HTTP_POST_VARS']);
                    break;
                    
                case 'c':
                    $request =& array_merge($request, $GLOBALS['HTTP_COOKIE_VARS']);
                    break;
            }// end switch
        }// end for
        
        return $request;
    }
    
    $GLOBALS['_REQUEST'] =& _MachII_requestVars();
}

// Introduced in 4.2.0
if (!function_exists('is_a')) {
    function is_a(&$object, $className)
    {
        return (is_object($object)
            && ((strtolower($className) == get_class($object))
            || is_subclass_of($object, strtolower($className))));
    }
}

// Inroduced in 4.2.0
if (!function_exists('array_change_key_case')) {
    define('CASE_LOWER', 0);
    define('CASE_UPPER', 1);
    
    function &array_change_key_case(&$array, $case = CASE_LOWER)
    {
        if (is_array($array)) {
            $caseFunc = ($case == CASE_LOWER) ? 'strtolower' : 'strtoupper';
            $ret = array();
            foreach ($array as $key => $value) {
                $ret[$caseFunc($key)] = $value;
            }
        } else {
            $ret =& $array;
        }
        
        return $ret;
    }
}

// Introduced in 4.3.0
if (!function_exists('ob_get_clean')) {
    function ob_get_clean()
    {
        $contents = ob_get_contents();
        @ob_end_clean();
        
        return $contents;
    }
}

// Introduced in 5.0.0
if (!class_exists('exception')) {
    require_once 'MachII/util/php/Exception.php';
}

?>
