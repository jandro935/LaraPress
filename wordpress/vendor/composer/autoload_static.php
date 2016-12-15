<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1744cc2c5d2ec5a619c9f5b5993e6b33
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'Dotenv\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Dotenv\\' => 
        array (
            0 => __DIR__ . '/..' . '/vlucas/phpdotenv/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'j' => 
        array (
            'johnpbloch\\Composer\\' => 
            array (
                0 => __DIR__ . '/..' . '/johnpbloch/wordpress-core-installer/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1744cc2c5d2ec5a619c9f5b5993e6b33::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1744cc2c5d2ec5a619c9f5b5993e6b33::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit1744cc2c5d2ec5a619c9f5b5993e6b33::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
