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



function dates($date)
{
    $t = strtotime($date);
    $d = time() - $t;
    $day = floor($d / (60 * 60 * 24));
    echo ($day != 0) ? ($day == 1) ? $day . ' day ago' : $day . ' days ago'  : 'Today';
}
