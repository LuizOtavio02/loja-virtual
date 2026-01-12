<?php 
namespace app\router;

class Routes
{
    public static function get()
    {
        return [
            'get' => [
                '/dev/loja-virtual/public/' => 'HomeController@index',
                '/dev/loja-virtual/public/produto' => 'ProdutoController@produto'
            ],
            'post' => []
        ];
    }
}




?>