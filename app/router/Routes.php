<?php 
namespace app\router;

class Routes
{
    public static function get()
    {
        return [
            'get' => [
                '/dev/loja-virtual/public/' => 'HomeController@index',
                '/dev/loja-virtual/public/esportivo' => 'EsportivoController@index',
                '/dev/loja-virtual/public/esportivo/[a-z0-9]+(?:-[a-z0-9]+)*' => 'EsportivoController@produto',
                '/dev/loja-virtual/public/casual' => 'CasualController@index',
                '/dev/loja-virtual/public/casual/[a-z0-9]+(?:-[a-z0-9]+)*' => 'CasualController@produto',
                '/dev/loja-virtual/public/social' => 'SocialController@index',
                '/dev/loja-virtual/public/social/[a-z0-9]+(?:-[a-z0-9]+)*' => 'SocialController@produto',
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