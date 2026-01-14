<?php 
namespace app\router;

class Router
{
    public function run()
    {
        $routeFilter = new RouterFilter;
        $route = $routeFilter->controller();

        return $route;
    }
}




?>