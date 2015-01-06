<?php
/**
 * @package Util
 */


/**
 * Exception
 * 
 * Nearly unchanged from exception.php posted on internals@lists.php.net by
 * Timm Friebe on 24 Jan 2004.  Back-ported to PHP4 by Alan Richmond.
 * @package Util
 */
class Exception {
    var $message = '';
    var $code    = 0;
    var $file    = '';
    var $line    = 0;
    var $_trace  = array();

    function Exception($message, $code = 0) {
        $this->message = $message;
        $this->code    = $code;
        if (function_exists('debug_backtrace')) {
            $this->_trace   = debug_backtrace();
            for ($i = 0, $s = sizeof($this->_trace); $i < $s; $i++) {
                if (!isset($this->_trace[$i]['line'])) {
                    continue;
                }
                $this->file = $this->_trace[$i]['file'];
                $this->line = $this->_trace[$i]['line'];
            }
        }
    }
    
    function getMessage() {
        return $this->message;
    }

    function getCode() {
        return $this->code;
    }

    function getFile() {
        return $this->file;
    }

    function getLine() {
        return $this->line;
    }
    
    function getTrace() {
        return $this->_trace;
    }
    
    function getTraceAsString() {
        $return = '';
        for ($i = 0, $s = sizeof($this->_trace); $i < $s; $i++) {
            $t =& $this->_trace[$i];
            $args = array();
            for ($j = 0, $a = sizeof($t['args']); $j < $a; $j++) {
                    if (is_object($t['args'][$j])) {
                    $args[] = get_class($t['args'][$j]).' { ... }';
                } elseif (is_array($t['args'][$j])) {
                    $args[] = 'array['.sizeof($t['args'][$j]).'] ( ... )';
                } elseif (is_string($t['args'][$j])) {
                    $args[] = "'".substr($t['args'][$j], 0, 15).(strlen($t['args'][$j]) > 15 ? '...' : '')."'";
                } else {
                    $args[] = var_export($t['args'][$j], 1);
                }
            }
            $return .= sprintf(
                "#%d %s(%d): %s%s%s(%s)\n",
                $i,
                isset($t['file'])? $t['file']: $this->_trace[$i]['file'],
                isset($t['line'])? $t['line']: $this->_trace[$i]['line'],
                isset($t['class'])?$t['class']:'<main>',
                isset($t['type'])? $t['type']: '',
                $t['function'],
                implode(', ', $args)
            );
        }
        
        return $return;
    }
    
    function __toString() {
        return sprintf(
            "exception '%s' with message '%s' in %s:%d\nStack trace:\n%s", 
            get_class($this), 
            $this->getMessage(),
            $this->getFile(),
            $this->getLine(),
            $this->getTraceAsString()
        );
    }
    
}

?>
