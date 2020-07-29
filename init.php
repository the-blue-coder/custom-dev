<?php

class Init
{
    private $goDirectElements;



    public function __construct()
    {
        $this->go();
    }



    private function go()
    {
        foreach (AUTOLOADED_SRC_ELEMENTS as $element) {
            $files = $this->getFolderContent(dirname(__FILE__) . '/src/' . $element);

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