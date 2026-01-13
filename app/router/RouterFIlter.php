<?php 
namespace app\router;


class RouterFIlter
{
    public $uri;
    public string $typeRoute;
    public array $routes;

    public function __construct() {
        $this->uri = new Uri;
        $this->typeRoute = RouteType::get();
        $this->routes = Routes::get();
    }

    public function simpleRoute()
    {
        $uri = ($this->uri->emptyUri()) ? $this->uri->get() : rtrim($this->uri->get(), '/');

        if (array_key_exists($uri,$this->routes[$this->typeRoute])) {
            return $this->routes[$this->typeRoute][$uri];
        }

        return null;
    }

    public function controller()
    {
        $route = $this->simpleRoute();
        
        if ($route) {
            return $route;
        }

        return ERROR_CONTROLLER;
    }
}




?>