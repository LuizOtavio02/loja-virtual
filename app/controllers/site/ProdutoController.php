<?php 
namespace app\controllers\site;

use app\controllers\BaseController;

class ProdutoController extends BaseController
{
    public function produto()
    {
        $dados = [
            'titulo' => 'produto',
        ];

        $template = $this->twig->load('site_produto.html');
        
        $template->display($dados);
    }

    public function index()
    {
        
        $dados = [
            'titulo' => 'produto',
        ];

        $template = $this->twig->load('site_produto.html');
        
        $template->display($dados);
    }
}





?>