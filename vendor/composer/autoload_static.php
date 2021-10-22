<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd3638d753eeeacbf8dbfbe4bd8b4ae72
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'Devcompru\\Http\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Devcompru\\Http\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd3638d753eeeacbf8dbfbe4bd8b4ae72::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd3638d753eeeacbf8dbfbe4bd8b4ae72::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd3638d753eeeacbf8dbfbe4bd8b4ae72::$classMap;

        }, null, ClassLoader::class);
    }
}
