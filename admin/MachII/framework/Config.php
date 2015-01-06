<?php
/**
 * @package MachII
 * @author Alan Richmond <alan@aardwolfweb.com>
 */
/**
 * Mach-II Configuration File Parser
 * @package MachII
 * @author Alan Richmond <alan@aardwolfweb.com>
 */
class MachII_framework_Config
{
    /**
     * @var resource configuration file
     * @access private
     */
    var $xmlFile;
    
    /**
     * @var resource XML Parser
     * @access private
     */
    var $parser;

    /**
     * @var integer current XML depth
     * @access private
     */
    var $depth = 0;
    
    /**
     * @var array
     * @access private
     */
    var $elements = array();
    
    /**
     * @var array
     * @access private
     */
    var $element;
    
    /**
     * @var array current listener config
     * @access private
     */
    var $listener;
    
    /**
     * @var array event handler config
     * @access private
     */
    var $eventHandler;
    
    /**
     * @var array current plugin config
     * @access private
     */
    var $plugin;
    
    /**
     * @var array associative array of application configuration
     * @access private
     */
    var $config = array(
        'properties'     => array(),
        'listeners'      => array(),
        'event-filters'  => array(),
        'event-handlers' => array(),
        'page-views'     => array(),
        'plugins'        => array()
    );
    
    
    
    function MachII_framework_Config()
    {
        $parser =& xml_parser_create();
        $this->parser =& $parser;
        xml_set_object($this->parser, $this);
        xml_parser_set_option($this->parser, XML_OPTION_CASE_FOLDING, false);
        xml_set_element_handler($this->parser, '_openElementHandler', '_closeElementHandler');
    }
    
    function &loadConfig($file)
    {
        $xmlFile = @fopen($file, 'rb');
        if ($xmlFile === false) {
            trigger_error(
                sprintf("I/O warning: failed to load external enity \"%s\" in %s near line %d",
                    $file,
                    __FILE__,
                    __LINE__),
                E_USER_WARNING
            );
        }
        $this->xmlFile =& $xmlFile;
    }
    
