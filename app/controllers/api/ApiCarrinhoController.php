<?php

namespace app\controllers\api;

use app\classes\Carrinho;
use app\classes\StatusCarrinho;
use app\models\site\ProdutoModel;
use app\repositories\site\ProdutoCarrinhoRepository;

class ApiCarrinhoController
{
    private $statusCarrinho;
    private $carrinho;
    private $produtoModel;
    private $produtosCarrinhoRepository;

    public function __construct()
    {
        $this->statusCarrinho = new StatusCarrinho;
        $this->carrinho = new Carrinho;
        $this->produtoModel = new ProdutoModel;
        $this->produtosCarrinhoRepository = new ProdutoCarrinhoRepository;
    }

    public function index()
    {
        $carrinho = $this->statusCarrinho->carrinho();

        $produtos = [];

        foreach ($carrinho as $id => $qtd) {
            $produtoCarrinho = $this->produtoModel->find('id', $id);
            $valor = $produtoCarrinho['preco'];

            $produtos[] = [
                'produtos' => $produtoCarrinho,
                'valorTotal' => $valor * $qtd,
                'quantidade' => $qtd,
                'valor' => $valor
            ];
        }

        header('Content-Type: application/json');
        echo json_encode($produtos, JSON_PRETTY_PRINT);
    }

    public function add()
    {
        $input = json_decode(file_get_contents("php://input"), true);
        $id = $input['id'] ?? null;

        $add = $this->carrinho->add($id);
        $qtd = $this->carrinho->qtdNoCarrinho();

        header('Content-Type: application/json');

        if ($add == false) {
            http_response_code(400);
            echo json_encode([
                'success' => false,
                'message' => 'Produto Não foi adicionado ao Carrinho',
                'qtd' => $qtd
            ], JSON_PRETTY_PRINT);

            return;
        }

        http_response_code(201);
        echo json_encode([
            'success' => true,
            'message' => 'Produto adicionado ao Carrinho',
            'qtd' => $qtd
        ], JSON_PRETTY_PRINT);
    }
}
