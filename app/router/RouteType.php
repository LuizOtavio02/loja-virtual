<?php 
namespace app\router;

class RouteType
{   
    // Pego o tipo de Rota get/post
    public static function get()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}




?>