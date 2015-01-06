<?php
/**
 * @package MachII
 */
/**
 * Handles view display for a  {@link MachII_framework_EventContext}.
 * @package MachII
 * @author Ben Edwards <ben@ben-edwards.com>
 * @author Alan Richmond <alan@aardwolfweb.com>
 */
class MachII_framework_ViewContext
{
    /**
     * @var MachII_framework_AppManager
     * @access private
     */
    var $_appManager;
    
    
    /**
     * @param MachII_framework_AppManager
     */
    function MachII_framework_ViewContext(&$appManager)
    {
        $this->setAppManager($appManager);
    }
    
    /**
     * @param MachII_framework_Event
     * @param string
     * @param string|void string representation of a variable name.
     * @param boolean whether or not to append output to the content key.
     */
    function displayView(&$event, $viewName, $contentKey = null, $append = false)
    {
        $GLOBALS['event'] =& $event;
        $viewPath = $this->_getFullPath($viewName);
        if (MachII::isException($viewPath)) {
            return $viewPath;
        }
        
        if (!empty($contentKey)) {
            ob_start();
            include $viewPath;
            $content = ob_get_clean();            
            
            if ($content === false) {
                $content = '';
            }
            
            if (strstr($contentKey, '[')) {
                // Create content container
                eval("return \$$contentKey = ((\$append) && (isset(\$$contentKey)))?
                    \$$contentKey.\$content:
                    \$content;");
            } else {
                if (($append)
                && ($event->isArgDefined($contentKey))) {
                    $content = $event->getArg($contentKey).$content;
                }
                $event->setArg($contentKey, $content);
            }
        } else {
            include $viewPath;
        }
    }
    
    /**
     * @return MachII_framework_AppManager
     */
    function &getAppManager()
    {
        return $this->_appManager;
    }
    
    /**
     * @param MachII_framework_AppManager
     * @access private
     */
    function setAppManager(&$appManager)
    {
        $this->_appManager =& $appManager;
    }
    
    /**
     * Gets the specified property.
     * 
     * This is just a shortcut for getAppManager()->getPropertyManager()->getProperty().
     * @param string The name of the property to return.
     * @return mixed The value of a property.
     */
    function &getProperty($propertyName)
    {
        if (!isset($this->_propertyManager)) {
            $appManager =& $this->getAppManager();
            $this->_propertyManager =& $appManager->getPropertyManager();
        }
        
        return $this->_propertyManager->getProperty($propertyName);
    }
    
    /**
     * Sets the specified property.
     * 
     * This is just a shortcut for getAppManager()->getPropertyManager()->setProperty().
     * @param string The name of the property to set.
     * @param mixed The value to store in the property.
     * @return mixed
     */
    function setProperty($propertyName, &$propertyValue)
    {
        if (!isset($this->_propertyManager)) {
            $appManager =& $this->getAppManager();
            $this->_propertyManager =& $appManager->getPropertyManager();
        }
        
        return $this->_propertyManager->setProperty($propertyName, $propertyValue);
    }
    
    /**
     * @param string
     * @return string
     * @access private
     */
    function _getFullPath($viewName)
    {
        $appManager  =& $this->getAppManager();
        $viewManager =& $appManager->getViewManager();
        $viewPath    =& $viewManager->getViewPath($viewName);
        if (MachII::isException($viewPath)) {
            return $viewPath;
        }
        
        $appRoot = $this->_getAppRoot();
        
        if ($appRoot{0} == '/') {
            $webRoot = MachII_util_ClassLoader::getWebRoot();
            if (file_exists($webRoot.$appRoot.$viewPath)) {
                return $webRoot.$appRoot.$viewPath;
            }
        }
        
        return $appRoot.$viewPath;
    }
    
    /**
     * @return string the defined application root
     * @access private
     */
    function _getAppRoot()
    {
        return $this->getProperty('applicationRoot');
    }

}

?>
