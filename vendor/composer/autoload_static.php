<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitce06cde54688f1f702e3eb445068799f
{
    public static $files = array (
        'f084d01b0a599f67676cffef638aa95b' => __DIR__ . '/..' . '/smarty/smarty/libs/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'M' => 
        array (
            'Models\\' => 7,
        ),
        'L' => 
        array (
            'Libs\\Pixie\\' => 11,
            'Libs\\' => 5,
        ),
        'I' => 
        array (
            'Inc\\' => 4,
        ),
        'C' => 
        array (
            'Controllers\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'Models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/models',
        ),
        'Libs\\Pixie\\' => 
        array (
            0 => __DIR__ . '/../..' . '/libs/Pixie',
        ),
        'Libs\\' => 
        array (
            0 => __DIR__ . '/../..' . '/libs',
        ),
        'Inc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
        'Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/controllers',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitce06cde54688f1f702e3eb445068799f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitce06cde54688f1f702e3eb445068799f::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
