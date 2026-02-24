<?php 
namespace app\controllers\site;

use app\controllers\BaseController;

class CategoriaController extends BaseController
{
    public function index($nomeCategoria)
    {
        $dados = [
            'titulo' => $nomeCategoria[0]
        ];

        $template = $this->twig->load('site_categoria.html');
        
        $template->display($dados);
    }

    public function produto($params)
    {
        $dados = [
            'titulo' => $params[0],
        ];

        $template = $this->twig->load('site_item.html');
        
        $template->display($dados);
    }
}




?>