<?php
session_start();
ob_start();

function autoloadClass($class)
{

    $path = __DIR__ . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . $class . '.php';

    if (file_exists($path)) {
        require_once $path;
    }
}

spl_autoload_register('autoloadClass');
