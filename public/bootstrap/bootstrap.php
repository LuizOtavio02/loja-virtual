<?php

use app\router\Router;
use app\classes\Template;
use app\models\site\User;
use app\models\Transactions;
use app\controllers\Controller;
use app\controllers\BaseController;
use app\models\site\UserModel;

/**
 * Responsável por:
 * - Iniciar o Router
 * - Iniciar o Twig
 * - Encontrar o Controller correspondente à rota e executá-lo
 */

$router = new Router;
$route = $router->run();

$template = new Template;
$twig = $template->init();
$twig->addFunction($site_url);


$controller = new Controller;
$controller->execute($route, $twig);






?>