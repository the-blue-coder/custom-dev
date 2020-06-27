<?php

/**
 * Plugin name: Custom Dev
 * Description: Custom codes
 * Author: Jean R.
 * Version: 2.0
 */

/**
 * Constants
 */
require_once('constants/global.php');


/**
 * Helpers
 */
require_once('app/helpers/custom-functions.php');


/**
 * Composer dependencies
 */
require_once('vendor/autoload.php');


/**
 * Third party libraries (those not manageable via composer)
 */
require_once('third-parties/DateTimeFrench.php');


/**
 * Classes
 */


/**
 * Hooks
 */
require_once('app/hooks/WPUpdatesHandler.php');
require_once('app/hooks/Assets.php');
require_once('app/hooks/CustomPostTypes.php');


/**
 * Shortcodes
 */


/**
 * Models
 */


/**
 * WP Crons
 */
require_once('app/wp-crons/CronIntervals.php');


/**
 * WP Rest API
 */