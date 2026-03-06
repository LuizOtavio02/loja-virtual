<?php 
namespace app\router;

class Routes
{   
    // Minhas rotas e seus respectivos Controllers do get e post em um array de 'rota' => 'controller'
    public static function get()
    {
        return [
            'get' => [
                '/dev/loja-virtual/public/' => 'HomeController@index',
                '/dev/loja-virtual/public/categoria/[a-z0-9]+' => 'CategoriaController@index',
                '/dev/loja-virtual/public/categoria/[a-z]+/[a-z0-9]+(?:-[a-z0-9]+)*' => 'CategoriaController@produto',
                '/dev/loja-virtual/public/api/produtos/categoria/[a-z]+' => 'ApiProdutoController@listarCategoria',
                '/dev/loja-virtual/public/api/produtos' => 'ApiProdutoController@listarProdutos',
                '/dev/loja-virtual/public/api/produtos/detalhes/[a-z0-9]+(?:-[a-z0-9]+)*' => 'ApiProdutoController@detalhesProduto',
                '/dev/loja-virtual/public/busca' => 'BuscaController@index',
                '/dev/loja-virtual/public/carrinho' => 'CarrinhoController@index',
                '/dev/loja-virtual/public/login' => 'AutenticacaoController@login',
                '/dev/loja-virtual/public/cadastrar' => 'AutenticacaoController@cadastrar',
                
                '/dev/loja-virtual/public/api/carrinho' => 'ApiCarrinhoController@index',
                '/dev/loja-virtual/public/api/busca' => 'ApiBuscaController@index',
                '/dev/loja-virtual/public/api/logado' => 'ApiAutenticacaoController@logado',
            ],
            'post' => [
                '/dev/loja-virtual/public/api/carrinho' => 'ApiCarrinhoController@add',
                '/dev/loja-virtual/public/api/login' => 'ApiAutenticacaoController@login',
                '/dev/loja-virtual/public/api/cadastrar' => 'ApiAutenticacaoController@cadastrar',
            ],
            'put' => [
                '/dev/loja-virtual/public/api/carrinho/[0-9]+' => 'ApiCarrinhoController@update'
            ],
            'delete' => [
                '/dev/loja-virtual/public/api/carrinho/[0-9]+' => 'ApiCarrinhoController@delete',
                '/dev/loja-virtual/public/api/logout' => 'ApiAutenticacaoController@logout',
            ]
        ];
    }
}




?>