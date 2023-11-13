<?php

use src\Http\Kernel;

require_once '../src/autoload.php';
require_once '../src/View/helpers.php';

function app(): Kernel
{
    return Kernel::getInstance();
}

Kernel::init();

app()->loadRoutes();

app()->handleRequest();

