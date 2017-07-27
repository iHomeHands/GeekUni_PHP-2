<?php

function __autoload($className)
{
    $dirs = [
        'controller',
        'data/migrate',
        'lib',
        'lib/smarty',
        'lib/commands',
        'model/'
    ];
    $found = false;
    foreach ($dirs as $dir) {
        $fileName = __DIR__ . '/' . $dir . '/' . $className . '.class.php';
        if (is_file($fileName)) {

            require_once($fileName);
            $found = true;
        }
    }
    if (!$found) {
        throw new Exception('Unable to load ' . $className);
    }
    return true;
}

__autoload('Status');
__autoload('OrderStatus');
__autoload('CategoriesController');