<?php

class Init
{
    public function __construct()
    {
        $this->autoloadElements();
    }



    private function autoloadElements()
    {
        $configsFolder = dirname(__FILE__) . '/config';
        $configs       = $this->getFolderContent($configsFolder);

        foreach ($configs as $config) {
            require $configsFolder . '/' . $config;
        }

        foreach (AUTOLOADED_SRC_ELEMENTS as $element) {
            $files = $this->getFolderContent(dirname(__FILE__) . '/' . CUSTOM_DEV_SRC_FOLDER_NAME . '/' . $element);

            foreach ($files as $file) {
                $class           = basename($file, '.php');
                $namespacedClass = 'CustomDev\\' . $element . '\\' . $class;
    
                if (class_exists($namespacedClass)) {
                    new $namespacedClass;
                }
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