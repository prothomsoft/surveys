<?php
/**
 * @package MachII
 */
/**
 * Manages registered views.
 * @package MachII
 * @author Ben Edwards <ben@ben-edwards.com>
 * @author Alan Richmond <alan@aardwolfweb.com>
 */
class MachII_framework_ViewManager
{
    /**
     * @var MachII_framework_AppManager
     * @access private
     */
    var $_appManager;
    
    /**
     * @var array associative array of filesystem paths
     * @access private
     */
    var $_viewPaths = array();
    
    
    /**
     * @param array associative array of filesystem paths
     * @param MachII_framework_AppManager
     */
    function init($pageViews, &$appManager)
    {
        $this->setAppManager($appManager);
        $this->_viewPaths = $pageViews;
    }
    
    /**
     * @internal not used at this time 
     */
    function configure() {}
    
    /**
     * @param string
     * @throws MachII_util_ViewNotDefinedException
     * @return string
     */
    function getViewPath($viewName)
    {
        if (!$this->isViewPathDefined($viewName)) {
            $e =& new MachII_util_ViewNotDefinedException(
                array('viewName' => $viewName)
            );
            return $e;
        }
        
        return $this->_viewPaths[$viewName];
    }
    
    /**
     * @param string
     * @return boolean
     */
    function isViewPathDefined($viewName)
    {
        return isset($this->_viewPaths[$viewName]);
    }
    
    /**
     * @param MachII_framework_AppManager
     */
    function setAppManager(&$appManager)
    {
        $this->_appManager =& $appManager;
    }
    
    /**
     * @return MachII_framework_AppManager
     */
    function &getAppManager()
    {
        return $this->_appManager;
    }

}

?>
