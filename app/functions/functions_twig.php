<?php

use app\classes\BreadCrumb;
use app\repositories\site\CategoriaRepository;

$site_url = new \Twig\TwigFunction('site_url', function(){
    return 'http://'.$_SERVER['SERVER_NAME'].'/dev/loja-virtual/public/';
});

$categorias = new \Twig\TwigFunction('categorias', function(){
    $categoriaRepository = new CategoriaRepository;
    return $categoriaRepository->listarCategorias();
});

$breadCrumb = new \Twig\TwigFunction('breadCrumb', function(){
    $breadCrumb = new BreadCrumb;
    return $breadCrumb->createBreadCrumb();
});


?>