<?php

/**
 * DIRS AND URLS
 */
define('CUSTOM_DEV_TEXTDOMAIN',        'custom-dev');
define('CUSTOM_DEV_PLUGIN',            dirname(__FILE__));
define('CUSTOM_DEV_PLUGIN_URL',        plugins_url('', CUSTOM_DEV_PLUGIN));
define('CUSTOM_DEV_PLUGIN_DIR',        dirname(CUSTOM_DEV_PLUGIN));
define('CUSTOM_DEV_PLUGIN_DIST_URL',   CUSTOM_DEV_PLUGIN_URL . '/dist/');
define('CUSTOM_DEV_PLUGIN_DIST_DIR',   CUSTOM_DEV_PLUGIN_DIR . '/dist/');
define('CUSTOM_DEV_PLUGIN_IMAGES_URL', CUSTOM_DEV_PLUGIN_URL . '/dist/images/');