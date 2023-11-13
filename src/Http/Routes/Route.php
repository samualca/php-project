<?php

namespace src\Http\Routes;

class Route
{
    public string $method;
    public string $uri;
    public string $class;
    public string $action;

    private function __construct(string $method, string $uri, string $class, string $action)
    {
        $this->method = $method;
        $this->uri = $uri;
        $this->class = $class;
        $this->action = $action;
    }

    public static function create(string $method, string $uri, string $class, string $action)
    {
        $uri = trim($uri, '/');
        app()->router->registerRoute(new self($method, $uri, $class, $action));
    }
}