<?php 
namespace app\controllers\site;

use app\classes\BreadCrumb;
use app\classes\Carrinho;
use app\controllers\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        $carrinho = new Carrinho;
        //$carrinho->add(2);
        
        $bread = new BreadCrumb;
        $breadCrumb = $bread->createBreadCrumb();
        $dados = [
            'titulo' => 'Home',
        ];

        $template = $this->twig->load('site_home.html');
        
        $template->display($dados);
    
    }
}





?>