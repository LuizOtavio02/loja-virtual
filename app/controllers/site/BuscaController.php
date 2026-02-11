<?php 
namespace app\controllers\site;

use app\classes\Redirect;
use app\controllers\BaseController;
use app\repositories\site\ProdutoRepository;

class BuscaController extends BaseController
{
    public function index()
    {
        //dd($_GET['b']);
        $busca = trim($_GET['b']) ?? '';
        
        $validateBusca = preg_match('/^[\p{L}0-9\s\-+]+$/u', $busca) ? $busca : null;
        
        if ($validateBusca === null || $validateBusca === '') {
            $redirect = new Redirect;
            $redirect->redirect();
        }

        $produto = new ProdutoRepository;
        $produtosEncontrados = $produto->buscarProduto($validateBusca);
        
        $dados = [
            'titulo' => 'Busca',
            'produtos' => $produtosEncontrados
        ];

        $template = $this->twig->load('site_busca.html');
        
        $template->display($dados);
    
    }
}




?>