<?php

spl_autoload_extensions('.php');
spl_autoload_register(function($class) {
    $file = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) include $file;
    }
);

require_once '../vendor/autoload.php';

// create RestaurantChain and display its HTML representation
require_once 'classes/RestaurantChain.php';
$chain = new RestaurantChain();
echo $chain->toHTML();
