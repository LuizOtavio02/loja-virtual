<?php

namespace app\controllers\api;


use app\repositories\site\CategoriaRepository;
use app\repositories\site\ProdutoRepository;

class ApiProdutoController
{
    public function listarCategoria()
    {
        $categoriaRepository = new CategoriaRepository;
        $categorias = $categoriaRepository->listarCategorias();

        $listaCategorias = [];

        foreach ($categorias as $categoria) {
            $listaCategorias[] = [
                'id' => $categoria['id'],
                'nome' => $categoria['nome']
            ];
        }

        header('Content-Type: application/json');
        echo json_encode([
            'success' => true,
            'categorias' => $listaCategorias
        ]);
    }
    
    public function listarProdutosCategoria($nomeCategoria)
    {
        $categoriaRepository = new CategoriaRepository;
        $id = $categoriaRepository->pegarId($nomeCategoria[0]);

        $produtoRepository = new ProdutoRepository;
        $produtos = $produtoRepository->listarProdutoCategoria($id['id']);

        header('Content-Type: application/json');
        echo json_encode($produtos);
    }

    public function listarProdutos()
    {
        $produtoRepository = new ProdutoRepository;
        $produtos = $produtoRepository->listarProduto();

        header('Content-Type: application/json');
        echo json_encode($produtos);
    }

    public function detalhesProduto($params)
    {
        $slug = $params[0];
        $produtoRepository = new ProdutoRepository;
        $produto = $produtoRepository->produtoEsportivo($slug);

        header('Content-Type: application/json');
        echo json_encode($produto);
    }
}
