<?php 
namespace app\controllers;

use Exception;


class Controller
{
    const NAMESPACE_CONTROLLER = '\\app\\controllers\\';
    const FOLDERS_CONTROLLER = ['admin', 'site'];
    const ERROR_CONTROLLER = '\\app\\controllers\\erro\\ErroController';

    public function execute($route, $twig)
    {
        if ($route == ERROR_CONTROLLER) {
            list($controller, $method) = explode('@', $route);
            $error = self::ERROR_CONTROLLER;
            $controller = new $error;
            $controller->$method();
        }

        if (!str_contains( $route,'@')) {
            throw new Exception("Formato de Rota Invalida");        
        }

        
        list($controller, $method) = explode('@',$route);
        
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

        $controller = new $controllerNamespace;
        $controller->setTwig($twig);
        

        if (!method_exists($controller, $method)) {
            throw new Exception("O método {$method} não existe em {$controllerNamespace}");
        }

        $controllerParams = new ControllerParams;
        $params = $controllerParams->get($route);


        $controller->$method($params);
    }

}





?>