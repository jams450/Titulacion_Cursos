<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdf44dab5741613f42368deb8f7205121
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitdf44dab5741613f42368deb8f7205121::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitdf44dab5741613f42368deb8f7205121::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
