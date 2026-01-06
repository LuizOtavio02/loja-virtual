<?php 
namespace app\classes;

class Redirect
{
    public function redirect($redirect = null)
    {
        if (is_null($redirect)) {
            header('location:/');
        }

        header("location:{$redirect}");
    }
}




?>