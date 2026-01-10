<?php 
namespace app\router;


class RouterFIlter
{
    public string $uri;
    public string $typeRoute;
    public array $routes;

    public function __construct() {
        $this->uri = Uri::get();
        $this->typeRoute = RouteType::get();
        $this->routes = Routes::get();
    }

    public function simpleRoute()
    {
        if (array_key_exists($this->uri,$this->routes[$this->typeRoute])) {
            return $this->routes[$this->typeRoute][$this->uri];
        }

        return ucfirst(DEFAULT_CONTROLLER).'Controller';
    }

    public function controller()
    {
        $route = $this->simpleRoute();
        if (str_contains($route,'@')) {
            list($controller, $method) = explode('@',$route);

            return $controller;
        }

        return $route;
        
    }

    public function method()
    {
        $route = $this->simpleRoute();
        if (str_contains($route,'@')) {
            list($controller, $method) = explode('@',$route);

            return $method;
        }

        return DEFAULT_METHOD;
        
    }
}




?>