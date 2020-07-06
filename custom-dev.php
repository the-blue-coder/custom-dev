<?php

/**
 * Plugin name: Custom Dev
 * Description: Custom codes
 * Author: Jean R.
 * Version: 1.0.0
 */

/**
 * Load composer dependencies
 */
require_once('vendor/autoload.php');


/**
 * Init our framework
 */
require_once('init.php');


/**
 * Handle plugin update
 */
require_once('updater.php');

new CustomDev\Updater(__FILE__);
