<?php

namespace app\controllers\site;

use app\controllers\BaseController;
use app\repositories\site\ProdutoRepository;

class CasualController extends BaseController
{
    public function index()
    {
        
        $produtoRepository = new ProdutoRepository;
        $produtos = $produtoRepository->listarProdutoEsportivo(1);
        
        $dados = [
            'titulo' => 'Casual',
            'produtos' => $produtos
        ];

        $template = $this->twig->load('site_casual.html');
        
        $template->display($dados);
    }

    public function produto($params)
    {
        $slug = $params[0];
        $produtoRepository = new ProdutoRepository;
        $produto = $produtoRepository->produtoEsportivo($slug);
        
        $dados = [
            'titulo' => 'Casual',
            'produto' => $produto
        ];

        $template = $this->twig->load('site_casual_item.html');
        
        $template->display($dados);
    }
}
