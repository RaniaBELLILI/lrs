<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitaef223fe44fc09480ce6dbe7c8be42b3
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitaef223fe44fc09480ce6dbe7c8be42b3', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitaef223fe44fc09480ce6dbe7c8be42b3', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitaef223fe44fc09480ce6dbe7c8be42b3::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
