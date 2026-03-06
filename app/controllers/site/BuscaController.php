<?php 
namespace app\controllers\site;

use app\controllers\BaseController;

class BuscaController extends BaseController
{
    public function index()
    { 
        $dados = [
            'titulo' => 'Busca'
        ];

        $template = $this->twig->load('site_busca.html');
        
        $template->display($dados);
    
    }
}




?>