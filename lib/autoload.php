<?php

function autoload($className)
{
    $dirs = [
        'controller',
        'data/migrate',
        'lib',
        //'lib/smarty',
        'lib/commands',
        'model'
    ];
    $found = false;
    foreach ($dirs as $dir) {
        $fileNameU = __DIR__ . '/../' . $dir . '/' . ucfirst($className) . '.class.php';
        $fileNameL = __DIR__ . '/../' . $dir . '/' . lcfirst($className) . '.class.php';
        if (is_file($fileNameU)) {
            require_once($fileNameU);
            $found = true;
        } elseif (is_file($fileNameL)) {
            require_once($fileNameL);
            $found = true;
        }
    }
    if (!$found) {
        throw new Exception('Unable to load ' . $className);
    }
    return true;
}

spl_autoload_register('autoload');
