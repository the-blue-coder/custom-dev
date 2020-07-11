<?php

namespace CustomDev\App\Hooks;

class Assets
{
    public function __construct()
    {
        $this->loadCSS();
        $this->loadJS();
    }



    public function loadCSS()
    {
        add_action('admin_enqueue_scripts', 'doCSSLoading');
        add_action('wp_enqueue_scripts', 'doCSSLoading');
        
        function doCSSLoading()
        {
            wp_enqueue_style(
                'custom-dev', 
                CUSTOM_DEV_PLUGIN_DIST_URL . 'css/custom-styles.min.css', 
                [],
                rand(1, 10000)
            );
        }
    }



    public function loadJS()
    {
        add_action('admin_enqueue_scripts', 'doJSLoading');
        add_action('wp_enqueue_scripts', 'doJSLoading');
        
        function doJSLoading()
        {
            wp_enqueue_script(
                'custom-dev-js', 
                CUSTOM_DEV_PLUGIN_DIST_URL . 'js/custom-scripts.min.js', 
                [], 
                rand(1, 10000)
            );
        }
    }
}

new Assets();
