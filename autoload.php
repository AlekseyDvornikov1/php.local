<?php

function my_app_autoload($class)
{
    $fileName =  __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    if(file_exists($fileName))
    {
        include $fileName;
    }
}

spl_autoload_register('my_app_autoload');

//include __DIR__ .   '/vendor/autoload.php';