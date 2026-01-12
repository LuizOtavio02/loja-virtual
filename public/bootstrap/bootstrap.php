<?php

use app\controllers\Controller;
use app\controllers\Method;
use app\router\Router;
use app\router\RouterFIlter;
use app\router\Uri;

$controller = new Controller;
$router = new Router;
$route = $router->run();

$con =  $controller->execute($route);

?>