<?php 
namespace app\controllers;

use app\router\Routes;
use app\router\RouteType;
use app\router\Uri;

class ControllerParams
{
    public function get($router)
    {
        $uri = new Uri;
        $typeRoute = RouteType::get();
        $routes = Routes::get();

        $indexRouter = array_search($router,$routes[$typeRoute]);

        $explodeUri = explode('/',$uri->get());
        $explodeRoute = explode('/', $indexRouter);

        $params = [];

        foreach ($explodeRoute as $index => $value) {
            if ($value !== $explodeUri[$index]) {
                $params[$index] = $explodeUri[$index];
            }
        }

        return array_values($params);
    }
}




?>