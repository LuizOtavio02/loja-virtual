<?php 
namespace app\controllers\site;

use app\controllers\BaseController;

class PerfilController extends BaseController
{
    public function index()
    {
        $dados = [
            'titulo' => 'Perfil'
        ];

        $template = $this->twig->load('site_perfil.html');
        
        $template->display($dados);
    }
}




?>