<?php

namespace REST\Config;

/**
 * Class Router
 * @package REST\Config
 */
class Router
{
    /** @var Route $routes */
    private $routes;

    /**
     * Router constructor.
     * @param array $routes
     */
    public function __construct(array $routes = [])
    {
        foreach ($routes as $route) {
            $this->addRoute($route);
        }
        return $this;
    }

    /**
     * Add one $route
     * @param Route $route
     * @return $this
     */
    public function addRoute(Route $route)
    {
        $this->routes[] = $route;
        return $this;
    }

    /**
     * Return true if $url match with one route
     * @param $url
     * @return bool
     */
    public function match($url)
    {
        foreach ($this->getRoutes() as $route) {
            /** @var Route $route */
            if (strtolower($route->getRoute()) == strtolower($url)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Return all routes
     * @return mixed
     */
    public function getRoutes()
    {
        return $this->routes;
    }

}
