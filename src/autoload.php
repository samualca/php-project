<?php

use JetBrains\PhpStorm\NoReturn;

spl_autoload_register(function (string $class_name) {
    $class_name = str_replace('\\', '/', $class_name);
    require_once __DIR__ . "/../{$class_name}.php";
});

#[NoReturn] function dd(): void
{
    echo '<pre>';
    array_map(function($x) {var_dump($x);}, func_get_args());
    die;
}