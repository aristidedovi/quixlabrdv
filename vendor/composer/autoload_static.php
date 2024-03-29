<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit379189dee83312a08107362039afb447
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'Informagenie\\' => 13,
        ),
        'C' => 
        array (
            'Curl\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Informagenie\\' => 
        array (
            0 => __DIR__ . '/..' . '/informagenie/orange-sms/src',
        ),
        'Curl\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-curl-class/php-curl-class/src/Curl',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit379189dee83312a08107362039afb447::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit379189dee83312a08107362039afb447::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
