<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit30b164362083081f2e5f3763abf53576
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'Duracom\\JsonLd\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Duracom\\JsonLd\\' => 
        array (
            0 => __DIR__ . '/..' . '/duracom/jsonld/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit30b164362083081f2e5f3763abf53576::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit30b164362083081f2e5f3763abf53576::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit30b164362083081f2e5f3763abf53576::$classMap;

        }, null, ClassLoader::class);
    }
}