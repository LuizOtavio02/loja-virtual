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
                '/dev/loja-virtual/public/esportivo/[a-z0-9]+(?:-[a-z0-9]+)*' => 'EsportivoController@produto'
            ],
            'post' => []
        ];
    }
}




?>