<?php 
namespace app\router;

class RouteType
{
    public static function get()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}




?>