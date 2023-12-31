<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2f81249fc6f91334e779a1017efafa3b
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'API\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'API\\' => 
        array (
            0 => __DIR__ . '/../..' . '/API',
        ),
    );

    public static $classMap = array (
        'API\\Actualizar\\Actualizar' => __DIR__ . '/../..' . '/API/Actualizar/Actualizar.php',
        'API\\Agregar\\Agregar' => __DIR__ . '/../..' . '/API/Agregar/Agregar.php',
        'API\\BaseDeDatos\\DataBase' => __DIR__ . '/../..' . '/API/BaseDeDatos/DataBase.php',
        'API\\Eliminar\\Eliminar' => __DIR__ . '/../..' . '/API/Eliminar/Eliminar.php',
        'API\\Leer\\Leer' => __DIR__ . '/../..' . '/API/Leer/Leer.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2f81249fc6f91334e779a1017efafa3b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2f81249fc6f91334e779a1017efafa3b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2f81249fc6f91334e779a1017efafa3b::$classMap;

        }, null, ClassLoader::class);
    }
}
