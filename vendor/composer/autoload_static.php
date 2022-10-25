<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbc672b800f2e5da6256663da640aab98
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbc672b800f2e5da6256663da640aab98::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbc672b800f2e5da6256663da640aab98::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
