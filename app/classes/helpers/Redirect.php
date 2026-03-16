<?php 
namespace app\classes\helpers;

class Redirect
{
    public function redirect($redirect = null)
    {
        if (is_null($redirect)) {
            header('location:/dev/loja-virtual/public/');
            die();
        }

        header("location:{$redirect}");
    }
}




?>