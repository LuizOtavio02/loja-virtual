<?php 
namespace app\router;

class RouteType
{   
    // Pego o tipo de Rota get/post/put/delete
    public static function get()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}




?>