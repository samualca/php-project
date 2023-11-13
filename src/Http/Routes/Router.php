<?php

namespace src\Http\Routes;

class Router
{
    private static Router $router;
    private ?Route $requested_route = null;
    private array $routes;
    private ?string $uri = null;

    private function __construct()
    {
        if (isset($_SERVER['PATH_INFO'])) {
            $this->uri = trim($_SERVER['PATH_INFO'], '/');
        }
    }

    public static function init(): void
    {
        if (isset(self::$router)) {
            return;
        }
        self::$router = new self();
    }

    public function registerRoute(Route $route): void
    {
        $this->routes[] = $route;
    }

    public static function getInstance(): Router
    {
        return self::$router;
    }

    public function requestedRoute()
    {
        if ($this->requested_route) {
            return $this->requested_route;
        }
        foreach ($this->routes as $route) {
            if ($route->uri === $this->uri) {
                $this->requested_route = $route;
                return $this->requested_route;
            }
        }
    }

}