    function &parse($file)
    {
        $this->loadConfig($file);
        
        while ($xml = fread($this->xmlFile, 2048)) {
            if (!$this->parseString($xml, feof($this->xmlFile))) {
                trigger_error(
                    sprintf("%s:%d:parser error: %s in %s near line %d",
                        $file,
                        xml_get_current_line_number($this->parser),
                        xml_error_string(xml_get_error_code($this->parser)),
                        __FILE__,
                        __LINE__),
                    E_USER_WARNING
                );
            }
        }
        
        fclose($this->xmlFile);
        xml_parser_free($this->parser);
    }
    
    
    function parseString($xml, $eof = false)
    {
        return xml_parse($this->parser, $xml, $eof);
    }
    
    
    function _openElementHandler($parser, $element, $attribs)
    {
        //event-handler count
        static $ehCnt;
        
        $this->elements[$this->depth++] = strtolower($element);
        $this->element = implode('/', $this->elements);
        
        switch ($this->element) {
            case 'mach-ii/properties/property':
               $this->config['properties'][$attribs['name']] = $attribs['value'];
                break;
            
            case 'mach-ii/listeners/listener':
                $this->listener = $attribs['name'];
                $this->config['listeners'][$this->listener] =  $attribs;
                $this->config['listeners'][$this->listener]['parameters'] = array();
                break;
                
            case 'mach-ii/listeners/listener/invoker':
                $this->config['listeners'][$this->listener]['invoker'] = $attribs;
                break;
                
            case 'mach-ii/listeners/listener/parameters/parameter':
                $this->config['listeners'][$this->listener]['parameters'][$attribs['name']] = $attribs['value'];
                break;
                
            case 'mach-ii/event-filters/event-filter':
                $this->eventFilter = $attribs['name'];
                $this->config['event-filters'][$this->eventFilter] = $attribs;
                break;
                
            case 'mach-ii/event-handlers/event-handler':
                $ehCnt = -1;
                $access = (!empty($attribs['access'])
                    && (strtolower($attribs['access']) == 'private'))?
                        MACHII_EVENT_ACCESS_PRIVATE:
                        MACHII_EVENT_ACCESS_PUBLIC;
                $this->eventHandler = $attribs['event'];
                $this->config['event-handlers'][$attribs['event']]['access'] = $access;
                break;
                
            case 'mach-ii/event-handlers/event-handler/filter':
                $this->config['event-handlers'][$this->eventHandler][++$ehCnt] = array(
                    'filter' => array_merge($attribs, array('parameters' => array())));    
                break;
                
            case 'mach-ii/event-handlers/event-handler/filter/parameter':
                $this->config['event-handlers'][$this->eventHandler][$ehCnt]['filter']['parameters'][$attribs['name']] = $attribs['value'];
                break;
                
            case 'mach-ii/event-handlers/event-handler/notify':
                if (empty($attribs['resultKey'])) {
                    $attribs['resultKey'] = null;
                } 
                $this->config['event-handlers'][$this->eventHandler][++$ehCnt] = array(
                    'notify' => $attribs
                );
                break;
                
            case 'mach-ii/event-handlers/event-handler/event-arg':
                if (empty($attribs['value'])) {
                    $attribs['value'] = null;
                }
                if (empty($attribs['variable'])) {
                    $attribs['variable'] = null;
                }
                $this->config['event-handlers'][$this->eventHandler][++$ehCnt] = array(
                    'event-arg' => $attribs
                );
                break;
                
            case 'mach-ii/event-handlers/event-handler/event-mapping':
                $this->config['event-handlers'][$this->eventHandler][++$ehCnt] = array(
                    'event-mapping' => $attribs
                );
                break;
                
            case 'mach-ii/event-handlers/event-handler/view-page':
                if (empty($attribs['contentKey'])) {
                    $attribs['contentKey'] = null;
                }
                $attribs['append'] = 
                    (isset($attribs['append'])
                    && ($attribs['append'] == 'true'))?
                        true:false;
                $this->config['event-handlers'][$this->eventHandler][++$ehCnt] = array(
                    'view-page' => $attribs
                );
                break;
                
            case 'mach-ii/event-handlers/event-handler/announce':
                $attribs['copyEventArgs'] = 
                    (isset($attribs['copyeventargs'])
                    && ($attribs['copyeventargs'] == 'false'))?
                        false:true;
                $this->config['event-handlers'][$this->eventHandler][++$ehCnt] = array(
                    'announce' => $attribs
                );
                break;
                
            case 'mach-ii/event-handlers/event-handler/event-bean':
                if (empty($attribs['fields'])) {
                    $attribs['fields'] = null;
                }
                $this->config['event-handlers'][$this->eventHandler][++$ehCnt] = array(
                    'event-bean' => $attribs
                );
                break;
            
            case 'mach-ii/page-views/page-view':
                $attribs['append'] = 
                    (isset($attribs['append'])
                    && ($attribs['append'] == 'true'))?
                        true:false;
                $this->config['page-views'][$attribs['name']] = $attribs['page'];
                break;
                
            case 'mach-ii/plugins/plugin':
                $this->plugin = $attribs['name'];
                $this->config['plugins'][$this->plugin] = $attribs;
                $this->config['plugins'][$this->plugin]['parameters'] = array();
                break;
                
            case 'mach-ii/plugins/plugin/parameters/parameter':
                $this->config['plugins'][$this->plugin]['parameters'][$attribs['name']] = $attribs['value'];
        }
    }
    
    
    function _closeElementHandler($parser, $element)
    {
        if ($this->element == 'mach-ii') {
            // Done; do some cleanup.
            unset($this->listener);
            unset($this->eventFilter);
            unset($this->plugin);
        }
        
        unset($this->elements[--$this->depth]);
        $this->element = implode('/', $this->elements);
    }
    
    
    function getConfig($element)
    {
        return (isset($this->config[$element]))?$this->config[$element]:false;
    }

}

?>
