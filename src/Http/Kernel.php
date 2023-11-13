<?php

namespace src\Http;

use src\Http\Routes\Router;
use src\View\View;

class Kernel
{
    private static self $kernel;
    private Router $router;

    private function __construct(?string $uri)
    {
        Router::init();
        $this->router = Router::getInstance();
    }

    public static function init()
    {
        if (isset(self::$kernel)) {
            return;
        }
        $uri = $_SERVER['PATH_INFO'];
        self::$kernel = new self($uri);
    }

    public function loadRoutes(): void
    {
        require __DIR__ . '/../../routes/routes.php';
    }

    public function __get(string $name)
    {
        return $this->$name;
    }

    public static function getInstance()
    {
        return self::$kernel;
    }

    public function handleRequest()
    {
        $route = $this->router->requestedRoute();
        $controller = new $route->class;
        $response = $controller->{$route->action}();
        if ($response instanceof View) {
            $response->visualize();
        }
    }

}
