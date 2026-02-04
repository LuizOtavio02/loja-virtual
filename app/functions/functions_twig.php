<?php

use app\repositories\site\CategoriaRepository;
use app\repositories\site\ProdutoRepository;

$site_url = new \Twig\TwigFunction('site_url', function(){
    return 'http://'.$_SERVER['SERVER_NAME'].'/dev/loja-virtual/public/';
});

$categorias = new \Twig\TwigFunction('categorias', function(){
    $categoriaRepository = new CategoriaRepository;
    return $categoriaRepository->listarCategorias();
});

$produtoEsportivo = new \Twig\TwigFunction('produto', function(){
    $produtoRepository = new ProdutoRepository;
    return $produtoRepository->listarProdutoEsportivo(1);
});
?>