<?php

use app\classes\helpers\BreadCrumb;


// Função para passar a URL/Base path para trabalhar no HTML
$site_url = new \Twig\TwigFunction('site_url', function(){
    return 'http://'.$_SERVER['SERVER_NAME'].'/dev/loja-virtual/public/';
});

// Função para passar a criação do BreadCrumb para Trabalhar no HTML
$breadCrumb = new \Twig\TwigFunction('breadCrumb', function(){
    $breadCrumb = new BreadCrumb;
    return $breadCrumb->createBreadCrumb();
});



?>