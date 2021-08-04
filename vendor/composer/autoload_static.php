<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit79dfa80297491d2f72ffc4d867ff0191
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit79dfa80297491d2f72ffc4d867ff0191::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit79dfa80297491d2f72ffc4d867ff0191::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit79dfa80297491d2f72ffc4d867ff0191::$classMap;

        }, null, ClassLoader::class);
    }
}
