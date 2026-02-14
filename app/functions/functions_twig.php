<?php

use app\classes\BreadCrumb;
use app\classes\Carrinho;
use app\repositories\site\CategoriaRepository;
use app\repositories\site\ProdutoCarrinhoRepository;

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

$numeroProdutosCarrinho = new \Twig\TwigFunction('numeroProdutosCarrinho', function(){
    $numeroProdutosCarrinho = new Carrinho;
    return $numeroProdutosCarrinho->produtosCarrinho();
});

$valorProdutosCarrinho = new \Twig\TwigFunction('valorProdutosCarrinho', function(){
    $valorProdutosCarrinho = new ProdutoCarrinhoRepository;
    return $valorProdutosCarrinho->totalProdutosCarrinho();
});
?>