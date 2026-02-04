<?php

namespace app\controllers\site;

use app\controllers\BaseController;
use app\repositories\site\ProdutoRepository;

class EsportivoController extends BaseController
{
    public function produto()
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
}
