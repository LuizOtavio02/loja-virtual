<?php 
namespace app\controllers\site;

use app\controllers\BaseController;
use app\models\site\UserModel;
use app\repositories\site\ProdutoRepository;

class HomeController extends BaseController
{
    public function index()
    {
        
        $dados = [
            'titulo' => 'Home',
        ];

        $template = $this->twig->load('site_home.html');
        
        $template->display($dados);
    
    }
}





?>