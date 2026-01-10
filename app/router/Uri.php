<?php 
namespace app\router;

class Uri
{
    public static function get()
    {
        return trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    }

    public static function emptyUri()
    {
        if (self::get() == '/dev/loja-virtual/public/' || self::get() == '/dev/loja-virtual/public') {
            return true;
        }

        return false;
    }
}





?>