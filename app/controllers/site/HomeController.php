<?php 
namespace app\controllers\site;

use app\classes\BreadCrumb;
use app\controllers\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
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