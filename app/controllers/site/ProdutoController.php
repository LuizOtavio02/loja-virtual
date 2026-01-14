<?php 
namespace app\controllers\site;

use app\controllers\BaseController;

class ProdutoController extends BaseController
{
    public function produto()
    {
        dd('produto metodo do produto controller');
    }

    public function index($index)
    {
        
        $dados = [
            'titulo' => 'Home',
            'index' => $index[0],
            
        ];

        $template = $this->twig->load('site_home.html');
        
        $template->display($dados);
    }
}





?>