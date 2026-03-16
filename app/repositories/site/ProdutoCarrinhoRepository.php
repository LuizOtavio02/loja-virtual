<?php 
namespace app\repositories\site;

use app\classes\carrinho\Carrinho;
use app\models\site\ProdutoModel;

class ProdutoCarrinhoRepository
{
    private $produtoModel;
    private $carrinho;

    public function __construct() {
        $this->produtoModel = new ProdutoModel;
        $this->carrinho = new Carrinho;
    }

    public function produtosNoCarrinho()
    {
        $produtos = [];

        foreach ($this->carrinho->produtosCarrinho() as $id => $qtd) {
            $produtoCarrinho = $this->produtoModel->find('id',$id);
            $valor = $produtoCarrinho['preco'];

            $produtos[] = [
                'produtos' => $produtoCarrinho,
                'valorTotal' => $valor*$qtd,
                'quantidade' => $qtd,
                'valor' => $valor
            ];
        }

        return $produtos;
    }

    public function totalProdutosCarrinho()
    {
        $total = 0;
        foreach ($this->carrinho->produtosCarrinho() as $id => $qtd) {
            $produtoCarrinho = $this->produtoModel->find('id',$id);
            $valor = $produtoCarrinho['preco'];
            $total += $valor*$qtd;
        }

        return $total;
        
    }
}




?>