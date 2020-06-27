<?php

namespace CustomDev\App\Hooks;

class WPUpdatesHandler
{
    public function __construct()
    {
        //Deactivate WordPress update nags in back-office
        add_action('after_setup_theme', [$this, 'deactivateWordPressUpdateNags']);

        //Deactivate update for some plugins 
        add_filter('site_transient_update_plugins', [$this, 'deactivateSomePluginsUpdate']);

        //Remove plugin update count circle
        add_action('admin_menu', [$this, 'removePluginUpdateCountCircle']);
    }



    public function deactivateWordPressUpdateNags()
    {
        add_filter('pre_option_update_core', '__return_null');
        add_filter('pre_site_transient_update_core', '__return_null');
    }



    public function deactivateSomePluginsUpdate($value)
    {
        unset($value->response['advanced-custom-fields-pro/acf.php']);
        unset($value->response['wp-linkedin-connect/wp-linkedin-connect.php']);

        return $value;
    }



    public function removePluginUpdateCountCircle()
    {
        global $menu, $submenu;

        $menu[65][0] = 'Plugins';	
        $submenu['index.php'][10][0] = 'Updates';
    }
}

new WPUpdatesHandler();