<?php

/**
 * GITHUB REPOSITORY INFOS
 */
define('GITHUB_USERNAME',     'madainsight');
define('GITHUB_REPOSITORY',   'custom-dev');
define('GITHUB_ACCESS_TOKEN', '5241b64a5655af2bc306374a8a36bc73db9f203c');


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
