<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5cb650b28ff30fa0b9b47e62bd29a8d8
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'LINE\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'LINE\\' => 
        array (
            0 => __DIR__ . '/..' . '/linecorp/line-bot-sdk/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5cb650b28ff30fa0b9b47e62bd29a8d8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5cb650b28ff30fa0b9b47e62bd29a8d8::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
