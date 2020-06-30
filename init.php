<?php

namespace CustomDev;

class Init
{
    private $components;



    public function __construct()
    {
        $this->components = [
            '/constants/',
            '/third-parties/',
            '/app/helpers/',
            '/app/classes/',
            '/app/hooks/',
            '/app/shortcodes/',
            '/app/metaboxes/',
            '/app/models/',
            '/app/wp-crons/',
            '/app/wp-rest-api/'
        ];

        $this->loadComponents();
    }



    private function loadComponents()
    {
        foreach ($this->components as $component) {
            $componentItems = $this->getFolderContent(dirname(__FILE__) . $component);

            foreach ($componentItems as $componentItem) {
                require_once(dirname(__FILE__) . $component . $componentItem);
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
