<?php 
namespace app\controllers;

use Exception;


class Controller
{   
    // Constantes
    const NAMESPACE_CONTROLLER = '\\app\\controllers\\';
    const FOLDERS_CONTROLLER = ['admin', 'site'];
    const ERROR_CONTROLLER = '\\app\\controllers\\erro\\ErroController';

    public function execute($route, $twig)
    {
        // Verifico se a rota é igual ao ERRO_CONTROLLER se for separo no '@' e instancio o Controller e chamo seu Método 
        if ($route == ERROR_CONTROLLER) {
            list($controller, $method) = explode('@', $route);
            $error = self::ERROR_CONTROLLER;
            $controller = new $error;
            $controller->$method();
        }

        // Verifico se nao possui o '@' se nao possuir jogo uma Exception de Rota Invalida 
        if (!str_contains( $route,'@')) {
            throw new Exception("Formato de Rota Invalida");        
        }

        // Como possui eu explodo no '@' salvando o Controller em $controller e o Método em $method
        list($controller, $method) = explode('@',$route);
        
        // Loop Foreach para achar em qual folder a classe do Controller existe salvo na variável $controllerNamespace o path dou um break para sair do loop quando achar
        foreach (self::FOLDERS_CONTROLLER as $folderController) {
            if (class_exists(self::NAMESPACE_CONTROLLER.$folderController.'\\'.$controller)) {
                $controllerNamespace = self::NAMESPACE_CONTROLLER.$folderController.'\\'.$controller;
                break;
            }
        }

        // isset para confirmar se $controllerNamespace existe e esta setado após o foreach
        if (!isset($controllerNamespace)) {
            throw new Exception("Controller {$controller} não encontrado");
        }

        // Instancio o Controller achado no Loop Foreach
        $controller = new $controllerNamespace;
        // Seto a TemplateEngine Twig no Controller que fara o Extends do BaseController 
        $controller->setTwig($twig);
        
        // Verifico se o método existe no controller se nao existir jogo uma exception
        if (!method_exists($controller, $method)) {
            throw new Exception("O método {$method} não existe em {$controllerNamespace}");
        }

        // Pego o parâmetro da rota/controller caso exista
        $controllerParams = new ControllerParams;
        $params = $controllerParams->get($route);

        // Chamo o método do controller e passo o parâmetro caso exista 
        $controller->$method($params);
    }

}





?>