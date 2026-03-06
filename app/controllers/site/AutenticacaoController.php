<?php 
namespace app\controllers\site;

use app\controllers\BaseController;

class AutenticacaoController extends BaseController
{
    public function login()
    {
        $dados = [
            'titulo' => 'Login'
        ];

        $template = $this->twig->load('site_login.html');
        
        $template->display($dados);
    }

    public function cadastrar()
    {
        $dados = [
            'titulo' => 'Cadastrar'
        ];

        $template = $this->twig->load('site_cadastrar.html');
        
        $template->display($dados);
    }
}




?>