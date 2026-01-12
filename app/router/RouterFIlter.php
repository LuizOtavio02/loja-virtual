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
        $uri = rtrim($this->uri, '/');
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

        return ucfirst(DEFAULT_CONTROLLER).'Controller@'.DEFAULT_METHOD;
    }
}




?>