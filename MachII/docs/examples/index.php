<?php
/**
 * @package MachII
 * @subpackage Example
 */
/**
 * Set the app key for the application.
 */
//$MACHII_APP_KEY = realpath('.');

/**
 * Set the path to the application's config file
 */
//$MACHII_CONFIG_PATH = realpath('./config/mach-ii.xml');

/**
 * Set the configuration mode.
 * MACHII_CONFIG_RELOAD_NEVER   = never reload the config file
 * MACHII_CONFIG_RELOAD_DYNAMIC = reload if it has changed since last load
 * MACHII_CONFIG_RELOAD_ALWAYS  = reload on each request
 */
//$MACHII_CONFIG_MODE = 'MACHII_CONFIG_RELOAD_DYNAMIC';

/**
 * Set the default cache and cache options.
 */
//$MACHII_CACHE = 'MachII.cache.PhpSession';
//$MACHII_CACHE_OPTIONS = array();

// Include Mach-II script
include 'MachII/mach-ii.php';

?>
