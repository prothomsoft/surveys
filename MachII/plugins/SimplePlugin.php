<?php
/**
 * @author Ben Edwards <ben@ben-edwards.com>
 * @author Alan Richmond <alan@aardwolfweb.com>
 */
class MachII_plugins_SimplePlugin extends MachII_framework_Plugin
{

    function configure()
    {
        echo __CLASS__,'::',__FUNCTION__,'<br />';
    }
    

    function preProcess(&$eventContext)
    {
        echo __CLASS__,'::',__FUNCTION__,'<br />';
    }
    
    
    function preEvent(&$eventContext)
    {
        echo __CLASS__,'::',__FUNCTION__,'<br />';
    }
    
    
    function postEvent(&$eventContext)
    {
        echo __CLASS__,'::',__FUNCTION__,'<br />';
    }
    
    
    function preView(&$eventContext)
    {
        echo __CLASS__,'::',__FUNCTION__,'<br />';
    }
    
    
    function postView(&$eventContext)
    {
        echo __CLASS__,'::',__FUNCTION__,'<br />';
    }
    
    
    function postProcess(&$eventContext)
    {
        echo __CLASS__,'::',__FUNCTION__,'<br />';
    }
    
    
    function handleException(&$eventContext, &$exception)
    {
        echo __CLASS__,'::',__FUNCTION__,'<br />';
    }

}

?>
