<?php

namespace Core;

use App\Config;

final class Router
{
    protected array $routes = [];

    /**
     * @param string $route
     * @param $controller
     * @param string $method
     * @return void
     * @throws \ReflectionException
     */
    public function addRoute(string $route, $controller, string $method): void
    {
        $class = new \ReflectionClass($controller);
        if (
            !empty($route)
            && !empty($method)
            && (is_subclass_of($class->getName(), BaseController::class))
            && strpos($class->getNamespaceName(), $this->getControllersNamespace()) !== false
        ) {
            $this->routes[$route] = [$class->getName(), $method];
        } else {
            throw  new \InvalidArgumentException("Invalid route: {$route} -> {$controller}::{$method}");
        }
    }

    /**
     * @param string $uri
     * @return void
     * @throws \Exception
     */
    public function dispatch(string $uri): void
    {
        $uri = preg_replace('/\?.*/', '', $uri);

        if (!$this->routes[$uri]) {
            throw new \Exception("Router: Unknown \"{$uri}\"");
        }

        [$class, $method] = $this->routes[$uri];

        if (class_exists($class)) {
            call_user_func_array([$class, $method], $_REQUEST);
        } else {
            throw new \Exception("Router: \"{$class}\" not found!");
        }
    }

    /**
     * @return array
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }

    public function getControllersNamespace()
    {
        return Config::getInstance()->getControllersNamespace();
    }
}