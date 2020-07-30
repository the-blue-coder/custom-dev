<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit35eecaaf4a9c7e9b44e63dedc826a5ee
{
    public static $files = array (
        'a282c8be9e528645d5772391932641bf' => __DIR__ . '/../..' . '/updater.php',
        'cafd412a62b2de521724eede9cc17c2d' => __DIR__ . '/../..' . '/src/Helpers/custom-functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'CustomDev\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'CustomDev\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'CustomDev\\Hooks\\Assets' => __DIR__ . '/../..' . '/src/Hooks/Assets.php',
        'CustomDev\\Hooks\\CustomPostTypes' => __DIR__ . '/../..' . '/src/Hooks/CustomPostTypes.php',
        'CustomDev\\Hooks\\WPUpdates' => __DIR__ . '/../..' . '/src/Hooks/WPUpdates.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit35eecaaf4a9c7e9b44e63dedc826a5ee::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit35eecaaf4a9c7e9b44e63dedc826a5ee::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit35eecaaf4a9c7e9b44e63dedc826a5ee::$classMap;

        }, null, ClassLoader::class);
    }
}
