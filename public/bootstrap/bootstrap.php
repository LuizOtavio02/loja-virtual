<?php

use app\classes\Template;
use app\controllers\BaseController;
use app\controllers\Controller;
use app\router\Router;


$template = new Template;
$twig = $template->init();


/**
 * Responsável por:
 * - Iniciar o Router
 * - Encontrar o Controller correspondente à rota e executá-lo
 */
$controller = new Controller;
$router = new Router;
$baseController = new BaseController;
$route = $router->run();
$controller->execute($route);
$baseController->setTwig($twig);
?>