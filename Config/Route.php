<?php
/**
 * Created by PhpStorm.
 * User: Jonathan
 * Date: 20/02/2016
 * Time: 13:33
 */

namespace REST\Config;

/**
 * Class Route
 * @package Marmiton\Config
 * @property string $route
 * @property string $controller
 */
class Route
{
    /**
     * Url in browser
     * @var string $route
     */
    private $route;

    /**
     * Where is the file associated with $route
     * @var string $controller
     */
    private $controller;

    public function __construct($route, $controller)
    {
        $this->route = $route;
        $this->controller = $controller;
    }

    /**
     * @return string
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @param string $route
     * @return $this
     */
    public function setRoute($route)
    {
        $this->route = $route;
        return $this;
    }

    /**
     * @return string
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @param string $controller
     * @return $this
     */
    public function setController($controller)
    {
        $this->controller = $controller;
        return $this;
    }
}