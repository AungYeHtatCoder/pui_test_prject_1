<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitb7acac64acb2e8e4d59ebdbdd8dfd01c
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

        spl_autoload_register(array('ComposerAutoloaderInitb7acac64acb2e8e4d59ebdbdd8dfd01c', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitb7acac64acb2e8e4d59ebdbdd8dfd01c', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitb7acac64acb2e8e4d59ebdbdd8dfd01c::getInitializer($loader));

        $loader->register(true);

        $includeFiles = \Composer\Autoload\ComposerStaticInitb7acac64acb2e8e4d59ebdbdd8dfd01c::$files;
        foreach ($includeFiles as $fileIdentifier => $file) {
            composerRequireb7acac64acb2e8e4d59ebdbdd8dfd01c($fileIdentifier, $file);
        }

        return $loader;
    }
}

/**
 * @param string $fileIdentifier
 * @param string $file
 * @return void
 */
function composerRequireb7acac64acb2e8e4d59ebdbdd8dfd01c($fileIdentifier, $file)
{
    if (empty($GLOBALS['__composer_autoload_files'][$fileIdentifier])) {
        $GLOBALS['__composer_autoload_files'][$fileIdentifier] = true;

        require $file;
    }
}