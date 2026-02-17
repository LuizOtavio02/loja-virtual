<?php 
namespace app\router;


class RouterFIlter
{
    // Pego a Uri, Tipo de Rota e meu array de Rotas no construct e salvo nesses atributos
    public $uri;
    public string $typeRoute;
    public array $routes;

    public function __construct() {
        $this->uri = new Uri;
        $this->typeRoute = RouteType::get();
        $this->routes = Routes::get();
    }

    // Método para achar a rota compatível a Uri
    public function simpleRoute()
    {
        // pego a uri verificando se possui uri ou só o base path se tiver uri eu retiro a barra '/' do final
        $uri = ($this->uri->emptyUri()) ? $this->uri->get() : rtrim($this->uri->get(), '/');

        // verifico se a rota é compatível com a rota salva no array e retorno seu valor se nao retorno null
        if (array_key_exists($uri,$this->routes[$this->typeRoute])) {
            return $this->routes[$this->typeRoute][$uri];
        }

        return null;
    }

    // Método Para achar a rota Dinamica compatível a Uri rota Dinamica são aquelas que possuem parâmetros variáveis
    public function dynamicRoute()
    {   
        // pego a uri verificando se possui uri ou só o base path se tiver uri eu retiro a barra '/' do final
        $uri = ($this->uri->emptyUri()) ? $this->uri->get() : rtrim($this->uri->get(), '/');

        // foreach loop para verificar cada rota do array qual é compatível com o regex achou a compatível salvo na variável para o loop e retorna a variável se nao retorno a variável com valor null
        foreach ($this->routes[$this->typeRoute] as $index => $rota) {
            $regex = str_replace('/','\/', ltrim($index,'/'));
            if ($index !== '/' && preg_match("/^$regex$/",ltrim($uri, '/'))) {
                $registerRoute = $rota;
                break;
            }else{
                $registerRoute = null;
            }
        }

        return $registerRoute;
    }

    public function controller()
    {
        // procuro a rota no método se achar retorno o Controller compatível a rota
        $route = $this->simpleRoute();
        
        if ($route) {
            return $route;
        }

        // procuro a rota no método se achar retorno o Controller compatível a rota
        $route = $this->dynamicRoute();

        if ($route) {
            return $route;
        }

        // caso nenhum método ache a rota compatível retorno o ERROR_CONTROLLER
        return ERROR_CONTROLLER;
    }
}




?>