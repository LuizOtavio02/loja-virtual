<?php

use app\router\Router;
use app\classes\Template;
use app\models\site\User;
use app\models\Transactions;
use app\controllers\Controller;
use app\controllers\BaseController;


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

/* 
try {
    Transactions::open();
    $user = new User;

    $user->create([
        'firstName' => 'Gabriela',
        'lastName' => 'Garcia',
        'email' => 'gabi@gmail.com',
        'password' => password_hash('123', PASSWORD_DEFAULT)
    ]);

    $user->update(4,[
        'firstName' => 'Rosilene',
        'lastName' => 'Ferreira',
        'email' => 'rosi@gmail.com',
    ]);
   

    Transactions::close();
} catch (PDOException $e) {
    Transactions::rollBack();
    dd($e->getMessage());
}
*/



?>