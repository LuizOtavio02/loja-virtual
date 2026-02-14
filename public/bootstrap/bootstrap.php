<?php

use app\router\Router;
use app\classes\Template;
use app\controllers\Controller;

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
$twig->addFunction($categorias);
$twig->addFunction($breadCrumb);
$twig->addFunction($numeroProdutosCarrinho);
$twig->addFunction($valorProdutosCarrinho);



$controller = new Controller;
$controller->execute($route, $twig);






?>