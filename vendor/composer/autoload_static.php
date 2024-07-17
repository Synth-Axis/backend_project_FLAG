<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit214112a26d1cf06616f9cf7039ba006f
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit214112a26d1cf06616f9cf7039ba006f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit214112a26d1cf06616f9cf7039ba006f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit214112a26d1cf06616f9cf7039ba006f::$classMap;

        }, null, ClassLoader::class);
    }
}
