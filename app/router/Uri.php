<?php 
namespace app\router;

class Uri
{
    // Aqui pego a Uri da url pra trabalhar com a rota
    public static function get()
    {
        return trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    }

    // Verifico se a Url está vazia somente com o base path sem uri 
    public static function emptyUri()
    {
        if (self::get() == '/dev/loja-virtual/public/' || self::get() == '/dev/loja-virtual/public') {
            return true;
        }

        return false;
    }
}





?>