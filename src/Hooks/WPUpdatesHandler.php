<?php

namespace CustomDev\App\Hooks;

class WPUpdatesHandler
{
    public function __construct()
    {
        $this->deactivateWordPressUpdateNags();
        $this->deactivateSomePluginsUpdate();
        $this->removePluginUpdateCountCircle();
    }



    public function deactivateWordPressUpdateNags()
    {
        add_action('after_setup_theme', function () {
            add_filter('pre_option_update_core', '__return_null');
            add_filter('pre_site_transient_update_core', '__return_null');
        });
    }



    public function deactivateSomePluginsUpdate()
    {
        add_filter('site_transient_update_plugins', function ($value) {
            if (is_object($value)) {
                unset($value->response['advanced-custom-fields-pro/acf.php']);
            }
            
            return $value;
        });
    }



    public function removePluginUpdateCountCircle()
    {
        add_action('admin_menu', function () {
            global $menu, $submenu;

            $menu[65][0] = __('Plugins');	
            $submenu['index.php'][10][0] = 'Updates';
        });
    }
}

new WPUpdatesHandler();