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
// inicio o router para pegar o Controller compatível a rota
$router = new Router;
$route = $router->run();

// inicio twig que é uma Template engine que utilizo para renderizar as paginas HTML
$template = new Template;
$twig = $template->init();
// Adiciono funções a minha Template engine para que possa trabalha4r com elas no HTML
$twig->addFunction($site_url);
$twig->addFunction($categorias);
$twig->addFunction($breadCrumb);
$twig->addFunction($numeroProdutosCarrinho);
$twig->addFunction($valorProdutosCarrinho);

// Inicio meu Controller passando como parâmetro o Controller da rota no $route e o Template engine no $twig
$controller = new Controller;
$controller->execute($route, $twig);






?>