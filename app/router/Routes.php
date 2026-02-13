<?php 
namespace app\router;

class Routes
{
    public static function get()
    {
        return [
            'get' => [
                '/dev/loja-virtual/public/' => 'HomeController@index',
                '/dev/loja-virtual/public/categoria/esportivo' => 'EsportivoController@index',
                '/dev/loja-virtual/public/categoria/esportivo/[a-z0-9]+(?:-[a-z0-9]+)*' => 'EsportivoController@produto',
                '/dev/loja-virtual/public/categoria/casual' => 'CasualController@index',
                '/dev/loja-virtual/public/categoria/casual/[a-z0-9]+(?:-[a-z0-9]+)*' => 'CasualController@produto',
                '/dev/loja-virtual/public/categoria/social' => 'SocialController@index',
                '/dev/loja-virtual/public/categoria/social/[a-z0-9]+(?:-[a-z0-9]+)*' => 'SocialController@produto',
                '/dev/loja-virtual/public/busca' => 'BuscaController@index'
            ],
            'post' => [
                '/dev/loja-virtual/public/carrinho/add/[0-9]+' => 'CarrinhoController@add',
                '/dev/loja-virtual/public/carrinho/get' => 'CarrinhoController@get'
            ]
        ];
    }
}




?>