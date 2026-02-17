<?php 
namespace app\controllers;

use app\router\Routes;
use app\router\RouteType;
use app\router\Uri;

class ControllerParams
{
    // Para pegar o parâmetro caso exista recebo a rota como parâmetro
    public function get($router)
    {
        // passo a URI, Tipo de rota e o AArray de rotas as variáveis
        $uri = new Uri;
        $typeRoute = RouteType::get();
        $routes = Routes::get();

        // Procuro a rota Compatível a rota passada pelo parâmetro 
        $indexRouter = array_search($router,$routes[$typeRoute]);

        // Explode na barra '/' para formar um array da URI
        $explodeUri = explode('/',$uri->get());
        
        // Explode na barra '/' da rota da variável $indexRouter para formar um array dele
        $explodeRoute = explode('/', $indexRouter);
        
        // crio um array vazio para colocar os parâmetros
        $params = [];
        
        // Loop Foreach para verificar se o valor do array $explodeRoute é diferente do $explodeUri caso for diferente ele salva dentro do array $params
        foreach ($explodeRoute as $index => $value) {
            if ($value !== $explodeUri[$index]) {
                $params[$index] = $explodeUri[$index];
            }
        }

        // retorno o array $params utilizo o array values para que o array $params comece no índice 0
        return array_values($params);
    }
}




?>