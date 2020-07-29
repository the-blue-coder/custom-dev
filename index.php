<?php

/**
 * Plugin name: Custom Dev
 * Description: Plugin Framework for WordPress Development
 * Author: Jean R.
 * Version: 2.0.0
 */

require_once 'vendor/autoload.php';

if (GITHUB_VERSIONED) {
    new CustomDev\Updater(__FILE__);
}