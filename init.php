<?php

namespace CustomDev;

class Init
{
    private $components;



    public function __construct()
    {
        $this->components = [
            '/app/helpers/',
            '/app/classes/',
            '/app/hooks/',
            '/app/shortcodes/',
            '/app/models/',
            '/app/wp-crons/',
            '/app/wp-rest-api/',
            '/third-parties/'
        ];

        $this->loadComponents();
    }



    private function loadComponents()
    {
        foreach ($this->components as $component) {
            $componentItems = $this->getFolderContent(CUSTOM_DEV_PLUGIN_DIR . $component);

            foreach ($componentItems as $componentItem) {
                require_once(CUSTOM_DEV_PLUGIN_DIR . $component . $componentItem);
            }
        }
    }



    private function getFolderContent($folderPath)
    {
        $folder = [];

        if (is_dir($folderPath)) {
            $folder = scandir($folderPath);
            $folder = array_values(array_diff($folder, array('.', '..')));
        }
        
        return $folder;
    }
}

new Init();