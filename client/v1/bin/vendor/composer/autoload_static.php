<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3de178216f06a8f4be7576a97b63e49f
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'J' => 
        array (
            'Johnciacia\\Avataaar\\' => 20,
        ),
        'A' => 
        array (
            'Avataaar\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'Johnciacia\\Avataaar\\' => 
        array (
            0 => __DIR__ . '/..' . '/johnciacia/avataaar/src',
        ),
        'Avataaar\\' => 
        array (
            0 => __DIR__ . '/..' . '/johnciacia/avataaar/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3de178216f06a8f4be7576a97b63e49f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3de178216f06a8f4be7576a97b63e49f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3de178216f06a8f4be7576a97b63e49f::$classMap;

        }, null, ClassLoader::class);
    }
}