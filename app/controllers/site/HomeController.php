<?php 
namespace app\controllers\site;

use app\controllers\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        $dados = [
            'titulo' => 'Home',
        ];

        $template = $this->twig->load('site_home.html');
        
        $template->display($dados);
    
    }
}





?>