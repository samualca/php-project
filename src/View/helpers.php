<?php

use src\View\View;

function view(string $view_template, array $variables = []): View
{
    return View::generate($view_template, $variables);
}
