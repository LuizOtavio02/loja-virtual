<?php

namespace app\controllers\site;

use app\controllers\BaseController;
use app\repositories\site\ProdutoRepository;

class EsportivoController extends BaseController
{
    public function index()
    {
        $produtoRepository = new ProdutoRepository;
        $produtos = $produtoRepository->listarProdutoEsportivo(2);
        
        $dados = [
            'titulo' => 'produto',
            'produtos' => $produtos
        ];

        $template = $this->twig->load('site_esportivo.html');
        
        $template->display($dados);
    }

    public function produto($params)
    {
        $slug = $params[0];
        $produtoRepository = new ProdutoRepository;
        $produto = $produtoRepository->produtoEsportivo($slug);
        
        $dados = [
            'titulo' => 'produto',
            'produto' => $produto
        ];

        $template = $this->twig->load('site_esportivo_item.html');
        
        $template->display($dados);
    }
}
