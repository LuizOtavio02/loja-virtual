<?php 
namespace app\classes;

class Template
{
    public function loader()
    {
        return new \Twig\Loader\FilesystemLoader([dirname(__DIR__) . '/views/admin',
            dirname(__DIR__) . '/views/site']);
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