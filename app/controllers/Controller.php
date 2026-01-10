<?php 
namespace app\controllers;

use app\router\Router;
use app\router\Uri;


class Controller
{
    const NAMESPACE_CONTROLLER = '\\app\\controllers\\';
    const FOLDERS_CONTROLLER = ['admin', 'site'];
    const ERROR_CONTROLLER = '\\app\\controllers\\erro\\ErroController';

    private $router;
    private $uri;

    public function __construct() {
        $this->uri = new Uri;
        $this->router = new Router;
    }

    private function getController()
    {
        if (!$this->uri->emptyUri()) {
            return $this->router->getController();
        }

        return ucfirst(DEFAULT_CONTROLLER).'Controller';
    }

    public function getMethod()
    {
        if (!$this->uri->emptyUri()) {
            return $this->router->getMethod();
        }

        return DEFAULT_METHOD;
    }

    public function controller()
    {
        $controller = $this->getController();

        foreach (self::FOLDERS_CONTROLLER as $folderController) {
            if (class_exists(self::NAMESPACE_CONTROLLER.$folderController.'\\'.$controller)) {
                return self::NAMESPACE_CONTROLLER.$folderController.'\\'.$controller;
            }
        }

        return self::ERROR_CONTROLLER;
    }
}





?>