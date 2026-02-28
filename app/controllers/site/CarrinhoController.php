<?php 
namespace app\controllers\site;

use app\controllers\BaseController;

class CarrinhoController extends BaseController
{
    public function index()
    {
        $dados = [
            'titulo' => 'Carrinho',
        ];

        // load da view que pretende usar esse controller
        $template = $this->twig->load('site_carrinho.html');
        
        // passo o array com os dados para utilizar na view
        $template->display($dados);

    }

    
}




?>