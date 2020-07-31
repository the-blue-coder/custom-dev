<?php

/**
 * Plugin name: Custom Dev
 * Description: Plugin Framework for WordPress Development
 * Author: Jean R.
 * Version: 2.2.0
 */

require 'vendor/autoload.php';

require 'init.php';

if (GITHUB_VERSIONED) {
    new GithubVersioning\Updater(__FILE__);
}
