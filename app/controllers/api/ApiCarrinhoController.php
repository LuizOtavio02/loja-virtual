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
        $valorCarrinho = 0;

        foreach ($carrinho as $id => $qtd) {
            $produtoCarrinho = $this->produtoModel->find('id', $id);
            $valor = $produtoCarrinho['preco'];

            $valorCarrinho += $valor * $qtd;

            $produtos[] = [
                'produtos' => $produtoCarrinho,
                'valorTotal' => $valor * $qtd,
                'quantidade' => $qtd,
                'valor' => $valor
            ];
        }

        $qtd = $this->carrinho->qtdNoCarrinho();

        http_response_code(200);
        header('Content-Type: application/json');
        echo json_encode([
            'success' => true,
            'produtos' => $produtos,
            'total' => [
                'qtdTotal' => $qtd,
                'valorCarrinho' => $valorCarrinho
            ]

        ], JSON_PRETTY_PRINT);
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

    public function update($id)
    {
        $input = json_decode(file_get_contents("php://input"), true);
        $qtd = $input['qtd'] ?? null;

        $this->carrinho->update($id[0], $qtd);
        $qtd = $this->carrinho->qtdNoCarrinho();

        header('Content-Type: application/json');

        echo json_encode([
            'success' => true,
            'message' => 'Item Atualizado',
            'qtd' => $qtd
        ], JSON_PRETTY_PRINT);
    }

    public function delete($id)
    {
        $this->carrinho->remove($id[0]);

        header('Content-Type: application/json');

        echo json_encode([
            'success' => true,
            'message' => 'Item Removido'
        ], JSON_PRETTY_PRINT);
    }
}
