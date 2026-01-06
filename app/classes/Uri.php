<?php 
namespace app\classes;

class Uri
{
    public function get()
    {
        return trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    }

    public function emptyUri()
    {
        if ($this->get() == '/dev/loja-virtual/public/' || $this->get() == '/dev/loja-virtual/public') {
            return true;
        }

        return false;
    }
}





?>