<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1bea3f8fb921d7cb3de291bc9dcef57e
{
    public static $files = array (
        '841cc3d5192f1a988c73777dfad9b6cd' => __DIR__ . '/../..' . '/inc/helpers.php',
        'f7a7b794aad42120dafab329b07d93eb' => __DIR__ . '/..' . '/wptt/webfont-loader/wptt-webfont-loader.php',
    );

    public static $prefixLengthsPsr4 = array (
        'K' => 
        array (
            'KentaBlocks\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'KentaBlocks\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1bea3f8fb921d7cb3de291bc9dcef57e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1bea3f8fb921d7cb3de291bc9dcef57e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit1bea3f8fb921d7cb3de291bc9dcef57e::$classMap;

        }, null, ClassLoader::class);
    }
}
