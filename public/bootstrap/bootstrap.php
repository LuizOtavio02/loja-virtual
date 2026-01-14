<?php

use app\classes\Template;
use app\controllers\BaseController;
use app\controllers\Controller;
use app\router\Router;


/**
 * Responsável por:
 * - Iniciar o Router
 * - Encontrar o Controller correspondente à rota e executá-lo
 */

$router = new Router;
$route = $router->run();

$template = new Template;
$twig = $template->init();

$controller = new Controller;
$controller->execute($route, $twig);


?>