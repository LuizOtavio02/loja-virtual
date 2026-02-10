<?php

namespace app\controllers\site;

use app\controllers\BaseController;
use app\repositories\site\ProdutoRepository;

class SocialController extends BaseController
{
    public function index()
    {
        
        $produtoRepository = new ProdutoRepository;
        $produtos = $produtoRepository->listarProdutoEsportivo(3);
        
        $dados = [
            'titulo' => 'Social',
            'produtos' => $produtos
        ];

        $template = $this->twig->load('site_social.html');
        
        $template->display($dados);
    }

    public function produto($params)
    {
        $slug = $params[0];
        $produtoRepository = new ProdutoRepository;
        $produto = $produtoRepository->produtoEsportivo($slug);
        
        $dados = [
            'titulo' => 'Social',
            'produto' => $produto
        ];

        $template = $this->twig->load('site_social_item.html');
        
        $template->display($dados);
    }
}
