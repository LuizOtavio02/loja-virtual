<?php 
namespace app\controllers\site;

use app\classes\BreadCrumb;
use app\classes\Carrinho;
use app\controllers\BaseController;

// HomeController extends BaseController pq é onde eu set o twig para poder utilizar a Template Engine
class HomeController extends BaseController
{
    // Método do meu Controller
    public function index()
    {
        $carrinho = new Carrinho;
        //$carrinho->add(2);
        
        $bread = new BreadCrumb;
        $breadCrumb = $bread->createBreadCrumb();

        // Aqui é onde se salva os dados para utilizar na view
        $dados = [
            'titulo' => 'Home',
        ];

        // load da view que pretende usar esse controller
        $template = $this->twig->load('site_home.html');
        
        // passo o array com os dados para utilizar na view
        $template->display($dados);
    
    }
}





?>