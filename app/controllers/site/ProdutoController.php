<?php 
namespace app\controllers\site;

use app\controllers\BaseController;
use app\repositories\site\ProdutoRepository;

class ProdutoController extends BaseController
{
    public function produto()
    {
        $produtoRepository = new ProdutoRepository;
        $produtos = $produtoRepository->listarProdutoEsportivo(1);
        
        $dados = [
            'titulo' => 'produto',
            'produtos' => $produtos
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