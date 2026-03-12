<?php

namespace app\controllers\site;

use app\controllers\BaseController;

class ContatoController extends BaseController
{
    public function index()
    {
        $dados = [
            'titulo' => 'Contato'
        ];

        $template = $this->twig->load('site_contato.html');
        
        $template->display($dados);
    }
}
