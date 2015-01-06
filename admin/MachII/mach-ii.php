<?php
/**
 * Calls the framework via the caching system.
 * @package MachII
 * @author Ben Edwards <ben@ben-edwards.com>
 * @author Alan Richmond <alan@aardwolfweb.com>
 */
//require_once 'Benchmark/Timer.php';
//$timer =& new Benchmark_Timer(true);
/**
 * Load the MachII class
 */
require_once 'MachII/MachII.php';

//$timer->setMarker('MachII.php include');

/**
 * Set the app key for sub-applications within a single application.
 */
if (empty($MACHII_APP_KEY)) {
    $MACHII_APP_KEY = realpath('.');
}

/**
 * Set the path to the application's config file
 */
if (empty($MACHII_CONFIG_PATH)) {
    $MACHII_CONFIG_PATH = realpath('./config/mach-ii.xml');
}

/**
 * Set the configuration mode.
 * MACHII_CONFIG_RELOAD_NEVER   = never reload the config file
 * MACHII_CONFIG_RELOAD_DYNAMIC = reload if it has changed since last load
 * MACHII_CONFIG_RELOAD_ALWAYS  = reload on each request
 */
if (empty($MACHII_CONFIG_MODE)) {
    $MACHII_CONFIG_MODE = MACHII_CONFIG_RELOAD_ALWAYS;
} elseif ((is_string($MACHII_CONFIG_MODE))
  && (substr($MACHII_CONFIG_MODE, 0, 21) == 'MACHII_CONFIG_RELOAD_')) {
    $MACHII_CONFIG_MODE = constant($MACHII_CONFIG_MODE);
    
}

/**
 * Set the default cache and cache options
 */
if (empty($MACHII_CACHE)) {
    $MACHII_CACHE = 'MachII.cache.PhpSession';
}
if (empty($MACHII_CACHE_OPTIONS)
|| (!is_array($MACHII_CACHE_OPTIONS))) {
    $MACHII_CACHE_OPTIONS = array();
}


//$timer->setMarker('setup');
/**
 * Get the appLoader
 */
$appLoader =& MachII::cache(
    $MACHII_CONFIG_PATH,
    $MACHII_CONFIG_MODE,
    $MACHII_APP_KEY,
    $MACHII_CACHE,
    $MACHII_CACHE_OPTIONS
);
if (MachII::isException($appLoader)) {
    echo '<pre>',$appLoader->getExtendedInfo(),'</pre>';
    exit;
}
//$timer->setMarker('appLoader');

/**
 * Get the request handler
 */
$appManager     =& $appLoader->getAppManager();
$requestHandler =& $appManager->getRequestHandler();

/**
 * Handle the request
 */
$result = $requestHandler->handleRequest();
if (MachII::isException($appLoader)) {
    echo '<pre>',$appLoader->getExtendedInfo(),'</pre>';
    exit;
}
//$timer->setMarker('handleRequest');

?>
