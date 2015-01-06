<?php
/**
 * @package MachII
 */
/**
 * Load base event filter class
 */
require_once 'MachII/framework/EventFilter.php';
/**
 * Manages registered {@link MachII_framework_EventFilter}s.
 * @package MachII
 * @author Ben Edwards <ben@ben-edwards.com>
 * @author Alan Richmond <alan@aardwolfweb.com>
 */
class MachII_framework_FilterManager
{
    /**
     * @var MachII_framework_AppManager
     * @access private
     */
    var $_appManager;
    
    /**
     * @var array associative array of MachII_framework_EventFilter descendents
     * @access private
     */
    var $_filters = array();
    
    
    /**
     * @param array associative array of raw MachII_framework_EventFilter
     *              descendent configuration data.
     * @param MachII_framework_AppManager
     */
    function init($filters, &$appManager)
    {
        $this->setAppManager($appManager);
        
        foreach ($filters as $filter) {
            $filterParams = array();
            if (!empty($filter['parameters'])) {
                foreach ($filter['parameters'] as $param) {
                    $filterParams[$param['name']] = $param['value'];
                }
            }
            
            $filterType = MachII_util_ClassLoader::load($filter['type']);
            $filterObj =& new $filterType($appManager, $filterParams);
            if (MachII::isException($filterObj)) {
                return $filterObj;
                break;
            }
            
            $this->addFilter($filter['name'], $filterObj);
        }
    }
    
    /**
     * Configure all of the filters
     */
    function configure()
    {
        $keys = array_keys($this->_filters);
        foreach ($keys as $key) {
            $filter =& $this->getFilter($key);
            if (MachII::isException($filter)) {
                return $filter;
            }
            
            $e = $filter->configure();
            if (MachII::isException($e)) {
                return $e;
            }
        }
    }
    
    /**
     * @param string
     * @param MachII_framework_EventFilter or descendent
     */
    function addFilter($name, &$filter)
    {
        $this->_filters[$name] =& $filter;
    }
    
    /**
     * @param string
     * @throws MachII_util_EventFilterNotDefined
     * @return MachII_framework_EventFilter or descendent
     */
    function &getFilter($filterName)
    {
        if (!$this->isFilterDefined($filterName)) {
            $e =& new MachII_util_EventFilterNotDefinedException(
                array('filterName' => $filterName));
            return $e;
        }
        
        return $this->_filters[$filterName];
    }
    
    /**
     * @param string
     * @return MachII_framework_EventFilter or descendent
     */
    function isFilterDefined($filterName)
    {
        return isset($this->_filters[$filterName]);
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
