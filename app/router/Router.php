<?php 
namespace app\router;

use app\controllers\Controller;

class Router
{
    public function run()
    {
        try {
            $routeFilter = new RouterFIlter;
            $route = $routeFilter->controller();

            $controller = new Controller;
            $controller->execute($route);

        } catch (\Throwable $e) {
            echo $e->getMessage();
        }
    }
}




?>