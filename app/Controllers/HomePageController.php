<?php

namespace app\Controllers;

use src\View\View;

class HomePageController
{
    public function home_page()
    {
        $greeting = "hello, text from controller\n";
        $kernel = app();
//        dd(123);
        return view('home_page', compact('greeting', 'kernel'));
    }
}