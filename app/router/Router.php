<?php 
namespace app\router;

use app\router\RouterFilter;

class Router
{
    public function run()
    {
        // Procuro a Rota na Classe RouterFilter e retorno o Controller compatível
        $routeFilter = new RouterFilter;
        $route = $routeFilter->controller();

        return $route;
    }
}




?>