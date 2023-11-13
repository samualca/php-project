<?php

use src\Http\Routes\Route;

Route::create('get', 'home_page', \app\Controllers\HomePageController::class, 'home_page');
