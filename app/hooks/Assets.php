<?php

namespace CustomDev\App\Hooks;

class Assets
{
    public function __construct()
    {
        #Load CSS
        add_action('admin_enqueue_scripts', [$this, 'loadCSS']);
        add_action('wp_enqueue_scripts', [$this, 'loadCSS']);

        #Load JS
        add_action('admin_enqueue_scripts', [$this, 'loadJS']);
        add_action('wp_enqueue_scripts', [$this, 'loadJS']);
    }



    public function loadCSS()
    {
        wp_enqueue_style(
            'custom-dev', 
            CUSTOM_DEV_PLUGIN_DIST_URL . 'css/custom-styles.min.css', 
            [],
            rand(1, 10000)
        );
    }



    public function loadJS()
    {
        wp_enqueue_script(
            'custom-dev-js', 
            CUSTOM_DEV_PLUGIN_DIST_URL . 'js/custom-scripts.min.js', 
            [], 
            rand(1, 10000)
        );
    }
}

new Assets();