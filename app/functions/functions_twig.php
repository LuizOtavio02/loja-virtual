<?php

use app\classes\BreadCrumb;
use app\classes\Carrinho;
use app\repositories\site\CategoriaRepository;
use app\repositories\site\ProdutoCarrinhoRepository;

// Função para passar a URL/Base path para trabalhar no HTML
$site_url = new \Twig\TwigFunction('site_url', function(){
    return 'http://'.$_SERVER['SERVER_NAME'].'/dev/loja-virtual/public/';
});

// Função para passar a Lista de Categorias para Trabalhar no HTML
$categorias = new \Twig\TwigFunction('categorias', function(){
    $categoriaRepository = new CategoriaRepository;
    return $categoriaRepository->listarCategorias();
});

// Função para passar a criação do BreadCrumb para Trabalhar no HTML
$breadCrumb = new \Twig\TwigFunction('breadCrumb', function(){
    $breadCrumb = new BreadCrumb;
    return $breadCrumb->createBreadCrumb();
});

// Função para passar o Numero de Produtos no Carrinho para Trabalhar no HTML
$numeroProdutosCarrinho = new \Twig\TwigFunction('numeroProdutosCarrinho', function(){
    $numeroProdutosCarrinho = new Carrinho;
    return $numeroProdutosCarrinho->produtosCarrinho();
});

// Função para passar o Valor Total dos produtos para Trabalhar no HTML
$valorProdutosCarrinho = new \Twig\TwigFunction('valorProdutosCarrinho', function(){
    $valorProdutosCarrinho = new ProdutoCarrinhoRepository;
    return $valorProdutosCarrinho->totalProdutosCarrinho();
});
?>