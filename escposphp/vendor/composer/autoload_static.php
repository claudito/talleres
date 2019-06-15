<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf92b3fc59cd472f4c26097b289539c12
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Mike42\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Mike42\\' => 
        array (
            0 => __DIR__ . '/..' . '/mike42/escpos-php/src/Mike42',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf92b3fc59cd472f4c26097b289539c12::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf92b3fc59cd472f4c26097b289539c12::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}