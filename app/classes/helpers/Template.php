<?php 
namespace app\classes\helpers;

class Template
{
    public function loader()
    {
        return new \Twig\Loader\FilesystemLoader([dirname(__DIR__,2) . '/views/admin',
            dirname(__DIR__,2) . '/views/site']);
    }

    public function init()
    {
        return new \Twig\Environment($this->loader(),[
            'debug' => true,
            //'cache' => '',
            'auto_reload' => true
        ]);

        
    }
}




?>