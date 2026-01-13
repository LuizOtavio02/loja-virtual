<?php 
namespace app\classes;

class Template
{
    public function loader()
    {
        return new \Twig\Loader\FilesystemLoader(['/../views/admin', '../app/views/site']);
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